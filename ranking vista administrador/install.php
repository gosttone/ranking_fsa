<?php

//CREAR TABLA Y LLENAR PRIMEROS REGISTROS

    require_once 'includes/connect.php';
    
    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
                usuario_id int(255) auto_increment not null,
                posicion int(255) not null,
                rank varchar (20) not null,
                nombre varchar(50) not null,
                CONSTRAINT pk_usuarios PRIMARY KEY(usuario_id)
            );";
    
    $create_usuarios_table = mysqli_query($db, $sql);
    
    $sql = "INSERT INTO usuarios VALUES(NULL, '1', '2 dan', 'chilenito')";
    $insert_user1 = mysqli_query($db, $sql);
    
    $sql = "INSERT INTO usuarios VALUES(NULL, '2', '1 dan', 'kasparjan')";
    $insert_user2 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '3', '1 dan', 'minikt23')";
    $insert_user3 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '4', '5 kyu', 'rumpel')";
    $insert_user4 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '5', '3 kyu', 'gerarduv')";
    $insert_user5 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '6', '4 kyu', 'emperor')";
    $insert_user6 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '7', '4 kyu', 'judagar')";
    $insert_user7 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '8', '4 kyu', 'shymon')";
    $insert_user8 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '9', '5 kyu', 'alfieri')";
    $insert_user9 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '10', '7 kyu', 'sir gandalf')";
    $insert_user10 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '11', '4 kyu', 'dan')";
    $insert_user11 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '12', '7 kyu', 'aniquil')";
    $insert_user12 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '13', '7 kyu', 'hayama')";
    $insert_user13 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '14', '6 kyu', 'the pharmacist')";
    $insert_user14 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '15', '12 kyu', 'sanosuke')";
    $insert_user15 = mysqli_query($db, $sql);
    
    $sql = "INSERT INTO usuarios VALUES(NULL, '16', '7 kyu', 'kurahasho')";
    $insert_user16 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '17', '9 kyu', 'keinny')";
    $insert_user17 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '18', '9 kyu', 'logus')";
    $insert_user18 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '19', '9 kyu', 'soul nova')";
    $insert_user19 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '20', '10 kyu', 'asc')";
    $insert_user20 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '21', '9 kyu', 'Luciano')";
    $insert_user21 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '22', '10 kyu', 'ctr')";
    $insert_user22 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '23', '10 kyu', 'quetzal')";
    $insert_user23 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '24', '11 kyu', 'julian')";
    $insert_user24 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '25', '11 kyu', 'esther')";
    $insert_user25 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '26', '9 kyu', 'julii')";
    $insert_user26 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '27', '12 kyu', 'gosttone')";
    $insert_user27 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '28', '14 kyu', 'King_raven')";
    $insert_user28 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '29', '12 kyu', 'aurora')";
    $insert_user29 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '30', '12 kyu', 'fabi')";
    $insert_user30 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '31', '12 kyu', 'katherine')";
    $insert_user31 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '32', '13 kyu', 'yanina')";
    $insert_user32 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '33', '14 kyu', 'medina')";
    $insert_user33 = mysqli_query($db, $sql);

    $sql = "INSERT INTO usuarios VALUES(NULL, '34', '14 kyu', 'elcono')";
    $insert_user34 = mysqli_query($db, $sql);
    
    $sql = "INSERT INTO usuarios VALUES(NULL, '35', '14 kyu', 'dendeiform')";
    $insert_user35 = mysqli_query($db, $sql);
    
    $sql = "INSERT INTO usuarios VALUES(NULL, '36', '14 kyu', 'snorlax')";
    $insert_user36 = mysqli_query($db, $sql);

    if ($create_usuarios_table) {
        echo "La tabla se ha creado correctamente";
    }
?>