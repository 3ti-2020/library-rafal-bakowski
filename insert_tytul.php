<?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    

    $sql = "INSERT INTO `tytuly`(`id_tytul`, `tytul`, `isbn`) VALUES (NULL, '".$_POST['tytul']."', '".$_POST['isbn']."')";

    echo("<li>".$sql);

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:http://localhost/biblioteka/library.php");
    
?>