// IngresoForm.jsx

import React, { useState, useEffect } from 'react';
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import IconButton from '@mui/material/IconButton';
import TextField from '@mui/material/TextField';
import FormControl from '@mui/material/FormControl';
import InputLabel from '@mui/material/InputLabel';
import Select from '@mui/material/Select';
import MenuItem from '@mui/material/MenuItem';
import AddCircleOutlineIcon from '@mui/icons-material/AddCircleOutline';
import RemoveCircleOutlineIcon from '@mui/icons-material/RemoveCircleOutline';
import { listarTodasLasBodegas, listarTodosLosProductos } from '../helpers/HelpersAPI';

const IngresoForm = ({ onSubmit }) => {
  const [datosIngreso, setDatosIngreso] = useState({
    bodega: '',
    productos: [{ producto: '', cantidad: '' }]
  });

  const [bodegas, setBodegas] = useState([]);
  const [productos, setProductos] = useState([]);

  useEffect(() => {
    const cargarBodegasYProductos = async () => {
      try {
        const respuestaBodegas = await listarTodasLasBodegas();
        setBodegas(respuestaBodegas.bodegas);
        const respuestaProductos = await listarTodosLosProductos();
        setProductos(respuestaProductos.productos);
      } catch (error) {
        console.error('Error al cargar datos:', error);
      }
    };

    cargarBodegasYProductos();
  }, []);

  const handleIngresoChange = (e) => {
    setDatosIngreso({ ...datosIngreso, [e.target.name]: e.target.value });
  };

  const handleProductoChange = (index, e) => {
    const newProductos = datosIngreso.productos.map((producto, i) => {
      if (i === index) {
        return { ...producto, [e.target.name]: e.target.value };
      }
      return producto;
    });
    setDatosIngreso({ ...datosIngreso, productos: newProductos });
  };

  const addProducto = () => {
    setDatosIngreso({
      ...datosIngreso,
      productos: [...datosIngreso.productos, { producto: '', cantidad: '' }]
    });
  };

  const removeProducto = (index) => {
    const newProductos = datosIngreso.productos.filter((_, i) => i !== index);
    setDatosIngreso({ ...datosIngreso, productos: newProductos });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const datosParaBackend = {
      id_bodega: datosIngreso.bodega,
      productos: datosIngreso.productos.map(p => ({
        id: p.producto,
        cantidad: p.cantidad
      }))
    };
    onSubmit(datosParaBackend);
  };


  return (
    <form onSubmit={handleSubmit}>
      <Box sx={{ display: 'flex', flexDirection: 'column', p: 2 }}>
        <FormControl fullWidth margin="normal">
          <InputLabel id="bodega-label">Bodega</InputLabel>
          <Select
            labelId="bodega-label"
            label="Bodega"
            name="bodega"
            value={datosIngreso.bodega}
            onChange={handleIngresoChange}
          >
            {bodegas.map((bodega) => (
              <MenuItem key={bodega.id} value={bodega.id}>
                {bodega.nombre_bodega}
              </MenuItem>
            ))}
          </Select>
        </FormControl>
        {datosIngreso.productos.map((item, index) => (
          <Box key={index} sx={{ display: 'flex', alignItems: 'center', gap: 2, mb: 2 }}>
            <FormControl fullWidth>
              <InputLabel>Producto</InputLabel>
              <Select
                label="Producto"
                name="producto"
                value={item.producto}
                onChange={(e) => handleProductoChange(index, e)}
              >
                {productos.map((producto) => (
                  <MenuItem key={producto.id} value={producto.id}>
                    {producto.nombre}
                  </MenuItem>
                ))}
              </Select>
            </FormControl>
            <TextField
              label="Cantidad"
              name="cantidad"
              type="number"
              value={item.cantidad}
              onChange={(e) => handleProductoChange(index, e)}
            />
            {datosIngreso.productos.length > 1 && (
              <IconButton onClick={() => removeProducto(index)} color="error">
                <RemoveCircleOutlineIcon />
              </IconButton>
            )}
          </Box>
        ))}
        <IconButton onClick={addProducto} color="primary">
          <AddCircleOutlineIcon />
        </IconButton>
        <Button type="submit" variant="contained" sx={{ mt: 2 }}>
          Registrar Ingreso
        </Button>
      </Box>
    </form>
  );
};

export default IngresoForm;
