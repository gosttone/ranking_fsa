<?php 
    include 'includes/header.php';
    require_once 'includes/connect.php';
    include 'includes/generatebd.php';
?>
<?php 
    if (isset($_GET["asc"]) && !empty($_GET["asc"]) && is_numeric($_GET["asc"])) {
        $id = $_GET["asc"];
        $player_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
        $player = mysqli_fetch_assoc($player_query);
        $posicion = $player["posicion"];
        $nombre = $player["nombre"];
        
        if (isset($player["usuario_id"]) || !empty($player["usuario_id"])) {
            if ($posicion == 1) {
                header("Location:index.php");
            } else {
                $update_pos = $posicion - 1 ; 
                $sql = "UPDATE usuarios set posicion = '{$posicion}' WHERE posicion = {$update_pos};";
                $sql2 = "UPDATE usuarios set posicion = '{$update_pos}' WHERE usuario_id = {$player["usuario_id"]};";
                $update_user1 = mysqli_query($db, $sql);
                $update_user2 = mysqli_query($db, $sql2);
                header("Location:index.php#".$nombre);
            }
        }
    }
    
    if (isset($_GET["desc"]) && !empty($_GET["desc"]) && is_numeric($_GET["desc"])) {
        $id = $_GET["desc"];
        $player_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
        $player = mysqli_fetch_assoc($player_query);
        $posicion = $player["posicion"];
        $nombre = $player["nombre"];
        
        if (isset($player["usuario_id"]) || !empty($player["usuario_id"])) {
            if ($posicion == $cant_players) {
                header("Location:index.php");
            } else {
                $update_pos = $posicion + 1 ; 
                $sql = "UPDATE usuarios set posicion = '{$posicion}' WHERE posicion = {$update_pos};";
                $sql2 = "UPDATE usuarios set posicion = '{$update_pos}' WHERE usuario_id = {$player["usuario_id"]};";
                $update_user1 = mysqli_query($db, $sql);
                $update_user2 = mysqli_query($db, $sql2);
                header("Location:index.php#".$nombre);
            }
        }
    }
?>
    <div class="container" id="listado">
        <div>
            <h1 class="inline">Ranking FSA</h1>
            <a href="crear.php" class="btn btn-primary float-right agregar-jugador">
                <i class="fas fa-user-plus"></i>
                Agregar Jugador
            </a>
        </div>
        <div class="table-center">
            <table class="table table-hover table-sm" >
                <tr class="table-heading">
                    <th colspan="8">JUGADORES</th>
                </tr>
                <tr class="table-warning">
                    <th class="sub-heading">Grupo</th>
                    <th class="sub-heading">Posición</th>
                    <th class="sub-heading">Rank</th>
                    <th class="sub-heading">Nombre</th>
                    <th class="sub-heading">Asciende</th>
                    <th class="sub-heading">Desciende</th>
                    <th class="sub-heading">Editar</th>
                    <th class="sub-heading">Borrar</th>
                </tr>
                <?php
                    $count = 1;
                    $grupo = 1;
                    for ($i=0 ; $i< $cant_players ; $i++) {
                ?>
                <tr>
                    <td class="align-middle">Grupo <?=$grupo?></td>
                    <?php 
                        if ($count <= 3) {
                            $count = $count + 1;
                        } else  {
                            $grupo = $grupo + 1;
                            $count = 1;
                        }
                    ?>
                    <td class="align-middle"><?=$players[$i]["posicion"]?></td>
                    <td class="align-middle"><?=$players[$i]["rank"]?></td>
                    <td class="align-middle" id="<?=$players[$i]["nombre"]?>"><?=$players[$i]["nombre"]?></td>
                    <td>
                        <a href="<?php if ($players[$i]["posicion"]!=1) {echo "?asc=".$players[$i]["usuario_id"];} ?>" class="btn btn-outline-success btn-sm <?php if ($players[$i]["posicion"]==1) {echo "disabled";} ?>">
                            <span class="fa fa-2x">&#9751;</span>
                        </a>
                    </td>
                    <td>
                        <a href="<?php if ($players[$i]["posicion"]!=$cant_players) {echo "?desc=".$players[$i]["usuario_id"];} ?>" class="btn btn-outline-warning btn-sm <?php if ($players[$i]["posicion"]==$cant_players) {echo "disabled";} ?>">
                            <span class="fa fa-flip-vertical fa-2x">&#9751;</span>
                        </a>
                    </td>
                    <td>
                        <a href="editar.php?id=<?=$players[$i]["usuario_id"]?>" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-user-edit fa-2x"></i>
                        </a>
                    </td>
                    <td>
                        <a href="borrar.php?id=<?=$players[$i]["usuario_id"]?>" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                    </td>
                </tr>    
                <?php } ?>
            </table>
        </div>
    </div>
<?php include 'includes/footer.php'?>
