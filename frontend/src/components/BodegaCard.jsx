import React, { useState } from 'react';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import Collapse from '@mui/material/Collapse';
import Box from '@mui/material/Box';

const BodegaCard = ({ bodega, onVerDetalle, detalle }) => {
  const [mostrarDetalle, setMostrarDetalle] = useState(false);

  const toggleDetalle = () => {
    if (!mostrarDetalle) {
      onVerDetalle(bodega.id);
    }
    setMostrarDetalle(!mostrarDetalle);
  };

  return (
    <Card sx={{ width: 300, m: 2 }}>
      <CardMedia
        component="img"
        height="50"
        image={bodega.url_imagen_bodega}
        alt={bodega.nombre_bodega}
        sx={{ objectFit: 'contain' }}
      />
      <CardContent>
        <Typography gutterBottom variant="h5" component="div">
          {bodega.nombre_bodega}
        </Typography>
        <Button onClick={toggleDetalle}>
          {mostrarDetalle ? 'Ocultar Detalle' : 'Ver Detalle'}
        </Button>
        <Collapse in={mostrarDetalle}>
          {detalle && Array.isArray(detalle) && detalle.map((item) => (
            <Box key={item.id} sx={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', my: 1 }}>
              <Typography variant="body2">
                {item.producto.nombre}: {item.cantidad_producto}
              </Typography>
              <CardMedia
                component="img"
                height="24"
                image={item.producto.url_foto}
                alt={item.producto.nombre}
                sx={{ objectFit: 'contain' }}
              />
            </Box>
          ))}
        </Collapse>
      </CardContent>
    </Card>
  );
};

export default BodegaCard;
