<?php
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id ");   
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

}

$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");
?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Eventos</h1>
        <p class="col-md-8 fs-4">
           Si añade un evento se vera reflejado en la pagina web principal de estudiante.
        </p>
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        

    </div>
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Icono</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Accion</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_servicios as $registros) {
                        ?>
                        <tr class="">
                            <td>
                                <?php echo $registros['ID']; ?>
                            </td>
                            <td>
                                <?php echo $registros['icono']; ?>
                            </td>
                            <td>
                                <?php echo $registros['titulo']; ?>
                            </td>
                            <td>
                                <?php echo $registros['descripcion']; ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>



    </div>
</div>

<?php
include("../../templates/footer.php");
?>