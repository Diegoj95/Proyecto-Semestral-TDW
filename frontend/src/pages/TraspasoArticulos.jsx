// TraspasoArticulos.jsx

import React from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import PageLayout from '../components/PageLayout';

function TraspasoArticulos() {
  const buttonStyle = {
    backgroundColor: 'blue',
    color: 'white',
    '&:hover': {
      backgroundColor: 'darkblue',
    },
    mr: 2,
  };

  return (
    <PageLayout title={
      <Typography variant="h4" component="h1" gutterBottom sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
        Traspaso de Artículos
      </Typography>
    }>
      <Box sx={{ '& > :not(style)': { m: 1 }, display: 'flex', justifyContent: 'center' }}>
        <Button sx={buttonStyle}>
          Crear Traspaso
        </Button>
        <Button sx={buttonStyle}>
          Historial de Traspasos
        </Button>
      </Box>
    </PageLayout>
  );
}

export default TraspasoArticulos;
