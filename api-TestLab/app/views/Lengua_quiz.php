<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Lengua - Sinónimos</title>
    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
</head>
<body>
    <div class="container">
        <h1>Quiz de Lengua - Sinónimos</h1>
        <form action="#">
            <div class="question">
                <p>1. ¿Cuál es el sinónimo de "alegría"?</p>
                <input type="radio" name="q1" value="tristeza"> Tristeza<br>
                <input type="radio" name="q1" value="felicidad"> Felicidad<br>
                <input type="radio" name="q1" value="miedo"> Miedo<br>
                <input type="radio" name="q1" value="enfado"> Enfado<br>
            </div>
            
            <div class="question">
                <p>2. ¿Cuál es el sinónimo de "rápido"?</p>
                <input type="radio" name="q2" value="lento"> Lento<br>
                <input type="radio" name="q2" value="veloz"> Veloz<br>
                <input type="radio" name="q2" value="torpe"> Torpe<br>
                <input type="radio" name="q2" value="fuerte"> Fuerte<br>
            </div>
            
            <div class="question">
                <p>3. ¿Qué palabra es sinónima de "hermoso"?</p>
                <input type="radio" name="q3" value="feo"> Feo<br>
                <input type="radio" name="q3" value="bello"> Bello<br>
                <input type="radio" name="q3" value="viejo"> Viejo<br>
                <input type="radio" name="q3" value="nuevo"> Nuevo<br>
            </div>
            
            <div class="question">
                <p>4. ¿Qué palabra es sinónima de "fácil"?</p>
                <input type="radio" name="q4" value="difícil"> Difícil<br>
                <input type="radio" name="q4" value="simple"> Simple<br>
                <input type="radio" name="q4" value="complejo"> Complejo<br>
                <input type="radio" name="q4" value="duro"> Duro<br>
            </div>
            
            <div class="question">
                <p>5. ¿Cuál es el sinónimo de "pequeño"?</p>
                <input type="radio" name="q5" value="grande"> Grande<br>
                <input type="radio" name="q5" value="diminuto"> Diminuto<br>
                <input type="radio" name="q5" value="alto"> Alto<br>
                <input type="radio" name="q5" value="ancho"> Ancho<br>
            </div>
            
            <!-- Botón de enviar -->
            <button type="button" id="submit-btn">Enviar</button>
        </form>
        <div id="result" style="margin-top: 20px; display: none;">
            <p id="summary"></p>
        </div>
    </div>

    <footer>
        <p>© 2024 Quiz de Lengua - Sinónimos</p>
    </footer>
</body>
</html>
