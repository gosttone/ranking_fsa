<?php 
    include 'includes/header.php';
    require_once 'includes/connect.php';
    include 'includes/generatebd.php'
?>
<?php
    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location:index.php");
    }
    
    $id = $_GET["id"];
    $player_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
    $player = mysqli_fetch_assoc($player_query);
    $rank = $player["rank"];
    $nombre = $player["nombre"];

    if (!isset($player["usuario_id"]) || empty($player["usuario_id"])) {
        header("Location:index.php");
    }

    $errors = array();
    if (isset($_POST["submit"])) {
        if (!empty($_POST["rank"])) {
            $rank_validate = true;
        } else {
            $rank_validate = false;
            $errors["rank"] = "Error. El rank no puede estar vacío.";
        }
        
        if (!empty($_POST["nombre"])) {
            $nombre_validate = true;
        } else {
            $nombre_validate = false;
            $errors["nombre"] = "Error. El nombre no puede estar vacío.";
        }
        
        if (count($errors)==0) {
            $sql = "UPDATE usuarios set rank = '{$_POST["rank"]}', nombre = '{$_POST["nombre"]}' WHERE usuario_id = {$player["usuario_id"]};";
            $update_user = mysqli_query($db, $sql);
            $rank = $_POST["rank"];
            $nombre = $_POST["nombre"];
        } else {
            $update_user = false;
        } 
    }  
?>

<div class="container">
    <div>
        <h1 class="inline">Editar Usuario</h1>
        <a href="index.php" class="btn btn-primary float-right agregar-jugador">
            <i class="fas fa-undo"></i>
            Regresar
        </a>
    </div>
	<fieldset class="short">	
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="rank">Rank</label>
               <input type="text" class="form-control" name="rank" placeholder="Rank"  value="<?=$rank?>" required>
            </div>
            <div class="form-group">
                   <label for="nombre">Nombre</label>
               <input type="text" class="form-control" name="nombre" placeholder="Nombre de Usuario" value="<?=$nombre?>" required>
            </div>
            <button type="submit" class="btn btn-warning" name="submit">Guardar Cambios</button>
	    </form>
    </fieldset>
    <br/>
    <?php if (isset($_POST["submit"]) && count($errors)==0 && $update_user != false) { ?>
        <div class="alert alert-dismissible alert-success short">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Usuario actualizado exitosamente!</strong>
            <br/><a href="index.php" class="alert-link"><i class="far fa-hand-point-right"></i> Click para regresar al Ranking</a>.
        </div>
    <?php } ?>
    <pre>
        <?php 
            if (count($errors)!=0) {
                print_r($errors); 
            }
        ?>
    </pre>
</div> 
<?php include 'includes/footer.php';?>