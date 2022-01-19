@extends('layouts.nav')

@section('content')

<?php

use Illuminate\Support\Facades\Auth;

$zerbitzaria = "localhost";
$erabiltzailea = "root";
$pasahitza = "";


$id = Auth::id();

try {
    $konexioa = new PDO("mysql:host=$zerbitzaria; dbname=osasun_zentroak_db", $erabiltzailea, $pasahitza);
    //Ezarri PDO exception modura
    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql
    $sql = "SELECT name, email FROM users WHERE id=$id";
    $emaitza = $konexioa->query($sql);
    $datuak = $emaitza->fetchAll();
    //var_dump($datuak);
    echo "<br>";
    foreach ($datuak as $lerroa) {
        $izena = $lerroa["name"];
        $emaila = $lerroa["email"];
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profila</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
    <div class="container">
        <form class="form">
            <div class="irudia">
                <img src="persona.png">
            </div>
            <div class="izena-gustokoenak">
                <h2 class="izena"><?php echo $izena ?></h2>
                <input type="button" class="btn btn-warning btn-lg" value="Gustokoenak" />
            </div>
            <div class="email-container">
                <h3 class="email-text">Email:</h3>
                <input type="email" class="email" placeholder="saray@gmail.com" value="<?php echo $emaila ?>" />
            </div>
            <div class="aldatu">
                <input type="button" class="btn btn-primary btn-sm" value="Aldatu emaila" />
            </div>
        </form>
    </div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>

</html>

@endsection