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
import { listarTodasLasBodegas, obtenerProductosDeBodega } from '../helpers/HelpersAPI';

const EgresoForm = ({ onSubmit }) => {
  const [datosEgreso, setDatosEgreso] = useState({
    bodega: '',
    productos: [{ producto: '', cantidad: '' }]
  });
  const [bodegas, setBodegas] = useState([]);
  const [productosBodega, setProductosBodega] = useState([]);

  useEffect(() => {
    const cargarBodegas = async () => {
      try {
        const respuestaBodegas = await listarTodasLasBodegas();
        setBodegas(respuestaBodegas.bodegas);
      } catch (error) {
        console.error('Error al cargar bodegas:', error);
      }
    };

    cargarBodegas();
  }, []);

  useEffect(() => {
    const cargarProductosBodega = async () => {
      if (datosEgreso.bodega) {
        try {
          const respuestaProductos = await obtenerProductosDeBodega(datosEgreso.bodega);
          setProductosBodega(respuestaProductos.productos);
        } catch (error) {
          console.error('Error al cargar productos de la bodega:', error);
        }
      } else {
        setProductosBodega([]);
      }
    };

    cargarProductosBodega();
  }, [datosEgreso.bodega]);

  const handleEgresoChange = (e) => {
    setDatosEgreso({ ...datosEgreso, [e.target.name]: e.target.value });
  };

  const handleProductoChange = (index, e) => {
    const newProductos = datosEgreso.productos.map((producto, i) => {
      if (i === index) {
        return { ...producto, [e.target.name]: e.target.value };
      }
      return producto;
    });
    setDatosEgreso({ ...datosEgreso, productos: newProductos });
  };

  const addProducto = () => {
    setDatosEgreso({
      ...datosEgreso,
      productos: [...datosEgreso.productos, { producto: '', cantidad: '' }]
    });
  };

  const removeProducto = (index) => {
    const newProductos = datosEgreso.productos.filter((_, i) => i !== index);
    setDatosEgreso({ ...datosEgreso, productos: newProductos });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit(datosEgreso);
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
            value={datosEgreso.bodega}
            onChange={handleEgresoChange}
          >
            {bodegas.map((bodega) => (
              <MenuItem key={bodega.id} value={bodega.id}>
                {bodega.nombre_bodega}
              </MenuItem>
            ))}
          </Select>
        </FormControl>

        {datosEgreso.productos.map((item, index) => (
          <Box key={index} sx={{ display: 'flex', alignItems: 'center', gap: 2, mb: 2 }}>
            <FormControl fullWidth>
              <InputLabel>Producto</InputLabel>
              <Select
                label="Producto"
                name="producto"
                value={item.producto}
                onChange={(e) => handleProductoChange(index, e)}
                disabled={!datosEgreso.bodega}
              >
                {productosBodega.map((producto) => (
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
            {datosEgreso.productos.length > 1 && (
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
          Registrar Egreso
        </Button>
      </Box>
    </form>
  );
};

export default EgresoForm;
