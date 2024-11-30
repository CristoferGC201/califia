<?php include __DIR__ . '/includes/header.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/stylesCursos.css">
<body>
    <!-- Sección principal de contenido de la página de Biología -->
    <section class="hero">
        <div class="container">
            <h1>Biología</h1>
            <h2>Informe sobre las Partes de una Célula</h2>
            <p>
                Las células son la unidad fundamental de la vida. A continuación se describe cada uno de los orgánulos celulares 
                y sus funciones.
            </p>

            <!--
                Detalle de cada orgánulo y su función:
                Aquí se explican los orgánulos de una célula en párrafos separados para una lectura más fácil.
            -->
            <p>El núcleo es el "centro de control" de la célula, ya que contiene la mayor parte del ADN y regula actividades como el crecimiento y el metabolismo.</p>
            <p>Las mitocondrias son "centrales energéticas" que producen ATP, necesario para la energía celular.</p>
            <p>Los ribosomas son responsables de la síntesis de proteínas, esenciales para las funciones celulares.</p>
            <p>El retículo endoplasmático participa en la síntesis de proteínas (rugoso) y en la síntesis de lípidos y detoxificación (liso).</p>
            <p>Los cloroplastos son exclusivos de células vegetales y realizan la fotosíntesis, generando oxígeno y energía química.</p>
            <p>La membrana celular regula el intercambio de sustancias entre la célula y el entorno, manteniendo el equilibrio celular.</p>
            <p>El citoesqueleto proporciona soporte estructural, permitiendo la forma y el movimiento celular.</p>
            
                         <!-- Botón de descarga del pdf-->
                         <div style="margin: 20px 0;">
                <a href="downloads/Partes_de_una_celula.pdf" class="btn btn-primary" download style="padding: 5px 15px; font-size: 12px; background-color: #007bff; color: white; border-radius: 5px; text-decoration: none;">
                    Descargar partes de una celula (PDF)
                </a>

            <h4>Videos Educativos sobre Células:</h4>
            <!-- Aquí agregamos los videos de forma accesible -->
            <section class="videos" style="margin-top: 40px; padding: 20px; background-color: #f9f9f9;">
                <div class="container">
                    <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
                        <!-- Video 1 -->
                        <div style="flex: 1; min-width: 300px; max-width: 45%;">
                            <iframe width="100%" height="250" 
                                    src="https://www.youtube.com/embed/aoj9oTvVJ8o?rel=0&cc_load_policy=1" 
                                    title="La célula para niños - Ciencia para niños" 
                                    frameborder="0" allowfullscreen 
                                    aria-label="Video educativo sobre la célula para niños, explicando sus partes y funciones.">
                            </iframe>
                            <p style="text-align: center;">La célula para niños - Ciencia para niños</p>
                        </div>
                        
                        <!-- Video 2 -->
                        <div style="flex: 1; min-width: 300px; max-width: 45%;">
                            <iframe width="100%" height="250" 
                                    src="https://www.youtube.com/embed/tR3Iq2voxUU?rel=0&cc_load_policy=1" 
                                    title="La célula y sus partes | Vídeos educativos para niños" 
                                    frameborder="0" allowfullscreen 
                                    aria-label="Video educativo sobre la célula y sus partes, dirigido a niños.">
                            </iframe>
                            <p style="text-align: center;">La célula y sus partes | Vídeos educativos para niños</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Enlace al examen de Biología -->
            <a href="Examenes/Biologia_quiz.html" class="btn btn-secondary">Examen</a>
        </div>
    </section>
    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
