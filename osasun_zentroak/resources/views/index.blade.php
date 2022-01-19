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
        <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png" type = "image/x-icon">    
    </head>

    <body>
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div id="desc">
                Osasuna da ondasunik preziatuena, eta guri dagokigu Euskadin bizi diren guztien osasuna zaintzea. Eta, horretarako, osasun-arlo askotan dihardugu lanean egunero: osasun publikoa; pertsonen zerbitzura egiten den ikerketa eta berrikuntza sanitarioa; farmazia; plangintza eta ebaluazio sanitarioa. Lanean dihardugu, halaber, Osakidetza guztientzako kalitatezko osasun-sistema publiko bat izan dadin.
            </div>
            <div id="zentroak">
                <!-- class="zentroakTable" -->
                <div id="tab_zentro">
                   <zentroak-index></zentroak-index>
                </div>
                <div id="tab_zentro_gust" class="table table-borderless">
                    <table>
                        <thead>
                            <tr>
                                <th>Zentro gustokoenak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, amet.</td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, amet.</td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, amet.</td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, amet.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="footer">
            <footer-component></footer-component>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>

    </html>

@endsection
