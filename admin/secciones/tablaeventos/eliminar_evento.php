<?php
include("../../bd.php"); // Asegúrate de que este es el camino correcto al archivo de conexión a tu base de datos

if(isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    try {
        $query = "DELETE FROM calendar_event_master WHERE event_id = :event_id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        
        if($statement->execute()) {
            // Redirigir de vuelta a la página de eventos con un mensaje de éxito
            header('Location: index.php?mensaje=eliminado');
        } else {
            // Manejar el caso de error
            header('Location: index.php?mensaje=error');
        }
    } catch (PDOException $error) {
        // Manejar error
        die("Error en la eliminación: " . $error->getMessage());
    }
} else {
    // Redirigir si el ID del evento no está presente
    header('Location: index.php');
}
?>