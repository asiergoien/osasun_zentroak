@extends('layouts.nav')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Informazioa</title>
        <!-- Icon -->
        <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png" type = "image/x-icon">
    </head>
    <body>
        <div class="container containerDeta shadow border rounded p-5 my-5">
            <!-- Row para la información sobre el centro, la foto y el botón de fav -->
            <div class="row">
                <!-- Informacion sobre el centro -->
                    <div id="app" class="col-md">
                            <info-component v-bind:userId="'{{ \Auth::user()->id }}'" ></info-component>
                    </div>
                <!-- Mapa del centro -->
                <!-- <div id="mapaCentro" class="col-md">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2852.7332712925977!2d-2.9045955845534825!3d43.257671279136886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fac87437727%3A0x364f27e82def0130!2sCIFP%20Txurdinaga%20LHII!5e1!3m2!1ses!2ses!4v1641906920417!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div> -->
                <!-- Botón de fav -->
                <!-- <div id="btnFav" class="col-md">
                    <button type="button" class="btn btn-primary">Gogoko dut</button>
                </div> -->
            </div>
            <!-- Row para los comentarios -->
            <div class="row my-5">
                <h1>Iruzkinak</h1>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
@endsection