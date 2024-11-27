    <?php
include("../../bd.php"); // Asegúrate de que este path sea correcto

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperando y limpiando los valores del formulario
    $event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_NUMBER_INT);
    $event_name = htmlspecialchars(trim($_POST['event_name']));
    $event_start_date = isset($_POST['event_start_date']) ? date("Y-m-d", strtotime($_POST['event_start_date'])) : null;
    $event_start_time = isset($_POST['event_start_time']) ? $_POST['event_start_time'] : null;
    $event_end_date = isset($_POST['event_end_date']) ? date("Y-m-d", strtotime($_POST['event_end_date'])) : null;
    $event_end_time = isset($_POST['event_end_time']) ? $_POST['event_end_time'] : null;
    $destino = filter_input(INPUT_POST, 'destino', FILTER_SANITIZE_STRING);
    $costo = filter_input(INPUT_POST, 'costo', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $cupos = filter_input(INPUT_POST, 'cupos', FILTER_SANITIZE_NUMBER_INT);
    $clase = filter_input(INPUT_POST, 'clase', FILTER_SANITIZE_STRING);
    $licenciado_a_cargo = filter_input(INPUT_POST, 'licenciado_a_cargo', FILTER_SANITIZE_STRING);
    $seguro_de_viaje = ($_POST['seguro_de_viaje'] == '1') ? 1 : 0;
    $formulario_url = filter_input(INPUT_POST, 'formulario_url', FILTER_SANITIZE_URL);

    // SQL para actualizar los datos en la base de datos
    $sql = "UPDATE calendar_event_master SET event_name = ?, event_start_date = ?, start_time = ?, event_end_date = ?, end_time = ?, destino = ?, costo = ?, cupos = ?, clase = ?, licenciado_a_cargo = ?, seguro_de_viaje = ?, formulario_url = ? WHERE event_id = ?";

    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        echo "Error al preparar la consulta.";
        exit;
    }

    $stmt->execute([$event_name, $event_start_date, $event_start_time, $event_end_date, $event_end_time, $destino, $costo, $cupos, $clase, $licenciado_a_cargo, $seguro_de_viaje, $formulario_url, $event_id]);

    header("Location: index.php?mensaje=EventoActualizado");
    exit;
} elseif (isset($_GET['event_id'])) {
    // Aquí se cargarían los datos del evento para mostrarlos en el formulario
    $event_id = filter_input(INPUT_GET, 'event_id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM calendar_event_master WHERE event_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$event_id]);
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$evento) {
        echo "Evento no encontrado";
        exit;
    }

    // Continúa con la parte del HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <!-- Incluye el CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Evento</h2>
        <form action="actualizar_evento.php" method="POST">
            <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($evento['event_id']); ?>">

            <div class="mb-3">
                <label for="event_name" class="form-label">Nombre del Evento</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required value="<?php echo htmlspecialchars($evento['event_name']); ?>">
            </div>

            <!-- Repite este bloque para los demás campos del formulario, asegurándote de ajustar los IDs, nombres y valores -->

            <div class="mb-3">
                <label for="event_start_date" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="event_start_date" name="event_start_date" required value="<?php echo htmlspecialchars($evento['event_start_date']); ?>">
            </div>

            <!-- Agrega aquí los campos para event_start_time, event_end_date, event_end_time, destino, etc. -->

            <div class="mb-3">
                <label for="seguro_de_viaje" class="form-label">Seguro de Viaje</label>
                <select class="form-control" id="seguro_de_viaje" name="seguro_de_viaje">
                    <option value="1" <?php echo ($evento['seguro_de_viaje'] == 1) ? 'selected' : ''; ?>>Sí</option>
                    <option value="0" <?php echo ($evento['seguro_de_viaje'] == 0) ? 'selected' : ''; ?>>No</option>
                </select>
            </div>

            <!-- Continúa desde el último campo agregado -->
            
            <div class="mb-3">
                <label for="event_end_date" class="form-label">Fecha de Cierre</label>
                <input type="date" class="form-control" id="event_end_date" name="event_end_date" required value="<?php echo htmlspecialchars($evento['event_end_date']); ?>">
            </div>

            <div class="mb-3">
                <label for="start_time" class="form-label">Hora de Inicio</label>
                <input type="time" class="form-control" id="start_time" name="event_start_time" required value="<?php echo htmlspecialchars($evento['start_time']); ?>">
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label">Hora de Cierre</label>
                <input type="time" class="form-control" id="end_time" name="event_end_time" required value="<?php echo htmlspecialchars($evento['end_time']); ?>">
            </div>

            <div class="mb-3">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" class="form-control" id="destino" name="destino" required value="<?php echo htmlspecialchars($evento['destino']); ?>">
            </div>

            <div class="mb-3">
                <label for="costo" class="form-label">Costo</label>
                <input type="number" class="form-control" id="costo" name="costo" required value="<?php echo htmlspecialchars($evento['costo']); ?>">
            </div>

            <div class="mb-3">
                <label for="cupos" class="form-label">Cupos</label>
                <input type="number" class="form-control" id="cupos" name="cupos" required value="<?php echo htmlspecialchars($evento['cupos']); ?>">
            </div>

            <div class="mb-3">
                <label for="clase" class="form-label">Clase</label>
                <input type="text" class="form-control" id="clase" name="clase" required value="<?php echo htmlspecialchars($evento['clase']); ?>">
            </div>

            <div class="mb-3">
                <label for="licenciado_a_cargo" class="form-label">Licenciado a cargo</label>
                <input type="text" class="form-control" id="licenciado_a_cargo" name="licenciado_a_cargo" required value="<?php echo htmlspecialchars($evento['licenciado_a_cargo']); ?>">
            </div>

            <div class="mb-3">
                <label for="formulario_url" class="form-label">Formulario URL</label>
                <input type="url" class="form-control" id="formulario_url" name="formulario_url" value="<?php echo htmlspecialchars($evento['formulario_url']); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
</body>
</html>
<?php
// Cierra el bloque PHP aquí si no hay más código PHP después
}
?>
