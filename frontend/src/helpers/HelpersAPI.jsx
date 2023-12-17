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

export { registrarProducto };
