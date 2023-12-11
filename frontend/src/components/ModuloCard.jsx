import React from 'react';
import Card from '@mui/material/Card';
import CardActionArea from '@mui/material/CardActionArea';
import CardMedia from '@mui/material/CardMedia';
import CardContent from '@mui/material/CardContent';
import Typography from '@mui/material/Typography';

const ModuloCard = ({ modulo }) => (
  <Card sx={{ maxWidth: 345, width: '100%', m: 1 }}>
    <CardActionArea>
      <CardMedia
        component="img"
        height="150"
        image={modulo.imagen}
        alt={modulo.nombre}
        sx={{ objectFit: 'contain' }}
      />
      <CardContent>
        <Typography gutterBottom variant="h5" component="div">
          {modulo.nombre}
        </Typography>
        <Typography variant="body2" color="text.secondary">
          {modulo.descripcion}
        </Typography>
      </CardContent>
    </CardActionArea>
  </Card>
);

export default ModuloCard;