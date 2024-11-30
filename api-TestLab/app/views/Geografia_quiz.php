
    <title>Quiz de Geografía - Capitales del Mundo</title>
    <?php include 'includes/headerExamenes.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
    <script src="http://localhost/califia/api-TestLab/public/js/geoExam.js" defer></script>

<body>



  <div class="exam-container">
        <h1>Examen de Geografia I</h1>
        <p>Tiempo transcurrido: <span id="timer">00:00</span></p><br><br>
<!-- Preguntas del examen -->
        <form id="exam-form" action="guardarResultadosGeo.php" method="POST">
       <form id="exam-form">  
        <!-- Pregunta 1 -->
            <div class="question">
                <label>1. ¿Cuál es la capital de España?</label>
                <div class="options">
                <label><input type="radio" name="q1" value="Barcelona"> Barcelona</label>
                <label><input type="radio" name="q1" value="Madrid"> Madrid</label>
                <label><input type="radio" name="q1" value="Valencia"> Valencia</label>
                <label><input type="radio" name="q1" value="Sevilla"> Sevilla</label>
            </div>
<br>
            <div class="question">
                <label>2. ¿Cuál es la capital de Francia?</label>
                <div class="options">
                <label><input type="radio" name="q2" value="París"> París</label>
                <label><input type="radio" name="q2" value="Londres"> Londres</label>
                <label><input type="radio" name="q2" value="Berlín"> Berlín</label>
                <label><input type="radio" name="q2" value="Roma"> Roma</label>
            </div>
            </div><br>

            <div class="question">
                <label>3. ¿Cuál es la capital de Japón?</label>
                <div class="options">
                <label><input type="radio" name="q3" value="Seúl"> Seúl</label>
                 <label><input type="radio" name="q3" value="Tokio"> Tokio</label>
                 <label><input type="radio" name="q3" value="Pekín"> Pekín</label>
                <label><input type="radio" name="q3" value="Bangkok"> Bangkok</label>
            </div>
            </div><br>

            
            <div class="question">
                <label>4. ¿Cuál es la capital de Argentina?</label>
                <div class="options">
                <label><input type="radio" name="q4" value="Buenos Aires"> Buenos Aires</label>
                <label><input type="radio" name="q4" value="Santiago"> Santiago</label>
                <label><input type="radio" name="q4" value="Lima"> Lima</label>
                <label><input type="radio" name="q4" value="Montevideo"> Montevideo</label>
            </div>
            </div><br>


            <div class="question">
                <label>5. ¿Cuál es la capital de Australia?</label>
                <div class="options">
                <label><input type="radio" name="q5" value="Sídney"> Sídney</label>
                <label><input type="radio" name="q5" value="Melbourne"> Melbourne</label>
                <label><input type="radio" name="q5" value="Canberra"> Canberra</label>
               <label><input type="radio" name="q5" value="Brisbane"> Brisbane</label>
            </div>
            </div><br>

            <form id="exam-form" action="guardarResultadosGeo.php" method="POST">
    <!-- Input ocultos para capturar tiempos -->
    <input type="hidden" name="tiempo_inicio" id="tiempo_inicio">
    <input type="hidden" name="tiempo_fin" id="tiempo_fin">


              <!-- Botón de enviar -->
              <button type="button" id="submit-btn">Enviar</button>
            </form>
            <div id="result" style="margin-top: 20px; display: none;">
                <p id="summary"></p>
            </div>
        </div>

         <!-- Pie de página -->
    <footer>
        <p>© 2024 Quiz de Geografía - Capitales del Mundo</p>
    </footer>
</body>
</html>

