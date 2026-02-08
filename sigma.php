<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie</title>
</head>
<body>
<form action="index.php" method="GET">
<p>Podaj nazwę grzyba :</p>
<input name="nazwa" placeholder="Podaj nazwę grzyba" required><br>
<p>Czy jest jadalny?</p>
<label><input type="radio" name="jadalny" value=1 required> tak</label><br>
<label><input type="radio" name="jadalny" value=0 required> nie</label><br>
<input name="kapelusz" placeholder="Podaj kolor kapelusza" required><br>
<p>Występowanie:</p>
<select name="las" required>
<?php
  $con = mysqli_connect("localhost", "root", "", "grzybki");
  $q = "SELECT wystepowanie FROM grzyby group by wystepowanie";
  $result = mysqli_query($con, $q);
while($row = mysqli_fetch_array($result))
{
   echo ("<option>".$row[0]."</option>");
}
?>
</select><br>
<input type="submit" value="Wyślij formularz">
</form>
<?php
if(isset($_GET['nazwa']) && isset($_GET['jadalny']) && isset($_GET['kapelusz']) && isset($_GET['las']))
{
    $nazwa = $_GET['nazwa'];
    $jadalny = $_GET['jadalny'];
    $kapelusz = $_GET['kapelusz'];
    $las = $_GET['las'];
    $con2 = mysqli_connect("localhost", "root", "", "grzybki");
    $q2 = "INSERT INTO grzyby (id, nazwa, jadalny, kolor_kapelusza, wystepowanie) VALUES (NULL, '$nazwa', '$jadalny', '$kapelusz', '$las')";
    mysqli_query($con2, $q2);
    echo("Dodano grzyba do bazy danych");
}
?>
</body>
</html>