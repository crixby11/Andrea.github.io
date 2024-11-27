<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle de Cita Agendada</title>

</head>
<style>
.details-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.details-table th, .details-table td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

.details-table th {
  background-color: #f4f4f9;
  font-weight: bold;
}

.details-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.details-table tr:nth-child(odd) {
  background-color: #ffffff;
}

.details-table tr:hover {
  background-color: #f1f1f1;
}

.btn {
  display: inline-block;
  margin-top: 20px;
  padding: 10px 20px;
  text-decoration: none;
  background-color: #007bff;
  color: #ffffff;
  border-radius: 5px;
  font-size: 16px;
}

.btn:hover {
  background-color: #0056b3;
}


</style>
<body>
  <div class="container">
    <div class="card">
      <h1>Detalle de la Cita Agendada</h1>

      <?php
      // Conexión a la base de datos
      $servidor="localhost";
      $baseDeDatos="website";
      $usuario="root";
      $contrasenia="";
      
      try {
          $conn = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Obtener todas las citas agendadas
          $stmt = $conn->prepare("SELECT * FROM appointments ORDER BY id ASC");
          $stmt->execute();
          $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if ($appointments) {
              // Mostrar los datos en una tabla
              echo '<table class="details-table">
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha y Hora</th>
                        <th>Ciudad</th>
                        <th>Doctor</th>
                        <th>Mensaje</th>
                      </tr>';
              
              foreach ($appointments as $appointment) {
                  echo '<tr>
                          <td>' . htmlspecialchars($appointment['id']) . '</td>
                          <td>' . htmlspecialchars($appointment['name']) . '</td>
                          <td>' . htmlspecialchars($appointment['email']) . '</td>
                          <td>' . htmlspecialchars($appointment['phone']) . '</td>
                          <td>' . htmlspecialchars($appointment['date']) . '</td>
                          <td>' . htmlspecialchars($appointment['city']) . '</td>
                          <td>' . htmlspecialchars($appointment['doctor']) . '</td>
                          <td>' . htmlspecialchars($appointment['message']) . '</td>
                        </tr>';
              }

              echo '</table>';
          } else {
              echo "<p>No se encontraron citas agendadas.</p>";
          }
      } catch (PDOException $e) {
          echo "<p>Error al conectar a la base de datos: " . $e->getMessage() . "</p>";
      }
      ?>

      <a href="index.php" class="btn">Regresar</a>
    </div>
  </div>
</body>
</html>