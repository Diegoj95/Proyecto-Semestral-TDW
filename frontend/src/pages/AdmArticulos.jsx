import React, { useState } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import ProductosForm from '../components/ProductosForm.jsx';

function AdmArticulos() {
  const [openRegister, setOpenRegister] = useState(false);
  const [openModify, setOpenModify] = useState(false);

  const handleOpenRegister = () => setOpenRegister(true);
  const handleCloseRegister = () => setOpenRegister(false);

  const handleOpenModify = () => setOpenModify(true);
  const handleCloseModify = () => setOpenModify(false);

  const buttonStyle = {
    backgroundColor: 'red',
    color: 'white',
    '&:hover': {
      backgroundColor: 'darkred',
    },
    mr: 2, // Margen a la derecha para cada botón
  };

  return (
    <Box sx={{
        width: '100%',
        padding: 3,
        alignItems: 'flex-start',
        marginTop: '-50vh',
      }}>
      <Typography variant="h4" component="h1" gutterBottom>
        Administración de Artículos
      </Typography>

      {/* Box para los botones alineados horizontalmente en la parte superior */}
      <Box sx={{ display: 'flex', justifyContent: 'flex-start', width: '100%', mb: 3 }}>
        <Button sx={buttonStyle} onClick={() => {/* Aquí va la lógica para "Listar Productos" */}}>
          Listar Productos
        </Button>
        <Button sx={buttonStyle} onClick={handleOpenRegister}>
          Registrar Productos
        </Button>
        <Button sx={buttonStyle} onClick={handleOpenModify}>
          Modificar Productos
        </Button>
      </Box>

      {/* Modal para Registrar Productos */}
      <Modal open={openRegister} onClose={handleCloseRegister} aria-labelledby="modal-register-title" aria-describedby="modal-register-description">
        <Box sx={modalStyle}>
          <ProductosForm action="register" onSubmit={() => {}} />
        </Box>
      </Modal>

      {/* Modal para Modificar Productos */}
      <Modal open={openModify} onClose={handleCloseModify} aria-labelledby="modal-modify-title" aria-describedby="modal-modify-description">
        <Box sx={modalStyle}>
          <ProductosForm action="modify" onSubmit={() => {}} initialValues={{}} />
        </Box>
      </Modal>
    </Box>
  );
}

const modalStyle = {
  position: 'absolute', 
  top: '50%', 
  left: '50%', 
  transform: 'translate(-50%, -50%)', 
  width: 400, 
  bgcolor: 'background.paper', 
  boxShadow: 24, 
  p: 4
};

export default AdmArticulos;
