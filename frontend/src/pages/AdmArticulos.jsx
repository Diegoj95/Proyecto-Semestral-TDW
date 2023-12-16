import React, { useState } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import TextField from '@mui/material/TextField';
import FormControl from '@mui/material/FormControl';
import InputLabel from '@mui/material/InputLabel';
import Select from '@mui/material/Select';
import MenuItem from '@mui/material/MenuItem';

function AdmArticulos() {
  const [openRegister, setOpenRegister] = useState(false);
  const [openModify, setOpenModify] = useState(false);

  const handleOpenRegister = () => setOpenRegister(true);
  const handleCloseRegister = () => setOpenRegister(false);

  const handleOpenModify = () => setOpenModify(true);
  const handleCloseModify = () => setOpenModify(false);

  return (
    <Box sx={{ display: 'flex', flexDirection: 'column', alignItems: 'center', p: 3 }}>
      <Typography variant="h4" component="h1" gutterBottom>
        Administración de Artículos
      </Typography>
      <Box sx={{ '& > :not(style)': { m: 1 } }}>
        <Button variant="contained" color="primary" onClick={handleOpenRegister}>
          Registrar Productos
        </Button>
        <Button variant="contained" color="secondary" onClick={handleOpenModify}>
          Modificar Productos
        </Button>
      </Box>

      {/* Modal para Registrar Productos */}
      <Modal
        open={openRegister}
        onClose={handleCloseRegister}
        aria-labelledby="modal-register-title"
        aria-describedby="modal-register-description"
      >
        <Box sx={modalStyle}>
          <Typography id="modal-register-title" variant="h6" component="h2">
            Registrar Nuevo Producto
          </Typography>
          <Box component="form" sx={{ mt: 2 }}>
            <TextField fullWidth label="Nombre" margin="normal" />
            <TextField fullWidth label="Precio" type="number" margin="normal" />
            <TextField fullWidth label="Descripción" margin="normal" />
            <FormControl fullWidth margin="normal">
              <InputLabel>Nueva Categoría</InputLabel>
              <Select label="Categoría">
                <MenuItem value="Pokebolas">Pokebolas</MenuItem>
                <MenuItem value="Pociones">Pociones</MenuItem>
                <MenuItem value="Otros">Otros</MenuItem>
              </Select>
            </FormControl>
            <Button variant="contained" color="primary" sx={{ mt: 2, mb: 2 }}>
              Registrar
            </Button>
          </Box>
        </Box>
      </Modal>

      {/* Modal para Modificar Productos */}
      <Modal
        open={openModify}
        onClose={handleCloseModify}
        aria-labelledby="modal-modify-title"
        aria-describedby="modal-modify-description"
      >
        <Box sx={modalStyle}>
          <Typography id="modal-modify-title" variant="h6" component="h2">
            Modificar Producto
          </Typography>
          <Box component="form" sx={{ mt: 2 }}>
            <FormControl fullWidth margin="normal">
              <InputLabel>Producto a modificar</InputLabel>
              <Select label="ID del Producto">
                <MenuItem value={1}>1</MenuItem>
                <MenuItem value={2}>2</MenuItem>
                <MenuItem value={3}>3</MenuItem>
              </Select>
            </FormControl>
            <TextField fullWidth label="Nuevo Precio" type="number" margin="normal" />
            <TextField fullWidth label="Nueva Descripción" margin="normal" />
            <FormControl fullWidth margin="normal">
              <InputLabel>Categoría</InputLabel>
              <Select label="Nueva Categoría">
                <MenuItem value="Pokebolas">Pokebolas</MenuItem>
                <MenuItem value="Pociones">Pociones</MenuItem>
                <MenuItem value="Otros">Otros</MenuItem>
              </Select>
            </FormControl>
            <Button variant="contained" color="primary" sx={{ mt: 2, mb: 2 }}>
              Modificar
            </Button>
          </Box>
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
