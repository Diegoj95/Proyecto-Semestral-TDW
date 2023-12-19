import React from 'react';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Typography from '@mui/material/Typography';

const BodegaCard = ({ bodega }) => {
  return (
    <Card sx={{ width: 300, m: 2 }}> {/* Tamaño predefinido de la card */}
      <CardMedia
        component="img"
        height="140" // Ajusta la altura según tus necesidades
        image={bodega.url_imagen_bodega}
        alt={bodega.nombre_bodega}
        sx={{ objectFit: 'contain' }} // Ajustar imagen dentro del espacio disponible
      />
      <CardContent>
        <Typography gutterBottom variant="h5" component="div">
          {bodega.nombre_bodega}
        </Typography>
        {/* Aquí puedes agregar más información si es necesario */}
      </CardContent>
    </Card>
  );
};

export default BodegaCard;
