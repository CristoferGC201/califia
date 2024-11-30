document.addEventListener("DOMContentLoaded", () => {
    const startTime = new Date(); // Marca el inicio del examen
    document.getElementById("tiempo_inicio").value = startTime.toISOString(); // ISO para formato consistente

    const submitButton = document.getElementById("submit-btn");

    submitButton.addEventListener("click", () => {
        const endTime = new Date(); // Marca el final del examen
        document.getElementById("tiempo_fin").value = endTime.toISOString();

        document.getElementById("exam-form").submit(); // Envía el formulario
    });
});

    let startTime = Date.now();
    let attempts = 0;
    const correctAnswers = {
        q1: "Madrid",
        q2: "París",
        q3: "Tokio",
        q4: "Buenos Aires",
        q5: "Canberra"
    };
    let timerElement = document.getElementById('timer');
    let submitButton = document.getElementById('submit-btn');
    let resultElement = document.getElementById('result');
    let summaryElement = document.getElementById('summary');
    
    // Actualiza el temporizador
    function updateTimer() {
        let currentTime = Date.now();
        let elapsedTime = currentTime - startTime;
        let minutes = Math.floor(elapsedTime / 60000);
        let seconds = Math.floor((elapsedTime % 60000) / 1000);
        timerElement.textContent = `${minutes < 10 ? "0" : ""}${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
    }
    
    // Temporizador que se actualiza cada segundo
    setInterval(updateTimer, 1000);
    
    // Verifica que todas las preguntas estén respondidas
    function validateAnswers() {
        const questions = Object.keys(correctAnswers); // Llaves de las preguntas (q1, q2, etc.)
        let allAnswered = true;
    
        questions.forEach(question => {
            const options = document.querySelectorAll(`input[name="${question}"]`);
            const isAnswered = Array.from(options).some(option => option.checked);
            if (!isAnswered) {
                allAnswered = false;
            }
        });
    
        return allAnswered;
    }
    
    // Manejo del envío
    submitButton.addEventListener('click', function() {
        if (!validateAnswers()) {
            alert("Por favor, responde todas las preguntas antes de enviar el examen.");
            return;
        }
    
        attempts++;
    
        let formData = new FormData(document.getElementById('exam-form'));
        let userAnswers = {};
        for (let [key, value] of formData.entries()) {
            userAnswers[key] = value;
        }
    
        let correctCount = 0;
        for (let question in correctAnswers) {
            if (userAnswers[question] === correctAnswers[question]) {
                correctCount++;
            }
        }
    
        let endTime = Date.now();
        let elapsedTime = endTime - startTime;
        let minutes = Math.floor(elapsedTime / 60000);
        let seconds = Math.floor((elapsedTime % 60000) / 1000);
        let tiempo = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
    
        // Enviar los datos al servidor
        fetch('guardarResultadosGeo.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                usuario_id: 1, // Cambiar por el ID real del usuario si está disponible
                intentos: attempts,
                respuestas_correctas: correctCount,
                total_preguntas: Object.keys(correctAnswers).length,
                tiempo: tiempo
            })
        }).then(response => response.text())
          .then(data => {
              console.log(data);
              alert("Resultados guardados con éxito.");
              header("Location: perfilUsuario.php");
                    exit();
              exit;
              
          }).catch(error => console.error('Error:', error));
    });
    
    