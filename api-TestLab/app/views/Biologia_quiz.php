
    <title>Quiz de Biología - Partes de una Célula</title>
    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
    <script src="http://localhost/califia/api-TestLab/public/js/bioExam.js" defer></script>
   

   


<body>


    <div class="exam-container">
        <h1>Examen de Biología</h1>
        <p>Tiempo transcurrido: <span id="timer">00:00</span></p><br><br>
        <form id="exam-form" action="guardarResultadosBio.php" method="POST">
        <form id="exam-form">
            <!-- Pregunta 1 -->
            <div class="question">
                <label>1. ¿Cuál es la función del núcleo en una célula?</label>
                <div class="options">
                    <label><input type="radio" name="q1" value="Producir energía"> Producir energía</label>
                    <label><input type="radio" name="q1" value="Controlar las actividades celulares"> Controlar las actividades celulares</label>
                    <label><input type="radio" name="q1" value="Sintetizar proteínas"> Sintetizar proteínas</label>
                    <label><input type="radio" name="q1" value="Realizar la fotosíntesis"> Realizar la fotosíntesis</label>
                </div>
            </div><br>

            <!-- Pregunta 2 -->
            <div class="question">
                <label>2. ¿Qué orgánulo se encarga de producir energía?</label>
                <div class="options">
                    <label><input type="radio" name="q2" value="Ribosomas"> Ribosomas</label>
                    <label><input type="radio" name="q2" value="Mitocondrias"> Mitocondrias</label>
                    <label><input type="radio" name="q2" value="Lisosomas"> Lisosomas</label>
                    <label><input type="radio" name="q2" value="Cloroplastos"> Cloroplastos</label>
                </div>
            </div><br>

            <!-- Pregunta 3 -->
            <div class="question">
                <label>3. ¿Cuál de las siguientes estructuras es responsable de la síntesis de proteínas?</label>
                <div class="options">
                    <label><input type="radio" name="q3" value="Núcleo"> Núcleo</label>
                    <label><input type="radio" name="q3" value="Ribosomas"> Ribosomas</label>
                    <label><input type="radio" name="q3" value="Citoesqueleto"> Citoesqueleto</label>
                    <label><input type="radio" name="q3" value="Membrana celular"> Membrana celular</label>
                </div>
            </div>
            <!-- Pregunta 4 -->
            <div class="question">
                <label>4. ¿Qué orgánulo contiene el material genético?</label>
                <div class="options">
                    <label><input type="radio" name="q4" value="Ribosomas"> Ribosomas</label>
                    <label><input type="radio" name="q4" value="Núcleo"> Núcleo</label>
                    <label><input type="radio" name="q4" value="Retículo endoplasmático"> Retículo endoplasmático</label>
                    <label><input type="radio" name="q4" value="Vesículas"> Vesículas</label>
                </div>
            </div><br>

            <!-- Pregunta 5 -->
            <div class="question">
                <label>5. ¿Cuál es la función de los cloroplastos?</label>
                <div class="options">
                    <label><input type="radio" name="q5" value="Respirar"> Respirar</label>
                    <label><input type="radio" name="q5" value="Realizar la fotosíntesis"> Realizar la fotosíntesis</label>
                    <label><input type="radio" name="q5" value="Eliminar desechos"> Eliminar desechos</label>
                    <label><input type="radio" name="q5" value="Producir hormonas"> Producir hormonas</label>
                </div>
            </div><br>
            <form id="exam-form" action="guardarResultadosBio.php" method="POST">
          
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
</body>

    <!-- Pie de página -->
    <footer>
        <p>© 2024 Quiz de Biología - Partes de una Célula</p> <!-- Mensaje de derechos de autor -->
    </footer>

</html>
