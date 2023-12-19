// App.jsx

import React from 'react';
import Typography from '@mui/material/Typography';
import ModuloCard from './components/ModuloCard';
import PageLayout from './components/PageLayout';
import Box from '@mui/material/Box';
import './App.css';

function App() {
  const modulos = [
    { nombre: 'Administrar Artículos', descripcion: 'Registrar y/o modificar productos', imagen: '/src/assets/cards/bolsa.png' },
    { nombre: 'Ingreso de Artículos', descripcion: 'Registrar ingresos de productos', imagen: '/src/assets/cards/cajas.png' },
    { nombre: 'Traspaso de Artículos', descripcion: 'Gestionar traspaso entre bodegas', imagen: '/src/assets/cards/camion.png' },
    { nombre: 'Egreso de Artículos', descripcion: 'Registrar egreso de productos', imagen: '/src/assets/cards/egreso.png' },
  ];

  return (
    <PageLayout title={
      <Typography variant="h3" component="h1" gutterBottom sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
        Administración de Inventario de Tienda Pokémon
      </Typography>
    }>
      <Box display="flex" justifyContent="center" sx={{ maxWidth: 1020, margin: 'auto', gap: 2 }}>
        {modulos.map(modulo => (
          <Box key={modulo.nombre} sx={{ flexBasis: '33%', maxWidth: '33%', display: 'flex', justifyContent: 'center' }}>
            <ModuloCard modulo={modulo} />
          </Box>
        ))}
      </Box>
    </PageLayout>
  );
}

export default App;
