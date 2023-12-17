import React from 'react';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import FormControl from '@mui/material/FormControl';
import InputLabel from '@mui/material/InputLabel';
import Select from '@mui/material/Select';
import MenuItem from '@mui/material/MenuItem';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';

function ProductosForm({ action, onSubmit, initialValues }) {
  return (
    <Box component="form" onSubmit={onSubmit} sx={{ mt: 2 }}>
      <Typography variant="h6" component="h2">
        {action === 'register' ? 'Registrar Nuevo Producto' : 'Modificar Producto'}
      </Typography>
      {action === 'modify' && (
        <FormControl fullWidth margin="normal">
          <InputLabel>Producto a modificar</InputLabel>
          <Select label="ID del Producto" defaultValue={initialValues?.id || ''}>
            <MenuItem value={1}>1</MenuItem>
            <MenuItem value={2}>2</MenuItem>
            <MenuItem value={3}>3</MenuItem>
          </Select>
        </FormControl>
      )}
      <TextField fullWidth label={action === 'register' ? 'Nombre' : 'Nuevo Nombre'} margin="normal" defaultValue={initialValues?.name || ''} />
      <TextField fullWidth label={action === 'register' ? 'Precio' : 'Nuevo Precio'} type="number" margin="normal" defaultValue={initialValues?.price || ''} />
      <TextField fullWidth label={action === 'register' ? 'Descripción' : 'Nueva Descripción'} margin="normal" defaultValue={initialValues?.description || ''} />
      <FormControl fullWidth margin="normal">
        <InputLabel>Categoría</InputLabel>
        <Select label="Categoría" defaultValue={initialValues?.category || ''}>
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
