<?php 
include ("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM tbl_configuracion WHERE id=:id ");   
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $nombreconfiguracion=$registro['nombreconfiguracion'];
    $valor=$registro['valor'];

}

if($_POST){

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombreconfiguracion=(isset($_POST['nombreconfiguracion']))?$_POST['nombreconfiguracion']:"";
    $valor=(isset($_POST['valor']))?$_POST['valor']:"";

    $sentencia=$conexion->prepare("UPDATE `tbl_configuracion` 
    SET nombreconfiguracion=:nombreconfiguracion, valor=:valor
    WHERE ID=:id ;");
    

    $sentencia->bindParam(":nombreconfiguracion",$nombreconfiguracion);
    $sentencia->bindParam(":valor",$valor);
    $sentencia->bindParam(":id",$txtID);


    $sentencia->execute();

    $mensaje="registro agregado";
    header("Location:index.php?mensaje=".$mensaje);

}   
include ("../../templates/header.php");


?>

<div class="card">
    <div class="card-header">Configuracion:</div>
    <div class="card-body">
        
    <form action="" method="post">

    <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input value="<?php echo $txtID;?>"
            type="text"
            class="form-control"
            name="txtID"
            id="txtID"
            aria-describedby="helpId"
            placeholder="ID"
        />
    </div>
    

   
    <div class="mb-3">
        <label for="nombreconfiguracion" class="form-label">Nombre:</label>
        <input
        value="<?php echo $nombreconfiguracion;?>"
            type="text"
            class="form-control"
            name="nombreconfiguracion"
            id="nombreconfiguracion"
            aria-describedby="helpId"
            placeholder="Nombre de la configuracion"
        />
    </div>
    
    <div class="mb-3">
        <label for="valor" class="form-label">Valor:</label>
        <input
        value="<?php echo $valor;?>"
            type="text"
            class="form-control"
            name="valor"
            id="valor"
            aria-describedby="helpId"
            placeholder="Valor de la configuracion"
        />
    </div>

    <button type="submit" class="btn btn-success">
                Actualizar
            </button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        
        
    
    

    </form>

    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>
<?php 
include ("../../templates/footer.php");
?>

