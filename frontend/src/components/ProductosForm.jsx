// ProductosForm.jsx

import React from 'react';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import FormControl from '@mui/material/FormControl';
import InputLabel from '@mui/material/InputLabel';
import Select from '@mui/material/Select';
import MenuItem from '@mui/material/MenuItem';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';

function ProductosForm({ action, onSubmit }) {
  // Manejador del evento de envío del formulario
  const handleSubmit = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const datosProducto = {
      nombre: formData.get('nombre'),
      descripcion: formData.get('descripcion'),
      precio: formData.get('precio'),
      categoria: formData.get('categoria'),
    };
    onSubmit(datosProducto); // Llama a la función onSubmit proporcionada por el padre
  };

  return (
    <Box component="form" onSubmit={handleSubmit} noValidate sx={{ mt: 2 }}>
      <Typography variant="h6" component="h2">
        {action === 'register' ? 'Registrar Nuevo Producto' : 'Modificar Producto'}
      </Typography>
      {action === 'modify' && (
        <FormControl fullWidth margin="normal">
          <InputLabel>Producto a modificar</InputLabel>
          <Select label="ID del Producto" name="id">
            <MenuItem value={1}>1</MenuItem>
            <MenuItem value={2}>2</MenuItem>
            <MenuItem value={3}>3</MenuItem>
          </Select>
        </FormControl>
      )}
      <TextField fullWidth label="Nombre" margin="normal" name="nombre" />
      <TextField fullWidth label="Precio" type="number" margin="normal" name="precio" />
      <TextField fullWidth label="Descripción" margin="normal" name="descripcion" />
      <FormControl fullWidth margin="normal">
        <InputLabel>Categoría</InputLabel>
        <Select label="Categoría" name="categoria">
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
