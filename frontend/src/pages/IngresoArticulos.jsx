// IngresoArticulos.jsx

import React, { useState } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import PageLayout from '../components/PageLayout';
import { registrarIngreso } from '../helpers/HelpersAPI';
import IngresoForm from '../components/IngresoForm';
import Swal from 'sweetalert2';

function IngresoArticulos() {
  const [openIngreso, setOpenIngreso] = useState(false);

  // Estilos para el botón
  const buttonStyle = {
    backgroundColor: 'blue',
    color: 'white',
    '&:hover': {
      backgroundColor: 'darkblue',
    }
  };

  // Estilos para el modal
  const modalStyle = {
    position: 'absolute',
    top: '50%',
    left: '50%',
    transform: 'translate(-50%, -50%)',
    width: 400, // Ancho fijo del modal
    bgcolor: 'background.paper',
    boxShadow: 24,
    p: 4,
    outline: 'none' // Elimina el borde en foco
  };

  const handleOpenIngreso = () => setOpenIngreso(true);
  const handleCloseIngreso = () => setOpenIngreso(false);

  const handleSubmitIngreso = async (datosIngreso) => {
    try {
      const ingresoRegistrado = await registrarIngreso(datosIngreso);
      console.log('Ingreso registrado:', ingresoRegistrado);
      handleCloseIngreso();
      Swal.fire({
        title: '¡Éxito!',
        text: 'Han ingresado productos correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    } catch (error) {
      console.error('Error al registrar ingreso:', error);
      Swal.fire({
        title: 'Error',
        text: 'No se pudo ingresar. Por favor, inténtelo de nuevo.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }
  };

  return (
    <PageLayout title={
      <Typography variant="h4" component="h1" gutterBottom sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
        Ingreso de Artículos
      </Typography>
    }>
      <Box sx={{ '& > :not(style)': { m: 1 }, display: 'flex', justifyContent: 'center' }}>
        <Button sx={buttonStyle} onClick={handleOpenIngreso}>
          Registrar Ingreso
        </Button>
        {/* Aquí podrías tener otro botón o método para revisar los ingresos existentes */}
      </Box>

      <Modal open={openIngreso} onClose={handleCloseIngreso}>
        <Box sx={modalStyle}>
          <IngresoForm onSubmit={handleSubmitIngreso} />
        </Box>
      </Modal>
    </PageLayout>
  );
}

export default IngresoArticulos;
