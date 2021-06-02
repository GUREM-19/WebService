<?php
    //CRUD
    include 'conexion.php';

    $pdo = new Conexion();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){ //READ
 
        if(isset($_GET['matricula'])){
            $sql = $pdo->prepare('SELECT * FROM proyecto.isw WHERE matricula= :matricula' );
            $sql->bindValue(':matricula', $_GET['matricula']);
            $sql-> execute();
            $sql-> setFetchMode(PDO::FETCH_ASSOC);

            header("HTTP/1.1 200 OK");
            echo json_encode($sql->fetchAll());
            exit;

        }
        else{
            $sql = $pdo->prepare('SELECT * FROM proyecto.isw' );
            $sql-> execute();
            $sql-> setFetchMode(PDO::FETCH_ASSOC);

            header("HTTP/1.1 200 OK");
            //echo json_encode($sql->fetchAll());
            while ($row = $sql->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                    //ALUMNOS BASE DE DATOS
			             echo "<tr>";
                         echo  "<td>$row[0]</td>";
			             echo  "<td>$row[1]</td>";
                         echo  "<td>$row[2]</td>";
                         echo  "<td>$row[3]</td>";
                         echo  "<td><button type='button' name='add_button' class='btn btn-warning btn-xs edit' 
                         id='$row[0]' data-toggle='modal' data-target='#apicrudModal'>Editar</button></td>";
                         echo  "<td><button type='button' name='delete' class='btn btn-danger btn-xs delete' 
                         id='$row[0]'>Eliminar</button></td>";
                         echo  "</tr>";
            }

            exit;
        }

    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){  //CREATE
        $sql = "INSERT INTO proyecto.isw (matricula, nombre, apellido, vivo) VALUES ('$_POST[mat]', '$_POST[nombre]', 
        '$_POST[apellido]', '$_POST[estado]')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        header("HTTP/1.1 201 CREATED");
        exit;
        
    }

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){ //UPDATE
        parse_str(file_get_contents("php://input"),$post_vars);
        $ans = json_encode(array(
            "status" => 1,
            "answer" => $post_vars
        ));

        $sql = "UPDATE proyecto.isw SET matricula='$post_vars[matricula]', nombre='$post_vars[nombre]', apellido='$post_vars[apellido]', 
        vivo='$post_vars[estado]' WHERE matricula='$post_vars[mat]'";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        header("HTTP/1.1 204 UPDATED");
        exit;
        
    }
    
    if($_SERVER['REQUEST_METHOD']== 'DELETE'){  //DELETE
        $sql = "DELETE FROM proyecto.isw WHERE matricula=:matricula";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':matricula', $_GET['matricula']);
        $stmt->execute();
        
        header("HTTP/1.1 200 OK");
        exit;

    }


?>