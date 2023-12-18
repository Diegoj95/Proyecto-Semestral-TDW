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
  const [selectedProductId, setSelectedProductId] = useState('');
  const [categoria, setCategoria] = useState('Pokebolas');
  const [urlFoto, setUrlFoto] = useState('');

  const urlsPorCategoria = {
    'Pokebolas': 'https://i.imgur.com/QfSkBl6.png',
    'Pociones': 'https://i.imgur.com/78TSTiN.png',
    'Otros': 'https://i.imgur.com/Fr12lmR.png'
  };

  useEffect(() => {
    if (productos.length > 0 && action === 'modify') {
      const productoInicial = productos[0];
      setSelectedProductId(productoInicial.id);
      setCategoria(productoInicial.categoria);
      setUrlFoto(productoInicial.url_foto);
    } else if (action === 'register') {
      setUrlFoto(urlsPorCategoria[categoria]);
    }
  }, [productos, action, categoria]);

  const handleSubmit = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const datosProducto = {
      id: action === 'modify' ? selectedProductId : null,
      nombre: formData.get('nombre'),
      descripcion: formData.get('descripcion'),
      precio: formData.get('precio'),
      url_foto: formData.get('url_foto'),
      categoria: formData.get('categoria'),
    };
    onSubmit(datosProducto);
  };

  const handleProductChange = (event) => {
    const productoSeleccionadoId = event.target.value;
    const productoSeleccionado = productos.find(p => p.id === productoSeleccionadoId);

    setSelectedProductId(productoSeleccionadoId);
    setCategoria(productoSeleccionado.categoria);
    setUrlFoto(productoSeleccionado.url_foto);
  };

  const handleCategoriaChange = (event) => {
    setCategoria(event.target.value);
    if (action === 'register') {
      setUrlFoto(urlsPorCategoria[event.target.value]);
    }
  };

  const handleUrlFotoChange = (event) => {
    setUrlFoto(event.target.value);
  };

  return (
    <Box
      component="form"
      onSubmit={handleSubmit}
      noValidate
      sx={{
        mt: 1,
        maxHeight: '500px',
        overflow: 'auto',
        '::-webkit-scrollbar': {
          width: '8px',
        },
        '::-webkit-scrollbar-track': {
          backgroundColor: '#f1f1f1',
        },
        '::-webkit-scrollbar-thumb': {
          backgroundColor: '#888',
        },
        '::-webkit-scrollbar-thumb:hover': {
          backgroundColor: '#555',
        },
      }}
    >
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
        <Select
          label="Categoría"
          name="categoria"
          value={categoria}
          onChange={handleCategoriaChange}
        >
          <MenuItem value="Pokebolas">Pokebolas</MenuItem>
          <MenuItem value="Pociones">Pociones</MenuItem>
          <MenuItem value="Otros">Otros</MenuItem>
        </Select>
      </FormControl>
      <TextField 
        fullWidth 
        label="URL de la Foto" 
        margin="normal" 
        name="url_foto" 
        value={urlFoto} 
        onChange={handleUrlFotoChange}
      />
      {urlFoto && (
        <Box sx={{ mt: 2, mb: 2, textAlign: 'center' }}>
          <Typography>Vista previa de la imagen</Typography>
          <img src={urlFoto} alt="Vista previa" style={{ maxWidth: '100%', maxHeight: '200px', minBlockSize:'100px' }} />
        </Box>
      )}
      <Button variant="contained" color="primary" type="submit" sx={{ mt: 2, mb: 2 }}>
        {action === 'register' ? 'Registrar' : 'Modificar'}
      </Button>
    </Box>
  );
}

export default ProductosForm;
