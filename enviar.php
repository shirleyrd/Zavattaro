<?php
// Obtenemos los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = isset($_POST['email']) ? $_POST['email'] : '';
$consulta = $_POST['consulta'];

// Dirección de destino
$to = "info@zavattaroyasociados.com"; // ← poné tu correo real
$subject = "Nuevo mensaje desde tu sitio web";

// Cuerpo del mensaje
$body = "Nombre: $nombre\n";
$body .= "Teléfono: $telefono\n";
if (!empty($email)) {
    $body .= "Email: $email\n";
}
$body .= "Motivo de consulta:\n$consulta";

// Cabeceras
$headers = !empty($email) ? "From: $email" : "";

// Enviar el mail
if (mail($to, $subject, $body, $headers)) {
    // Si el mail se envió correctamente, redirige con un mensaje de éxito
    echo "<script>
            alert('¡Su mensaje fue enviado con éxito!');
            window.location.href = 'index.html'; // Redirige a la página principal o donde quieras
          </script>";
} else {
    // Si hay un error en el envío
    echo "<script>
            alert('Error al enviar el mensaje.');
            window.location.href = 'index.html'; // Redirige de nuevo al formulario
          </script>";
}
?>