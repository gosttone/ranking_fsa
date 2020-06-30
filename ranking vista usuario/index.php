<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <link type="text/css" rel="stylesheet" href="css/mystyle.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-litera.min.css">
    <title>Ranking FSA</title>
    <?php
        require_once 'includes/connect.php';
        include 'includes/generatebd.php';
    ?>
  </head>
  <body>
        <div class="container">
        <h1>Ranking FSA</h1>
            <?php
                $posicion = 0;
                for ($i = 1; $i <= $cant_groups; $i++) {?>
                    <div class="table-center">
                        <table class="table table-hover table-sm" id="rank">
                            <tr class="table-heading">
                                <th colspan="2">GRUPO <?=$i?></th>
                            </tr>
                            <?php
                                for ($j = 1; $j <= 4; $j++){
                                    if ($j<=2) {
                                        $row_class = "table-success";
                                    } else {
                                        $row_class = "table-danger";
                                    }
                                    
                                    if ($posicion < $cant_players) {
                                        $rank = $players[$posicion]["rank"];
                                        $nombre = $players[$posicion]["nombre"];
                                    } else {
                                        $rank = "-";
                                        $nombre = "-";
                                        $row_class = "table-secondary";
                                    }
                                    ?>        
                                    <tr class="<?=$row_class?>">
                                        <td><?=$rank?></td>
                                        <td><?=$nombre?></td>
                                    </tr>
                                <?php $posicion++ ?>
                            <?php }?>
                        </table>
                    </div>
            <?php }?>
        </div>  
  </body>
</html>
