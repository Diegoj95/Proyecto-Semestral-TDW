import React from 'react';
import Box from '@mui/material/Box';
import fondo from '../assets/fondo.png';

const PageLayout = ({ children, title }) => {
  return (
    <Box sx={{ 
      width: '100vw',
      minHeight: '100vh',
      display: 'flex',
      flexDirection: 'column',
      alignItems: 'center',
      justifyContent: 'flex-start',
      backgroundImage: `url(${fondo})`,
      backgroundSize: 'auto',  // Cambiado de 'cover' a 'auto'
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center',
      backgroundAttachment: 'fixed',  // Mantiene el fondo fijo durante el desplazamiento
    }}>
      <Box sx={{ 
        display: 'inline-block',
        backgroundColor: '#b1dcd0',
        textAlign: 'center',
        p: 1,
        borderRadius: '4px',
      }}>
        {title}
      </Box>
      {children}
    </Box>
  );
};

export default PageLayout;
