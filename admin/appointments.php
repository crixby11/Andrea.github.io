<?php

$servidor="localhost";
$baseDeDatos="website";
$usuario="root";
$contrasenia="";

try {
    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);

    
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $date = htmlspecialchars($_POST['date']);
        $city = htmlspecialchars($_POST['department']);
        $doctor = htmlspecialchars($_POST['doctor']);
        $message = htmlspecialchars($_POST['message']);

        // Validar campos requeridos (opcional)
        if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($city) || empty($doctor)) {
            echo json_encode(["status" => "error", "message" => "Todos los campos son requeridos."]);
            exit;
        }

        // Insertar los datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, date, city, doctor, message) 
                                VALUES (:name, :email, :phone, :date, :city, :doctor, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':doctor', $doctor);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Cita agendada correctamente."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al agendar la cita."]);
        }
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Error en la conexión: " . $e->getMessage()]);
}
?>