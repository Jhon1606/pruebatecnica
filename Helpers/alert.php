<?php
function create_flash_message($mensaje, $detalle, $tipo)
{
    // Crea un mensaje en el formato adecuado
    return [
        'mensaje' => htmlspecialchars($mensaje), // Sanitiza el mensaje
        'detalle' => htmlspecialchars($detalle), // Sanitiza el detalle
        'tipo' => htmlspecialchars($tipo) // Sanitiza el tipo
    ];
}

function show_flash_messages()
{
    // Verifica si hay un mensaje en la URL
    if (isset($_GET['mensaje']) && isset($_GET['detalle']) && isset($_GET['tipo'])) {
        // Crea el mensaje flash
        $flash_message = create_flash_message($_GET['mensaje'], $_GET['detalle'], $_GET['tipo']);

        // Establece la clase CSS según el tipo de mensaje
        $alert_class = '';
        if ($flash_message['tipo'] === 'success') {
            $alert_class = 'alert alert-success';
        } elseif ($flash_message['tipo'] === 'error') {
            $alert_class = 'alert alert-danger';
        }

        // Muestra el mensaje
        echo '<div class="' . $alert_class . '" role="alert">';
        echo '<strong>' . $flash_message['mensaje'] . ':</strong> ' . $flash_message['detalle'];
        echo '</div>';
    }
}
