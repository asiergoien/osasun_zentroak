@extends('layouts.nav')

@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Osasun Zentroak') }}</title>
        <!-- Icon -->
        <link rel="icon"
            href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png"
            type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            $(function() {
               /* CUANDO CARGUE LA PAGINA SE EJECUTA */
               console.log("entra");

               $("#parrafo").click(function() {
                   console.log("parrafo");
               })
               $("#parrafo2").click(function() {
                   console.log("parrafo2");
               })
                $("#flecha").click(function() {
                    alert("aaaaa");
                    if ($("#mifoto").attr('src') == 'arrow-down-circle.svg') {
                        $('#mifoto').attr('src','arrow-up-circle.svg');
                    }else{
                        $('#mifoto').attr('src','arrow-down-circle.svg');
                    }
                    
                    // $('#mifoto').attr('src','arrow-down-circle.svg');
                    $("div#filtrosBuenos").animate({
                        height: 'toggle'
                    });
                });
            });
        </script>

    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

        {{-- <img id="mifoto" src="img/osakidetza.jpg"> --}}
        {{-- <img id="mifoto" href="#" src="arrow-up-circle.svg" fill="currentColor" style="color: #0275d8" width="50px" height="50px"> --}}

        <div id="app">
            <centros-list></centros-list>
        </div>

        <div id="footer">
            <footer-component></footer-component>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>

    </html>

@endsection
