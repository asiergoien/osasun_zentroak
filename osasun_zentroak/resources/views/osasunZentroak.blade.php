<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZENTROAK</title>
    <!-- Icon -->
    <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Osakidetza-Logo.svg/1200px-Osakidetza-Logo.svg.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <h1>OSASUN ZENTROAK</h1>
    <div id="app">
        <centros-list></centros-list>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
