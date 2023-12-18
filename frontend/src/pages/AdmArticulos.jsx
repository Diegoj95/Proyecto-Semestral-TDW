// AdmArticulos.jsx

import React, { useState, useEffect } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import ProductosForm from '../components/ProductosForm.jsx';
import { registrarProducto, actualizarProducto, listarTodosLosProductos } from '../helpers/HelpersAPI';
import Swal from 'sweetalert2';
import PageLayout from '../components/PageLayout';
import ProductoCard from '../components/ProductoCard';


function AdmArticulos() {
  const [openRegister, setOpenRegister] = useState(false);
  const [openModify, setOpenModify] = useState(false);
  const [productos, setProductos] = useState([]);

  useEffect(() => {
    const obtenerProductos = async () => {
      try {
        const respuesta = await listarTodosLosProductos();
        setProductos(respuesta.productos);
      } catch (error) {
        console.error('Error al obtener productos:', error);
        Swal.fire({
          title: 'Error',
          text: 'No se pudo cargar la lista de productos.',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        });
      }
    };

    obtenerProductos();
  }, []);

  const handleOpenRegister = () => setOpenRegister(true);
  const handleCloseRegister = () => setOpenRegister(false);

  const handleOpenModify = () => setOpenModify(true);
  const handleCloseModify = () => setOpenModify(false);

  const handleRegistrarProducto = async (datosProducto) => {
    try {
      console.log("Datos del producto a registrar:", datosProducto);
      const productoRegistrado = await registrarProducto(datosProducto);
      console.log('Producto registrado:', productoRegistrado);
      handleCloseRegister(); // Cierra el modal después de registrar
      Swal.fire({
        title: '¡Éxito!',
        text: 'Producto registrado correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    } catch (error) {
      console.error('Error al registrar producto:', error);
      Swal.fire({
        title: 'Error',
        text: 'No se pudo registrar el producto. Por favor, inténtelo de nuevo.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }
  };

  const handleActualizarProducto = async (datosProducto) => {
    try {
      const productoActualizado = await actualizarProducto(datosProducto);
      console.log('Producto actualizado:', productoActualizado);
      handleCloseModify(); // Cierra el modal después de actualizar
      Swal.fire({
        title: '¡Éxito!',
        text: 'Producto actualizado correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    } catch (error) {
      console.error('Error al actualizar producto:', error);
      Swal.fire({
        title: 'Error',
        text: 'No se pudo actualizar el producto. Por favor, inténtelo de nuevo.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }
  };

  const buttonStyle = {
    backgroundColor: 'blue',
    color: 'white',
    '&:hover': {
      backgroundColor: 'darkblue',
    },
    mr: 2, // Margen a la derecha para cada botón
  };

  // Renderiza tarjetas de productos
  const renderProductos = () => {
    return productos.map((producto) => (
      <ProductoCard key={producto.id} producto={producto} />
    ));
  };

  return (
    <PageLayout title={
      <Typography variant="h4" component="h1" gutterBottom sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
        Administración de Artículos
      </Typography>
    }>
      <Box sx={{ display: 'flex', justifyContent: 'center', width: '100%', mb: 3 }}>
        <Button sx={buttonStyle} onClick={handleOpenRegister}>
          Registrar Productos
        </Button>
        <Button sx={buttonStyle} onClick={handleOpenModify}>
          Modificar Productos
        </Button>
      </Box>
      <Modal open={openRegister} onClose={handleCloseRegister} aria-labelledby="modal-register-title" aria-describedby="modal-register-description">
        <Box sx={modalStyle}>
          <ProductosForm action="register" onSubmit={handleRegistrarProducto} />
        </Box>
      </Modal>
      <Modal open={openModify} onClose={handleCloseModify} aria-labelledby="modal-modify-title" aria-describedby="modal-modify-description">
        <Box sx={modalStyle}>
          <ProductosForm action="modify" onSubmit={handleActualizarProducto} productos={productos} />
        </Box>
      </Modal>

      <Box sx={{ display: 'flex', flexWrap: 'wrap', justifyContent: 'center' }}>
        {renderProductos()}
      </Box>

    </PageLayout>
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
