<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Química - Tabla Periódica</title>
    <?php include 'includes/headerExamenes.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
</head>
<body>
    <div class="container">
        <h1>Quiz de Química - Tabla Periódica</h1>
        <form action="#">
            <div class="question">
                <p>1. ¿Cuál es el símbolo del Oxígeno en la Tabla Periódica?</p>
                <input type="radio" name="q1" value="O"> O<br>
                <input type="radio" name="q1" value="Ox"> Ox<br>
                <input type="radio" name="q1" value="O2"> O2<br>
                <input type="radio" name="q1" value="Oz"> Oz<br>
            </div>
            
            <div class="question">
                <p>2. ¿Qué elemento tiene el número atómico 1?</p>
                <input type="radio" name="q2" value="Helio"> Helio<br>
                <input type="radio" name="q2" value="Oxígeno"> Oxígeno<br>
                <input type="radio" name="q2" value="Hidrógeno"> Hidrógeno<br>
                <input type="radio" name="q2" value="Carbono"> Carbono<br>
            </div>
            
            <div class="question">
                <p>3. ¿Cuál es el símbolo químico del Hierro?</p>
                <input type="radio" name="q3" value="He"> He<br>
                <input type="radio" name="q3" value="Ir"> Ir<br>
                <input type="radio" name="q3" value="Fe"> Fe<br>
                <input type="radio" name="q3" value="I"> I<br>
            </div>
            
            <div class="question">
                <p>4. ¿Cuál es el número atómico del Carbono?</p>
                <input type="radio" name="q4" value="4"> 4<br>
                <input type="radio" name="q4" value="6"> 6<br>
                <input type="radio" name="q4" value="8"> 8<br>
                <input type="radio" name="q4" value="12"> 12<br>
            </div>
            
            <div class="question">
                <p>5. ¿Qué elemento tiene el símbolo químico "Na"?</p>
                <input type="radio" name="q5" value="Neón"> Neón<br>
                <input type="radio" name="q5" value="Sodio"> Sodio<br>
                <input type="radio" name="q5" value="Nitrógeno"> Nitrógeno<br>
                <input type="radio" name="q5" value="Níquel"> Níquel<br>
            </div>
            
            <!-- Botón de enviar -->
            <button type="button" id="submit-btn">Enviar</button>
        </form>
        <div id="result" style="margin-top: 20px; display: none;">
            <p id="summary"></p>
        </div>
    </div>

    <footer>
        <p>© 2024 Quiz de Química - Tabla Periódica</p>
    </footer>
</body>
</html>
