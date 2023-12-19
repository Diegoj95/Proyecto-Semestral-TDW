// EgresoArticulos.jsx
import React, { useState, useEffect } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import PageLayout from '../components/PageLayout';
import EgresoForm from '../components/EgresoForm';
import BodegaCard from '../components/BodegaCard';
import { registrarEgreso, listarTodasLasBodegas, obtenerProductosDeBodega } from '../helpers/HelpersAPI';

function EgresoArticulos() {
  const [openEgreso, setOpenEgreso] = useState(false);
  const [bodegas, setBodegas] = useState([]);
  const [detalleBodega, setDetalleBodega] = useState({});
  const [datosEgreso, setDatosEgreso] = useState({ bodega: '', productos: [{ producto: '', cantidad: '' }] });

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

  const handleOpenEgreso = () => setOpenEgreso(true);
  const handleCloseEgreso = () => setOpenEgreso(false);

  const handleSubmitEgreso = async (datosEgreso) => {
    try {
      await registrarEgreso(datosEgreso);
      handleCloseEgreso();
      // Aquí puedes agregar una alerta o notificación de éxito
    } catch (error) {
      // Aquí manejas el error (puede ser una alerta o notificación)
    }
  };

  const cargarDetalleBodega = async (idBodega) => {
    if (!detalleBodega[idBodega]) {
      try {
        const productos = await obtenerProductosDeBodega(idBodega);
        setDetalleBodega({ ...detalleBodega, [idBodega]: productos.productos || [] });
      } catch (error) {
        console.error('Error al cargar detalles de la bodega:', error);
      }
    }
  };

  const handleEgresoChange = (e) => {
    setDatosEgreso({ ...datosEgreso, [e.target.name]: e.target.value });
  };

  return (
    <PageLayout title={
      <Typography variant="h4" component="h1" gutterBottom sx={{ color: '#000080', textShadow: '2px 2px 4px rgba(0,0,0,0.5)' }}>
        Egreso de Artículos
      </Typography>
    }>
      <Box sx={{ '& > :not(style)': { m: 1 }, display: 'flex', justifyContent: 'center' }}>
        <Button sx={{ backgroundColor: 'blue', color: 'white', '&:hover': { backgroundColor: 'darkblue' } }} onClick={handleOpenEgreso}>
          Salida de Artículos
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

      <Modal open={openEgreso} onClose={handleCloseEgreso}>
        <Box sx={{ position: 'absolute', top: '50%', left: '50%', transform: 'translate(-50%, -50%)', width: 400, bgcolor: 'background.paper', boxShadow: 24, p: 4, outline: 'none' }}>
          <EgresoForm onSubmit={handleSubmitEgreso} productosBodega={detalleBodega[datosEgreso.bodega]} onEgresoChange={handleEgresoChange} datosEgreso={datosEgreso} />
        </Box>
      </Modal>
    </PageLayout>
  );
}

export default EgresoArticulos;