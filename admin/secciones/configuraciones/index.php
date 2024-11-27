<?php 
include ("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_configuracion WHERE ID=:id ");   
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

}

$sentencia = $conexion->prepare("SELECT * FROM `tbl_configuracion`");
$sentencia->execute();
$lista_configuraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);


include ("../../templates/header.php");
?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Configuraciones</h1>
        <p class="col-md-8 fs-4">
          Aqui podra modificar cada detalla con respecto a la interfaz de la pagina web principal.
        </p>
         <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Nueva Modificacion</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
    
    </div>
    <div class="card-body">
      
    <div
        class="table-responsive-sm"
    >
        <table
            class="table "
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de la configuracion</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_configuraciones as $registros) { ?>

                <tr class="">
                    <td><?php echo $registros['ID'];?></td>
                    <td><?php echo $registros['nombreconfiguracion'];?></td>
                    <td><?php echo $registros['valor'];?></td>
                    <td><a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a></td>
               </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php 
include ("../../templates/footer.php");
?>
