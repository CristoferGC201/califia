
    <title>Quiz de Matemáticas - Operaciones Básicas</title>
    <?php include 'includes/headerExamenes.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
    <script src="http://localhost/califia/api-TestLab/public/js/mateExam.js" defer></script>
   

<body>


<div class="exam-container">
        <h1>Quiz de Matemáticas - Operaciones Básicas</h1>
         <p>Tiempo transcurrido: <span id="timer">00:00</span></p><br><br>

         <form id="exam-form" action="guardarResultadosMate.php" method="POST">
            <form id="exam-form">
            <div class="question">
                <label>1. ¿Cuánto es 2 + 3?<label><br>
               <label><input type="radio" name="q1" value="5"> 5</label>
                <label><input type="radio" name="q1" value="4"> 4</label>
               <label><input type="radio" name="q1" value="6"> 6</label>
                <label><input type="radio" name="q1" value="3"> 3</label>
            </div>

            <div class="question">
            <label>2. ¿Cuánto es 3 x 2?</p><br>
                <label><input type="radio" name="q2" value="6"> 6</label>
                <label><input type="radio" name="q2" value="5"> 5</label>
                <label><input type="radio" name="q2" value="7"> 7</label>
                <label><input type="radio" name="q2" value="8"> 8</label>
            </div>

            <div class="question">
               <label>3. ¿Cuánto es 4 + 4?</label><br>
                <label><input type="radio" name="q3" value="8"> 8</label>
                <label><input type="radio" name="q3" value="7"> 7</label>
                <label><input type="radio" name="q3" value="6"> 6</label>
                <label><input type="radio" name="q3" value="9"> 9</label>
            </div>

            <div class="question">
                <label>4. ¿Cuánto es 9 ÷ 3?</label><br>
                <label><input type="radio" name="q4" value="3"> 3</label>
                <label><input type="radio" name="q4" value="4"> 4</label>
                <label><input type="radio" name="q4" value="2"> 2</label>
                <label><input type="radio" name="q4" value="5"> 5</label>
            </div>

            <div class="question">
                <label>5. ¿Cuánto es 4 x 4?</label><br>
                <label><input type="radio" name="q5" value="16"> 16</label>
                <label><input type="radio" name="q5" value="12"> 12</label>
                <label><input type="radio" name="q5" value="14"> 14</label>
                <label><input type="radio" name="q5" value="10"> 10</label>
                </div>
            <form id="exam-form" action="guardarResultadosMate.php" method="POST"></form>
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
        <p>© 2024 Quiz de Matemáticas - Operaciones Básicas</p>
    </footer>
</body>
</html>
