import React from 'react';
import Card from '@mui/material/Card';
import CardActionArea from '@mui/material/CardActionArea';
import CardMedia from '@mui/material/CardMedia';
import CardContent from '@mui/material/CardContent';
import Typography from '@mui/material/Typography';
import { Link } from 'react-router-dom';

const getLinkPath = (moduleName) => {
  switch (moduleName) {
    case 'Administrar Artículos':
      return '/administrar-articulos';
    case 'Ingreso de Artículos':
      return '/ingreso-articulos';
    case 'Traspaso de Artículos':
      return '/traspaso-articulos';
    case 'Egreso de Artículos':
      return '/egreso-articulos';
    default:
      return '#';
  }
};

const ModuloCard = ({ modulo }) => (
  <Link to={getLinkPath(modulo.nombre)} style={{ textDecoration: 'none' }}>
    <Card sx={{ maxWidth: 345, width: '100%', m: 1, backgroundColor: 'grey.200', height: '100%' }}> {/* Establecer un alto fijo */}
      <CardActionArea sx={{ height: '100%', display: 'flex', flexDirection: 'column', justifyContent: 'space-between' }}> {/* Ajustar la altura del contenido */}
        <CardMedia
          component="img"
          height="150"
          image={modulo.imagen}
          alt={modulo.nombre}
          sx={{ objectFit: 'contain' }}
        />
        <CardContent sx={{ textAlign: 'center', flexGrow: 1 }}>
          <Typography gutterBottom variant="h5" component="div" sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
            {modulo.nombre}
          </Typography>
          <Typography variant="body2" color="text.secondary">
            {modulo.descripcion}
          </Typography>
        </CardContent>
      </CardActionArea>
    </Card>
  </Link>
);

export default ModuloCard;
