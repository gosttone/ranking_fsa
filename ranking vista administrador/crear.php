<?php 
    include 'includes/header.php';
    require_once 'includes/connect.php';
    include 'includes/generatebd.php'
?>
<?php 
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
            $pos = $cant_players + 1;
            $sql = "INSERT INTO usuarios VALUES(NULL, '{$pos}', '{$_POST["rank"]}', '{$_POST["nombre"]}')";
            $insert_user = mysqli_query($db, $sql);
        } else {
            $insert_user = false;
        } 
    }  
?>

<div class="container">
    <div>
        <h1 class="inline">Nuevo Usuario</h1>
        <a href="index.php" class="btn btn-primary float-right agregar-jugador">
            <i class="fas fa-undo"></i>
            Regresar
        </a>
    </div>
	<fieldset class="short">	
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="rank">Rank</label>
               <input type="text" class="form-control" name="rank" placeholder="Rank" required>
            </div>
            <div class="form-group">
                   <label for="nombre">Nombre</label>
               <input type="text" class="form-control" name="nombre" placeholder="Nombre de Usuario" required>
            </div>
            <button type="submit" class="btn btn-warning" name="submit">Agregar Jugador</button>
	    </form>
    </fieldset>
    <br/>
    <?php if (isset($_POST["submit"]) && count($errors)==0 && $insert_user != false) { ?>
        <div class="alert alert-dismissible alert-success short">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Usuario creado exitosamente!</strong>
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