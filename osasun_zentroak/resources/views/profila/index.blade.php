@extends('layouts.nav')

@section('content')

<?php

use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\VarCloner;

$zerbitzaria = "localhost";
$erabiltzailea = "root";
$pasahitza = "";


$id = Auth::id();
$user = Auth::user();
$user->id;

try {
    $konexioa = new PDO("mysql:host=$zerbitzaria; dbname=osasun_zentroak_db", $erabiltzailea, $pasahitza);
    //Ezarri PDO exception modura
    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //sql update Email
    $update = "SELECT name, email FROM users WHERE id=$id";
    $emaitza = $konexioa->query($update);
    $datuak = $emaitza->fetchAll();
    //var_dump($datuak);
    echo "<br>";
    foreach ($datuak as $lerroa) {
        $izena = $lerroa["name"];
        $emaila = $lerroa["email"];
    }

    //sql read liked zentroak
    $read = "SELECT zentroarenKodea FROM likes WHERE userId=$id";
    $erantzuna = $konexioa->query($read);
    $datos = $erantzuna->fetchAll();
    echo "<br>";

    foreach ($datos as $linea) {
        $zentroak[] = $linea["zentroarenKodea"];  //Array donde se guardan los códigos de centros likeados

        $zentroakString = implode("/", $zentroak);
    }

    // $zentroak_as_JSON = json_encode($zentroak);  //Pasar el array a formato JSON

} catch (PDOException $e) {
    echo $update . "<br>" . $e->getMessage();
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
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <div class="container">
        <form method="POST" action="/profila/{{ $id }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="irudia">
                <img src="persona.png">
            </div>
            <div class="izena-gustokoenak">
                <h2 class="izena"><?php echo $izena ?></h2>
                <input type="button" class="btn btn-warning btn-lg" value="Gustokoenak"/>
            </div>
            <div class="email-container">
                <h3 class="email-text">Email:</h3>
                <input type="email" id="emaila" name="emaila" class="email" placeholder="saray@gmail.com" value="<?php echo $emaila ?>" />
            </div>
            <div class="aldatu">
                <input type="submit" id="aldatuEmaila" class="btn btn-primary btn-sm" value="Aldatu emaila" />
            </div>
        </form>
        <div>
        </div>
        <div id="app">
            <zentroak-favs v-bind:favs="'{{ $zentroakString }}'"></zentroak-favs>
        </div>
    </div>
    <div id="footer">
        <footer-component></footer-component>
    </div>
</body>

<script src="{{ mix('/js/app.js') }}"></script>

</html>

@endsection