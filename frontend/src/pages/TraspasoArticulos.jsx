import React from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';

function TraspasoArticulos() {
  return (
    <Box sx={{ display: 'flex', flexDirection: 'column', alignItems: 'center', p: 3 }}>
      <Typography variant="h4" component="h1" gutterBottom>
        Traspaso de Artículos
      </Typography>
      <Box sx={{ '& > :not(style)': { m: 1 } }}>
        <Button variant="contained" color="primary">
          Crear Traspaso
        </Button>
        <Button variant="contained" color="secondary">
          Historial de Traspasos
        </Button>
      </Box>
    </Box>
  );
}

export default TraspasoArticulos;
