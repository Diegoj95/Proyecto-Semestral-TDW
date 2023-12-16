// main.jsx
import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import App from './App.jsx';
import AdmArticulos from './pages/AdmArticulos';
import IngresoArticulos from './pages/IngresoArticulos';
import TraspasoArticulos from './pages/TraspasoArticulos';
import './index.css';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<App />} />
        <Route path="/administrar-articulos" element={<AdmArticulos />} />
        <Route path="/ingreso-articulos" element={<IngresoArticulos />} />
        <Route path="/traspaso-articulos" element={<TraspasoArticulos />} />
      </Routes>
    </BrowserRouter>
  </React.StrictMode>,
);
