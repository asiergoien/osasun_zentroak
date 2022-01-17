<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icon -->
    <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>HASIERA</title>
</head>
 
<body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, suscipit unde accusantium nesciunt dicta sapiente, at corporis, expedita excepturi quia ducimus iste nemo fugit eos dolor repellendus nostrum? Doloribus odit veritatis numquam sint magni. Magnam rem, aliquid iste reprehenderit tempora eveniet illum temporibus quod aliquam quia expedita tenetur dolorum libero laborum? Tempora deserunt dolores quis commodi odit sunt in sapiente ipsam sed, laborum distinctio atque. Aperiam totam qui debitis nobis, molestias doloribus cupiditate, sapiente voluptatum reiciendis in similique, iste vero voluptas soluta illo ea. Officia, sequi amet maxime repellat voluptates saepe facilis dolor quia tenetur illum delectus porro ex, culpa omnis hic corrupti quasi. Dicta, laboriosam. Repellendus nisi culpa, ipsum iste, ipsam repellat autem ab impedit voluptatibus molestias voluptate dolores provident, eos esse aliquid nihil veniam reiciendis. Inventore quibusdam fugiat itaque quae quia nesciunt beatae officiis maiores nobis quam cumque, asperiores explicabo ratione odit. Ex iure magnam assumenda aut laudantium.
        </div>
        <div id="zentroak">
             <!-- class="zentroakTable" -->
             <div id="tab_zentro">
                <table>
                    <thead>
                        <tr>
                            <th>Zentroak</th>
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
            <div id="tab_zentro_gust">
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