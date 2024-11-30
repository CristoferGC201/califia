<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Historia - Revolución Francesa</title>
    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/StyleQ.css">
</head>
<body>
    <div class="container">
        <h1>Quiz de Historia - Revolución Francesa</h1>
        <form action="#">
            <div class="question">
                <p>1. ¿En qué año comenzó la Revolución Francesa?</p>
                <input type="radio" name="q1" value="1789"> 1789<br>
                <input type="radio" name="q1" value="1793"> 1793<br>
                <input type="radio" name="q1" value="1799"> 1799<br>
                <input type="radio" name="q1" value="1804"> 1804<br>
            </div>
            
            <div class="question">
                <p>2. ¿Qué evento marcó el inicio de la Revolución Francesa?</p>
                <input type="radio" name="q2" value="Toma de la Bastilla"> Toma de la Bastilla<br>
                <input type="radio" name="q2" value="El Reinado del Terror"> El Reinado del Terror<br>
                <input type="radio" name="q2" value="La Declaración de los Derechos del Hombre"> La Declaración de los Derechos del Hombre<br>
                <input type="radio" name="q2" value="La ejecución de Luis XVI"> La ejecución de Luis XVI<br>
            </div>
            
            <div class="question">
                <p>3. ¿Quién fue el líder más destacado durante la Revolución Francesa?</p>
                <input type="radio" name="q3" value="Napoleón Bonaparte"> Napoleón Bonaparte<br>
                <input type="radio" name="q3" value="Maximilien Robespierre"> Maximilien Robespierre<br>
                <input type="radio" name="q3" value="Luis XVI"> Luis XVI<br>
                <input type="radio" name="q3" value="Marie Antoinette"> Marie Antoinette<br>
            </div>
            
            <div class="question">
                <p>4. ¿Qué documento se proclamó en 1789 que sentó las bases de los derechos humanos?</p>
                <input type="radio" name="q4" value="Constitución Francesa"> Constitución Francesa<br>
                <input type="radio" name="q4" value="Declaración de los Derechos del Hombre y del Ciudadano"> Declaración de los Derechos del Hombre y del Ciudadano<br>
                <input type="radio" name="q4" value="Tratado de Versalles"> Tratado de Versalles<br>
                <input type="radio" name="q4" value="Carta Magna"> Carta Magna<br>
            </div>
            
            <div class="question">
                <p>5. ¿Qué fue el "Reinado del Terror"?</p>
                <input type="radio" name="q5" value="Período de paz"> Período de paz<br>
                <input type="radio" name="q5" value="Período de ejecuciones masivas"> Período de ejecuciones masivas<br>
                <input type="radio" name="q5" value="Desarrollo económico"> Desarrollo económico<br>
                <input type="radio" name="q5" value="Establecimiento de la monarquía"> Establecimiento de la monarquía<br>
            </div>
            
       <!-- Botón de enviar -->
       <button type="button" id="submit-btn">Enviar</button>
    </form>
    <div id="result" style="margin-top: 20px; display: none;">
        <p id="summary"></p>
    </div>
</div>

    <footer>
        <p>© 2024 Quiz de Historia - Revolución Francesa</p>
    </footer>
</body>
</html>
