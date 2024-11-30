const express = require('express');
const router = express.Router();
const db = require('../../config/database');

// Ruta para obtener los resultados de un usuario
router.get('/:id/resultados', (req, res) => {
    const usuarioId = req.params.id;

    const query = `
        SELECT e.nombre AS examen, r.puntuacion, r.fecha 
        FROM resultados r 
        JOIN examenes e ON r.examen_id = e.id 
        WHERE r.usuario_id = ? 
        ORDER BY r.fecha DESC
    `;

    db.query(query, [usuarioId], (err, results) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ error: 'Error al consultar los resultados' });
        }
        res.json(results);
    });
});

module.exports = router;
