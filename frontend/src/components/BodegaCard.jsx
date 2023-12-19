import React, { useState } from 'react';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import Collapse from '@mui/material/Collapse';

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
        height="140"
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
          {detalle && detalle.map((producto) => (
            <Typography key={producto.id}>
              {producto.nombre}: {producto.cantidad}
            </Typography>
          ))}
        </Collapse>
      </CardContent>
    </Card>
  );
};

export default BodegaCard;
