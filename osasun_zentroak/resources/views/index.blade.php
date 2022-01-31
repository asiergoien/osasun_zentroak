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
        <link rel="icon"
            href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png"
            type="image/x-icon">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
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
            <section id="about" class="d-flex justify-content-around">
                <div class="info1">
                    <div id="c-slider">
                        <div id="slider">
                            <section><img src="img/slider1.jpg" alt=""></section>
                            <section><img src="img/slider2.jpg" alt=""></section>
                            <section><img src="img/slider3.jpg" alt=""></section>
                            {{-- <div id="btn-prev">&#60;</div>
                            <div id="btn-next">&#62;</div> --}}
                        </div>
                    </div>
                </div>
                <div class="info2">
                    <h1>Guri buruz</h1>
                    <p>
                        Osasun Zentroak © Euskadiko osasun zentroen informazio guztia kontsultatzeko duzun tokia da.
                        Adibidez, ubikazioa, ordutegia, telefono zenbakia... Horrez gain, beste erabiltzaile batzuen
                        iritziak ikus ditzakezu zentro bakoitzaren iruzkinetan.
                    </p>
                </div>
            </section>
        </div>

        <div class="probintziak d-flex justify-content-around">
            <div class="contenedor">
                <a href="/osasun-zentroak?probintzia=Bizkaia">
                <img id="irudia" src="img/zentroak-bizkaia.jpg" alt="Bizkaia"/>
                <h1 class="centrado">Bizkaia</h1>
            </div>
            <div class="contenedor">
                <a href="/osasun-zentroak?probintzia=Gipuzkoa">
                <img id="irudia" src="img/zentroak-gipuzkoa-2.jpg" alt="Gipuzkoa"/>
                <h1 class="centrado">Gipuzkoa</h1>
            </div>
            <div class="contenedor">
                <a href="/osasun-zentroak?probintzia=Araba">
                <img id="irudia" src="img/zentroak-araba-2.jpg" alt="Araba"/>
                <h1 class="centrado">Araba</h1>
            </div>
        </div>

        <div id="footer">
            <footer-component></footer-component>
        </div>
        <script type="text/javascript" src="{{URL::asset('js/slider.js')}}"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>

    </html>

@endsection
