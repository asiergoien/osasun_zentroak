@extends('layouts.nav')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>{{ config('app.name', 'Osasun Zentroak') }}</title>
    <!-- Icon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png" type="image/x-icon">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2]
            ]);

            var options = {
                title: 'Zentroa guztiak',
                slices: {
                    0: {
                        color: '#006EFF'
                    },
                    1: {
                        color: '#00FF08'
                    },
                    2: {
                        color: 'blue'
                    },
                    3: {
                        color: 'red'
                    },
                    4: {
                        color: 'grey'
                    }
                },
                fontSize: 15
                // width:650,
                // height:650
            };

            var chart = new google.visualization.PieChart(document.getElementById('grafikoa'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>

<div class="multi">

    <section class="showcase">
        <div class="video-container">
            <video src="video_index.mp4" autoplay muted loop></video>
        </div>
        <div class="content">
            <h1>EUSKADIKO OSASUN ZENTROAK</h1>
            <h3>Kontsula itzazu nahi dituzun zentroen ubikazioa eta ordutegiak</h3>
            <a href="#about" class="btn">Ikusi</a>
        </div>
    </section>
    <section id="about">
        <h1> Sobre mi</h1>
        <p>
            Esto es una página de aterrizaje con video de fondo a pantalla completa.
            Eres libre de usar esta página de aterrizaje en tus proyectos.
            Añádele secciones, cambia el video, el contenido, etc...
        </p>
        <h2>Visita mi página web</h2>
        <div class="social">
            <a href="https://merchanseo.com" target="_blank"><i class="fas fa-globe fa-3x"></i></a>            I
        </div>
    </section>
</div>


    <div id="app">
        <div id="carouselExampleControls" class="carousel home slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/slider1.jpg" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/slider2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/slider3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div id="desc">
            Osasuna da ondasunik preziatuena, eta guri dagokigu Euskadin bizi diren guztien osasuna zaintzea. Eta, horretarako, osasun-arlo askotan dihardugu lanean egunero: osasun publikoa; pertsonen zerbitzura egiten den ikerketa eta berrikuntza sanitarioa; farmazia; plangintza eta ebaluazio sanitarioa. Lanean dihardugu, halaber, Osakidetza guztientzako kalitatezko osasun-sistema publiko bat izan dadin.
        </div>
        <div id="grafikoa" class="grafikoa"></div>
        <div id="zentroak">
            <zentro-mota></zentro-mota>
        </div>

    </div>
    <div id="footer">
        <footer-component></footer-component>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>

@endsection