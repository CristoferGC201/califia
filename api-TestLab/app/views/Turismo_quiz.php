<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Turismo - Destinos Turísticos Famosos</title>
    <?php include 'includes/headerExamenes.php'; ?>
    <script src="http://localhost/califia/api-TestLab/public/js/geoExam.js" defer></script>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
</head>
<body>
    
  <div class="exam-container">
        <h1>Examen de Turismo</h1>
        <p>Tiempo transcurrido: <span id="timer">00:00</span></p><br><br>
<!-- Preguntas del examen -->
        <form id="exam-form" action="guardarResultadosTurismo.php" method="POST">
            <div class="question">
            <label>1. ¿Cuál de los siguientes es un famoso destino turístico en Francia?</label><br>
            <label><input type="radio" name="q1" value="La Torre Eiffel"> La Torre Eiffel</label>
            <label><input type="radio" name="q1" value="La Sagrada Familia"> La Sagrada Familia</label>
            <label><input type="radio" name="q1" value="El Coliseo"> El Coliseo</label>
            <label><input type="radio" name="q1" value="El Big Ben"> El Big Ben</label>
            </div>
            
            <div class="question">
            <label>2. ¿Qué famoso monumento se encuentra en Egipto?</label><br>
            <label><input type="radio" name="q2" value="Las Pirámides de Giza"> Las Pirámides de Giza</label>
            <label><input type="radio" name="q2" value="Machu Picchu"> Machu Picchu</label>
            <label><input type="radio" name="q2" value="La Muralla China"> La Muralla China</label>
            <label><input type="radio" name="q2" value="El Taj Mahal"> El Taj Mahal</label>
            </div>
            
            <div class="question">
            <label>3. ¿Cuál de estos lugares es conocido como "La Ciudad Prohibida"?</label><br>
            <label><input type="radio" name="q3" value="Pekín, China"> Pekín, China</label>
            <label><input type="radio" name="q3" value="Bangkok, Tailandia"> Bangkok, Tailandia</label>
            <label><input type="radio" name="q3" value="Kioto, Japón"> Kioto, Japón</label>
            <label><input type="radio" name="q3" value="Seúl, Corea del Sur"> Seúl, Corea del Sur</label>
            </div>
            
            <div class="question">
            <label>4. ¿En qué país se encuentra el famoso sitio de Machu Picchu?</label><br>
            <label><input type="radio" name="q4" value="Perú"> Perú</label>
            <label><input type="radio" name="q4" value="Chile"> Chile</label>
            <label><input type="radio" name="q4" value="Argentina"> Argentina</label>
            <label><input type="radio" name="q4" value="Ecuador"> Ecuador</label>
            </div>
            
            <div class="question">
            <label>5. ¿Cuál es la capital de Italia, famosa por su historia y arquitectura?</label><br>
            <label><input type="radio" name="q5" value="Roma"> Roma</label>
            <label><input type="radio" name="q5" value="Milán"> Milán</label>
            <label><input type="radio" name="q5" value="Venecia"> Venecia</label>
            <label><input type="radio" name="q5" value="Florencia"> Florencia</label>
            </div>
            
            <form id="exam-form" action="guardarResultadosTurismo.php" method="POST">
            <!-- Botón de enviar -->
            <input type="hidden" name="tiempo_inicio" id="tiempo_inicio">
            <input type="hidden" name="tiempo_fin" id="tiempo_fin">
            <button type="button" id="submit-btn">Enviar</button>
        </form>
        <div id="result" style="margin-top: 20px; display: none;">
            <p id="summary"></p>
        </div>
    </div>

    <footer>
        <p>© 2024 Quiz de Turismo - Destinos Turísticos Famosos</p>
    </footer>
</body>
</html>
