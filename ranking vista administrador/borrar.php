<?php
    require_once 'includes/connect.php';
    include 'includes/header.php';
    
    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location:index.php");
    }
    
    $id = $_GET["id"];
    $player_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
    $player = mysqli_fetch_assoc($player_query);
    $nombre = $player["nombre"];
    $posicion = $player["posicion"];

    if (!isset($player["usuario_id"]) || empty($player["usuario_id"])) {
        header("Location:index.php");
    }
    
    if (isset($_POST['aceptar'])) {
        $delete = mysqli_query($db, "DELETE FROM usuarios WHERE usuario_id = {$id}");
        $update = mysqli_query($db, "UPDATE usuarios set posicion = posicion - 1 WHERE posicion > {$posicion};");
        header("Location: index.php");
    }
    
    if (isset($_POST['cancelar'])) {
        header("Location:index.php");
    }
?>
<div class="jumbotron short">
	<h4 class="alert-heading">¿Está seguro de borrar al usuario <strong><?=$nombre?></strong>?</h4>
	<div>
        <form action="" method="POST" enctype="multipart/form-data">
            <button type="submit" class="btn btn-success" name="aceptar">Aceptar</button>
            <button type="submit" class="btn btn-danger" name="cancelar">Cancelar</button>
        </form>
	</div>
</div>

<?php include 'includes/footer.php'?>


