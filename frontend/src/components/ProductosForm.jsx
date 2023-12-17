// ProductosForm.jsx

import React, { useState, useEffect } from 'react';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import FormControl from '@mui/material/FormControl';
import InputLabel from '@mui/material/InputLabel';
import Select from '@mui/material/Select';
import MenuItem from '@mui/material/MenuItem';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';

function ProductosForm({ action, onSubmit, productos = [] }) {
  // Estado para el producto seleccionado en el formulario de modificación
  const [selectedProductId, setSelectedProductId] = useState('');

  useEffect(() => {
    // Establece el primer producto como valor predeterminado para el selector en el modo "modificar"
    if (productos.length > 0 && action === 'modify') {
      setSelectedProductId(productos[0].id);
    }
  }, [productos, action]);

  const handleSubmit = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const datosProducto = {
      id: action === 'modify' ? selectedProductId : null,
      nombre: formData.get('nombre'),
      descripcion: formData.get('descripcion'),
      precio: formData.get('precio'),
      categoria: formData.get('categoria'),
    };
    onSubmit(datosProducto);
  };

  const handleProductChange = (event) => {
    setSelectedProductId(event.target.value);
  };

  return (
    <Box component="form" onSubmit={handleSubmit} noValidate sx={{ mt: 2 }}>
      <Typography variant="h6" component="h2">
        {action === 'register' ? 'Registrar Nuevo Producto' : 'Modificar Producto'}
      </Typography>
      {action === 'modify' && (
        <FormControl fullWidth margin="normal">
          <InputLabel>Producto a modificar</InputLabel>
          <Select
            label="Producto a modificar"
            name="id"
            value={selectedProductId}
            onChange={handleProductChange}
          >
            {productos.map((producto) => (
              <MenuItem key={producto.id} value={producto.id}>
                {producto.nombre}
              </MenuItem>
            ))}
          </Select>
        </FormControl>
      )}
      <TextField fullWidth label="Nombre" margin="normal" name="nombre" />
      <TextField fullWidth label="Precio" type="number" margin="normal" name="precio" />
      <TextField fullWidth label="Descripción" margin="normal" name="descripcion" />
      <FormControl fullWidth margin="normal">
        <InputLabel>Categoría</InputLabel>
        <Select label="Categoría" name="categoria" defaultValue="Pokebolas">
          <MenuItem value="Pokebolas">Pokebolas</MenuItem>
          <MenuItem value="Pociones">Pociones</MenuItem>
          <MenuItem value="Otros">Otros</MenuItem>
        </Select>
      </FormControl>
      <Button variant="contained" color="primary" type="submit" sx={{ mt: 2, mb: 2 }}>
        {action === 'register' ? 'Registrar' : 'Modificar'}
      </Button>
    </Box>
  );
}

export default ProductosForm;
