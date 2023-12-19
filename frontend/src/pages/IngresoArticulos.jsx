import React, { useState, useEffect } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import PageLayout from '../components/PageLayout';
import { registrarIngreso, listarTodasLasBodegas } from '../helpers/HelpersAPI';
import IngresoForm from '../components/IngresoForm';
import BodegaCard from '../components/BodegaCard';
import Swal from 'sweetalert2';
import axios from 'axios';

function IngresoArticulos() {
  const [openIngreso, setOpenIngreso] = useState(false);
  const [bodegas, setBodegas] = useState([]);
  const [detalleBodega, setDetalleBodega] = useState({});

  useEffect(() => {
    const cargarBodegas = async () => {
      try {
        const respuesta = await listarTodasLasBodegas();
        setBodegas(respuesta.bodegas);
      } catch (error) {
        console.error('Error al cargar bodegas:', error);
      }
    };

    cargarBodegas();
  }, []);

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

  const cargarDetalleBodega = async (idBodega) => {
    if (!detalleBodega[idBodega]) {
      try {
        const respuesta = await axios.get(`http://localhost:8000/api/productos_bodega?id_bodega=${idBodega}`);
        setDetalleBodega({ ...detalleBodega, [idBodega]: respuesta.data.productos });
      } catch (error) {
        console.error('Error al cargar detalles de la bodega:', error);
      }
    }
  };

  return (
    <PageLayout title={
      <Typography variant="h4" component="h1" gutterBottom sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
        Ingreso de Artículos
      </Typography>
    }>
      <Box sx={{ '& > :not(style)': { m: 1 }, display: 'flex', justifyContent: 'center' }}>
        <Button color="primary" variant="contained" onClick={handleOpenIngreso}>
          Registrar Ingreso
        </Button>
      </Box>

      <Box sx={{ display: 'flex', flexWrap: 'wrap', justifyContent: 'center' }}>
        {bodegas.map(bodega => (
          <BodegaCard
            key={bodega.id}
            bodega={bodega}
            onVerDetalle={cargarDetalleBodega}
            detalle={detalleBodega[bodega.id]}
          />
        ))}
      </Box>

      <Modal open={openIngreso} onClose={handleCloseIngreso}>
        <Box sx={{ position: 'absolute', top: '50%', left: '50%', transform: 'translate(-50%, -50%)', width: 400, bgcolor: 'background.paper', boxShadow: 24, p: 4, outline: 'none' }}>
          <IngresoForm onSubmit={handleSubmitIngreso} />
        </Box>
      </Modal>
    </PageLayout>
  );
}

export default IngresoArticulos;
