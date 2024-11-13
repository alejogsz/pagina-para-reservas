// script.js

// Función para manejar el inicio de sesión
function login(event) {
    event.preventDefault(); // Prevenir el envío estándar del formulario

    // Obtener los valores del formulario
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Crear un objeto para enviar los datos
    const formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);

    // Realizar la solicitud al servidor
    fetch("login.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => {
            if (data.trim() === "success") {
                // Si las credenciales son válidas, mostrar los espacios
                document.getElementById("login-container").style.display = "none";
                document.getElementById("spaces-container").style.display = "block";
            } else {
                // Si las credenciales son incorrectas, mostrar un mensaje
                alert("Usuario o contraseña incorrectos. Intente de nuevo.");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

// Mostrar el contenedor de horarios de un espacio específico
function showSchedule(spaceName) {
    document.getElementById("space-title").innerText = `Horario de Disponibilidad - ${spaceName}`;
    document.getElementById("spaces-container").style.display = "none";
    document.getElementById("schedule-container").style.display = "block";
}

// Volver a la vista de espacios
function backToSpaces() {
    document.getElementById("schedule-container").style.display = "none";
    document.getElementById("spaces-container").style.display = "block";
}

// Mostrar el mensaje de reserva
function reserveSlot(status) {
    const modal = document.getElementById("reservationMessage");
    const messageText = document.getElementById("messageText");

    if (status === "success") {
        messageText.innerHTML = "Reserva exitosa";
        messageText.style.color = "#4CAF50"; // Verde para éxito
    } else {
        messageText.innerHTML = "Reserva no disponible";
        messageText.style.color = "#F44336"; // Rojo para no disponible
    }

    modal.style.display = "flex"; // Mostrar el modal
}

// Cerrar el modal de mensaje
function closeModal() {
    const modal = document.getElementById("reservationMessage");
    modal.style.display = "none"; // Ocultar el modal
}

// Asignar la función de inicio de sesión al formulario
document.querySelector("form").addEventListener("submit", login);
