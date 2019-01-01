<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>µPlanner - Home</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/calendar.css">

    <script src="app.js" defer></script>
    <script src="js/jquery-3.3.1.min.js"></script>

</head>

<body>
    <nav id="navbar-top" class="navbar-top">
        <script src="js/navbar-top.js"></script>
    </nav>
    <nav id="navbar-hidden" class="navbar-hidden">
        <script src="js/navbar-hidden.js"></script>
    </nav>
    <main>
        <section id="calendar" class="calendar">
            <script src="js/calendar.js" defer></script>
        </section>
        <section id="items" class="items">

        </section>
    </main>
    <nav id="navbar-bottom" class="navbar-bottom">
        <script src="js/navbar-bottom.js"></script>
    </nav>
    <footer>

    </footer>
</body>

</html>