<?php
include("../../bd.php");
include("../../templates/header.php");
?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Eventos</h1>
        <p class="col-md-8 fs-4">
            Esta tabla es unicamente para reflejar los datos del calendario, no es para editar o eliminar. 
    </p>
    </div>
</div>

<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>                        
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de Evento:</th>
                        <th scope="col">Fecha de Inicio</th>
                        <th scope="col">Fecha de Cierre</th>
                        <th scope="col">Hora de Inicio</th>
                        <th scope="col">Hora de Cierre</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Cupos</th>
                        <th scope="col">Clase</th>
                        <th scope="col">Licenciado</th>
                        <th scope="col">Seguro de Viaje</th>
                        <th scope="col">Formulario URL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL para obtener los datos de la base de datos
                    $query = "SELECT * FROM calendar_event_master"; // Reemplaza 'nombre_de_la_tabla' con el nombre real de tu tabla
                    
                    // Ejecutar la consulta
                    try {
                        $statement = $conexion->query($query);
                        
                        // Verificar si hay resultados
                        if ($statement->rowCount() > 0) {
                            // Iterar sobre los resultados y mostrarlos en la tabla
                            while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $fila['event_id'] . "</td>";
                                echo "<td>" . $fila['event_name'] . "</td>";
                                echo "<td>" . $fila['event_start_date'] . "</td>";
                                echo "<td>" . $fila['event_end_date'] . "</td>";
                                echo "<td>" . $fila['start_time'] . "</td>";
                                echo "<td>" . $fila['end_time'] . "</td>";
                                echo "<td>" . $fila['destino'] . "</td>";
                                echo "<td>" . $fila['costo'] . "</td>";
                                echo "<td>" . $fila['cupos'] . "</td>";
                                echo "<td>" . $fila['clase'] . "</td>";
                                echo "<td>" . $fila['licenciado_a_cargo'] . "</td>";
                                echo "<td>" . $fila['seguro_de_viaje'] . "</td>";
                                echo "<td>" . $fila['formulario_url'] . "</td>";
                                echo "<td><a href='eliminar_evento.php?event_id=" . $fila['event_id'] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este evento?\");'>Eliminar</a></td>";
                                echo "<td><a href='actualizar_evento.php?event_id=" . $fila['event_id'] . "' class='btn btn-primary'>Editar</a></td>";                     
                                echo "</tr>";

                            }
                        } else {
                            // No hay resultados
                            echo "<tr><td colspan='13'>No hay eventos disponibles</td></tr>";
                        }
                    } catch (PDOException $error) {
                        // Manejo de errores
                        echo "Error de consulta: " . $error->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include("../../templates/footer.php");
?>