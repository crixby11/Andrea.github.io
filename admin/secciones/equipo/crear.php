<?php
include ("../../bd.php");
include ("../../templates/header.php");

if ($_POST) {
    $imagen = (isset ($_FILES['imagen']['name'])) ? $_FILES["imagen"]["name"] : "";
    $nombrecompleto = (isset ($_POST['nombrecompleto'])) ? $_POST['nombrecompleto'] : "";
    $puesto = (isset ($_POST['puesto'])) ? $_POST['puesto'] : "";
    $whatsapp = (isset ($_POST['whatsapp'])) ? $_POST['whatsapp'] : "";
    $facebook = (isset ($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset ($_POST['linkedin'])) ? $_POST['linkedin'] : "";

    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/team/" . $nombre_archivo_imagen);
    }


    $sentencia = $conexion->prepare("INSERT INTO `tbl_equipo` 
(`ID`, `imagen`, `nombrecompleto`, `puesto`, `whatsapp`,`facebook`,`linkedin`) 
VALUES (NULL,:imagen,:nombrecompleto,:puesto,:whatsapp,:facebook,:linkedin);");

    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":nombrecompleto", $nombrecompleto);
    $sentencia->bindParam(":puesto", $puesto);
    $sentencia->bindParam(":whatsapp", $whatsapp);
    $sentencia->bindParam(":facebook", $facebook);
    $sentencia->bindParam(":linkedin", $linkedin);
    $sentencia->execute();

    $mensaje="registro exitoso";
    header("Location:index.php?mensaje=".$mensaje);
}



?>

<div class="card">
    <div class="card-header">Integrantes del Equipo</div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">

                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId"
                    placeholder="imagen" />
            </div>

            <div class="mb-3">
                <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
                <input type="text" class="form-control" name="nombrecompleto" id="nombrecompleto"
                    aria-describedby="helpId" placeholder="Nombre" />
            </div>

            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" class="form-control" name="puesto" id="puesto" aria-describedby="helpId"
                    placeholder="Puesto" />
            </div>

            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp:</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" aria-describedby="helpId"
                    placeholder="whatsapp" />
            </div>


            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook: </label>
                <input type="text" class="form-control" name="facebook" id="facebook" aria-describedby="helpId"
                    placeholder="Facebook" />
            </div>

            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin:</label>
                <input type="text" class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId"
                    placeholder="Linkedin" />
            </div>
            <button type="submit" class="btn btn-success">
                Agregar
            </button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>



        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php
include ("../../templates/footer.php");
?>