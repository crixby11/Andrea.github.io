<?php
include("../../bd.php"); // Asegúrate de que el path sea correcto

// Verifica si se ha pasado un ID de evento
if(isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Prepara y ejecuta la consulta para obtener los datos del evento
    $query = "SELECT * FROM calendar_event_master WHERE event_id = ?";
    $statement = $conexion->prepare($query);
    $statement->execute([$event_id]);
    $evento = $statement->fetch(PDO::FETCH_ASSOC);

    if(!$evento) {
        // Manejar el error en caso de que no se encuentre el evento
        echo "Evento no encontrado";
        exit;
    }
} else {
    // Redireccionar si no se ha proporcionado un ID de evento
    header('Location: index.php');
    exit;
}
?>

<!-- Mostrar el formulario con los datos actuales del evento -->
<form action="actualizar_evento.php" method="post">
    <input type="hidden" name="event_id" value="<?php echo $evento['event_id']; ?>">
    <!-- Agrega aquí los campos del formulario con los valores actuales como 'value' -->
    <!-- Por ejemplo: -->
    <input type="text" name="event_name" value="<?php echo htmlspecialchars($evento['event_name'], ENT_QUOTES); ?>">
    <!-- Repite para cada campo del evento -->
    <input type="submit" value="Actualizar Evento">
</form>
