// helpers/HelpersAPI.jsx

import axios from 'axios';

const apiBaseUrl = 'http://localhost:8000/api';

// Registrar producto
const registrarProducto = async (datosProducto) => {
  try {
    const respuesta = await axios.post(`${apiBaseUrl}/registrar_producto`, datosProducto);
    return respuesta.data;
  } catch (error) {
    console.error('Error al registrar producto:', error.response);
    throw error;
  }
};
// Listar todos los productos
const listarTodosLosProductos = async () => {
  try {
    const respuesta = await axios.get(`${apiBaseUrl}/listar_all_productos`);
    return respuesta.data;
  } catch (error) {
    console.error('Error al listar productos:', error.response);
    throw error;
  }
};

// Actualizar producto
const actualizarProducto = async (datosProducto) => {
  try {
    const respuesta = await axios.put(`${apiBaseUrl}/actualizar_producto`, datosProducto);
    return respuesta.data;
  } catch (error) {
    console.error('Error al actualizar producto:', error.response);
    throw error;
  }
};

//registrarIngreso
const registrarIngreso = async (datosIngreso) => {
  try {
    const respuesta = await axios.post(`${apiBaseUrl}/registrar_ingreso`, datosIngreso);
    return respuesta.data;
  } catch (error) {
    console.error('Error al registrar ingreso:', error.response);
    throw error;
  }
};

// Listar todas las bodegas
const listarTodasLasBodegas = async () => {
  try {
    const respuesta = await axios.get(`${apiBaseUrl}/listar_all_bodegas`);
    return respuesta.data;
  } catch (error) {
    console.error('Error al listar bodegas:', error.response);
    throw error;
  }
};

export { registrarProducto, listarTodosLosProductos, actualizarProducto, listarTodasLasBodegas, registrarIngreso  };

