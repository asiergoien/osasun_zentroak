<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Informazioa</title>
    </head>
    <body>
        <div class="container containerDeta shadow border rounded p-5 my-5">
            <!-- Row para la información sobre el centro, la foto y el botón de fav -->
            <div class="row">
                <!-- Informacion sobre el centro -->
                    <div id="app">
                        <info-component></info-component>
                    </div>
                <!-- Mapa del centro -->
                <!-- <div id="mapaCentro" class="col-md">
                    <iframe src="https://maps.google.com/?q=43.3127516,-1.899633&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div> -->
                <!-- Botón de fav -->
                <!-- <div id="btnFav">
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