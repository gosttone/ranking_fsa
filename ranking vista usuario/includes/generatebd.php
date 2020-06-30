<?php 
    $users = mysqli_query($db, "SELECT * FROM usuarios");
    $players = array();    
    while ($player = mysqli_fetch_assoc($users)) {
        $object["posicion"] = $player["posicion"];
        $object["rank"] = $player["rank"];
        $object["nombre"] = $player["nombre"];
        array_push($players, $object);
    }
    $cant_players = count($players);
    $cant_groups = ceil($cant_players/4);

    function array_sort_by(&$arrIni, $col, $order = SORT_ASC)
    {
        $arrAux = array();
        foreach ($arrIni as $key=> $row)
        {
            $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
            $arrAux[$key] = strtolower($arrAux[$key]);
        }
        array_multisort($arrAux, $order, $arrIni);
    }
    array_sort_by($players, 'posicion', $order = SORT_ASC);
?>
