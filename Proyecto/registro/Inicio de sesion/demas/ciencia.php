<?php include __DIR__ . '/Includes/header.php'; ?>
<body>
    <section class="hero">
        <div class="container">
            <h1>Ciencias</h1>
            <h2>Lección sobre la Tabla Periódica y Elementos Químicos</h2>
            <p>La tabla periódica es una representación sistemática de todos los elementos químicos conocidos, organizados de acuerdo con sus propiedades atómicas y electrónicas. Desde su creación, ha servido como una herramienta fundamental en la química, permitiendo a los científicos y estudiantes identificar patrones y relaciones entre los elementos.</p>
            
            <img src="images/tabla_periodica6.jpg" alt="Tabla Periódica" style="width:100%; height:auto;">
             <!-- Botón de descarga del pdf-->
             <div style="margin: 20px 0;">
                <a href="downloads/tabla_periodica.pdf" class="btn btn-primary" download style="padding: 5px 15px; font-size: 12px; background-color: #007bff; color: white; border-radius: 5px; text-decoration: none;">
                    Descargar Tabla Periódica (PDF)
                </a>
                <section class="hero">
    <div class="container" style="column-count: 2; column-gap: 20px; text-align: justify;"> <!-- Aqui agregue que fuera de 2 coulumas por ahora lo deje asi para ver como se miaba-->
        <h3>Origen de la Tabla Periódica</h3>
        <p>La historia de la tabla periódica se remonta a finales del siglo XIX, cuando Dmitri Mendeléyev, un químico ruso, organizó los elementos en función de sus propiedades y masas atómicas. A pesar de algunos errores, como la posición del hidrógeno, su trabajo sentó las bases para la moderna tabla periódica. En el siglo XX, el descubrimiento de la estructura atómica y el número atómico permitió la reestructuración de la tabla, donde los elementos se organizaron por su número atómico en lugar de la masa. Este enfoque resultó en la tabla periódica que utilizamos hoy, que ha sido actualizada para incluir nuevos elementos descubiertos en laboratorios.</p>
        
        <h3>Estructura de la Tabla Periódica</h3>
        <p>La tabla se divide en filas, conocidas como períodos, y columnas, llamadas grupos. Los elementos en un mismo grupo comparten propiedades químicas similares. Por ejemplo, los elementos del grupo 1, los metales alcalinos, son altamente reactivos, mientras que los del grupo 18, los gases nobles, son muy estables. La posición de un elemento en la tabla proporciona información sobre sus características químicas y físicas.</p>
        
        <h3>Utilidad de la Tabla Periódica</h3>
        <p>La tabla periódica es una herramienta crucial en diversas áreas:</p>
        <ul>
            <li><strong>Educación:</strong> Facilita el aprendizaje de la química, permitiendo a los estudiantes entender mejor las propiedades y comportamientos de los elementos.</li>
            <li><strong>Investigación:</strong> Los científicos utilizan la tabla para predecir cómo reaccionarán diferentes elementos en reacciones químicas, lo que es esencial en campos como la medicina, la ingeniería y la biotecnología.</li>
            <li><strong>Industria:</strong> Elementos como el hierro, el aluminio y el carbono son fundamentales en la fabricación de materiales, productos electrónicos y en la construcción.</li>
        </ul>

        
        <h3>Propiedades de los Elementos</h3>
        <p>Los elementos pueden clasificarse según sus propiedades en:</p>
        <ul>
            <li><strong>Metales:</strong> Generalmente son buenos conductores de electricidad y calor, tienen brillo, son maleables y dúctiles. Ejemplos incluyen el cobre y el hierro.</li>
            <li><strong>No Metales:</strong> Tienen propiedades más variadas y son generalmente malos conductores. El oxígeno y el carbono son ejemplos de no metales que son esenciales para la vida.</li>
            <li><strong>Metaloides:</strong> Exhiben características intermedias entre metales y no metales, y son importantes como semiconductores en la industria electrónica. El silicio es un ejemplo clave de metaloide.</li>
        </ul>

        <h3>Aplicaciones de los Elementos Químicos</h3>
        <p>Elementos Biológicos: Elementos como el carbono, hidrógeno, oxígeno y nitrógeno son la base de las moléculas biológicas, esenciales para la vida. Sin el carbono, por ejemplo, no existirían las estructuras complejas que forman las proteínas, los ácidos nucleicos y los carbohidratos.</p>
        
        <p>Elementos en la Tecnología: La química moderna ha permitido la creación de materiales innovadores. Por ejemplo, el grafeno, derivado del carbono, es conocido por su conductividad y resistencia, lo que abre posibilidades en electrónica y energías renovables.</p>
        
        <h3>Impacto Social y Medioambiental</h3>
        <p>Los elementos químicos también tienen un impacto significativo en el medio ambiente y la sociedad. La minería y el uso de recursos naturales han llevado a debates sobre sostenibilidad y responsabilidad. La extracción de metales pesados, por ejemplo, puede causar contaminación en el agua y el suelo, afectando ecosistemas y comunidades. Por lo tanto, el estudio y la comprensión de la tabla periódica no solo son esenciales para la química, sino también para abordar problemas globales como la salud ambiental y el desarrollo sostenible.</p>
    </div>
</section>


    <!-- Sección de videos -->
    <section class="videos" style="margin-top: 40px; padding: 20px; background-color: #f9f9f9;">
        <div class="container">
            <h2>Videos Educativos sobre la Tabla Periódica</h2>
            <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
                <!-- Video 1 -->
                <div style="flex: 1; min-width: 300px; max-width: 45%;">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/STTySxTMyDU" 
                            title="Video sobre elementos químicos y tabla periódica" frameborder="0" allowfullscreen>
                    </iframe>
                    <p style="text-align: center;">¿Qué son los elementos? ¿Y por qué usamos la tabla periódica?</p>
                </div>
                <!-- Video 2 -->
                <div style="flex: 1; min-width: 300px; max-width: 45%;">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/PsW0sGF5EBE" 
                            title="Video de introducción a la tabla periódica" frameborder="0" allowfullscreen>
                    </iframe>
                    <p style="text-align: center;">Química: Introducción a la Tabla Periódica</p>
                </div>
            </div>
        </div>
    </section>

    </ul>
            <a href="Examenes/Quimica_quiz.html" class="btn btn-secondary">Examen</a> <!-- Este es el link para hacer el examen-->
        </div>
    </section>

    <?php include __DIR__ . '/Includes/footer.php'; ?>
</body>
</html>
