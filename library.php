<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="library.css">
</head>
<body>
<div class="container">
<div class="top">
<a href="#zad1">tabelka_1</a>
<a href="#zad2">tabelka_2</a>
<a href="#zad3">tabelka_3</a>
</div>
<div class="guziki">
</br> </br>
                <h1>DODAWANIE:</h1>
                </br> </br>
<h3>Autor INSERT:</h3>
                <form action="insert_autor.php" autocomplete="off" method="post" class="insert">
                    <input type="text" name="imie" placeholder="IMIE">
                    <input type="text" name="nazwisko" placeholder="NAZWISKO">
                    <input type="submit" value="Dodaj">
                </form>
                <h3>Tytuł INSERT:</h3>
                <form action="insert_tytul.php" autocomplete="off" method="post" class="insert">
                    <input type="text" name="tytul" placeholder="TYTUŁ">
                    <input type="text" name="isbn" placeholder="ISBN">
                    <input type="submit" value="Dodaj">
                </form>

                </br> </br>
                <h1>USUWANIE:</h1>
                </br> </br>

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "library";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $result2 = $conn->query("SELECT * FROM autorzy");
                
                echo("<h3> autor DELETE:</h3>");
                echo("<form action='delete_autor.php' method='POST'  class='delete'>");
                echo("<select name='id_autor'>");
                while($row=$result2->fetch_assoc() ){
                    echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
                }
                echo("</select>");

                echo("<input type='submit' value='Usuń'>");
                echo("</form>");

                $result3 = $conn->query("SELECT * FROM tytuly");
                
                echo("<h3> tytuł DELETE:</h3>");
                echo("<form action='delete_tytul.php' method='POST'  class='delete'>");
                echo("<select name='id_tytul'>");
                while($row=$result3->fetch_assoc() ){
                    echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                }
                echo("</select>");

                echo("<input type='submit' value='Usuń'>");
                echo("</form>");

            ?>

</div>
<div class="tab">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = " SELECT * FROM autorzy;";

$result = $conn->query($sql);

echo("<h1 id='zad1'>tabelka 1:".$sql);
echo("</h1>");
echo("<table class='tabelka'");
echo("<tr>
<th>id_autor</th>
<th>imie</th>
<th>nazwisko</th>
</tr>");

while($wiersz = $result->fetch_assoc()){
    echo("<tr class='col'>");
    echo("<td>".$wiersz['id_autor']."</td>");
    echo("<td>".$wiersz['imie']."</td>");
    echo("<td>".$wiersz['nazwisko']."</td>");
    echo("</tr>");

};

echo("</table>");



$sql1 = "SELECT * FROM tytuly;";

$result1 = $conn->query($sql1);

echo("<h1 id='zad2'>tabelka 2:".$sql1);
echo("</h1>");
echo("<table class='tabelka'");
echo("<tr>
<th>id_tytul</th>
<th>tytul</th>
<th>isbn</th>
</tr>");

while($wiersz1 = $result1->fetch_assoc()){
    echo("<tr class='col'>");
    echo("<td>".$wiersz1['id_tytul']."</td>");
    echo("<td>".$wiersz1['tytul']."</td>");
    echo("<td>".$wiersz1['isbn']."</td>");
    echo("</tr>");

};

echo("</table>");


$sql2 = " SELECT imie,nazwisko,tytul,isbn from autorzy,tytuly,ksiazki where autorzy.id_autor=ksiazki.id_autor and tytuly.id_tytul=ksiazki.id_tytul;";

$result2 = $conn->query($sql2);

echo("<h1 id='zad3'>tabelka 3:".$sql2);
echo("</h1>");
echo("<table class='tabelka'");
echo("<tr>
<th>imie</th>
<th>nazwisko</th>
<th>tytul</th>
<th>isbn</th>
</tr>");

while($wiersz2 = $result2->fetch_assoc()){
    echo("<tr class='col'>");
    echo("<td>".$wiersz2['imie']."</td>");
    echo("<td>".$wiersz2['nazwisko']."</td>");
    echo("<td>".$wiersz2['tytul']."</td>");
    echo("<td>".$wiersz2['isbn']."</td>");
    echo("</tr>");

};

echo("</table>");

?>
</div>
</div>
</body>
</html>
