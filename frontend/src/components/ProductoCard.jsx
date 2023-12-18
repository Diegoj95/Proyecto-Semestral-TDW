import React from 'react';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Typography from '@mui/material/Typography';
import Box from '@mui/material/Box';

const ProductoCard = ({ producto }) => {
  return (
    <Card sx={{ width: 300, m: 2 }}> {/* Tamaño predefinido de la card */}
      <CardMedia
        component="img"
        height="70"
        image={producto.url_foto}
        alt={producto.nombre}
        sx={{ objectFit: 'contain' }} // Ajustar imagen dentro del espacio disponible
      />
      <CardContent>
        <Typography gutterBottom variant="h5" component="div">
          {producto.nombre}
        </Typography>
        <Typography variant="body2" color="text.secondary">
          {producto.descripcion}
        </Typography>
        <Typography variant="body2" color="text.primary" sx={{ mt: 1 }}>
          Precio: ${producto.precio}
        </Typography>
        <Box sx={{ display: 'flex', justifyContent: 'space-between', mt: 2 }}>
          <Typography variant="body2" color="text.primary">
            ID: {producto.id}
          </Typography>
          <Typography variant="body2" color="text.primary">
            Categoría: {producto.categoria}
          </Typography>
        </Box>
      </CardContent>
    </Card>
  );
};

export default ProductoCard;
