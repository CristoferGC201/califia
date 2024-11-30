const express = require('express');
const dotenv = require('dotenv');

// Cargar variables de entorno
dotenv.config();

// Crear aplicación Express
const app = express();
const puerto = process.env.PORT || 3000;

// Middleware para parsear JSON
app.use(express.json());

// Cargar rutas
const usuariosRoutes = require('../../routes/usuarios');
app.use('/api/usuarios', usuariosRoutes);

// Inicio del servidor
app.listen(puerto, () => {
    console.log(`Servidor ejecutándose en http://localhost:${puerto}`);
});
