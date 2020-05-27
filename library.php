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
