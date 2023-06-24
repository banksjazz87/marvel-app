<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="/src/main.js"></script>
    </head>
    <body id="main-body">
        <?php 
            $marvel_base = "https://gateway.marvel.com/";
        ?>

        <header class="header bg-primary-subtle shadow-sm d-flex flex-row justify-content-center align-items-center">
            <div>
                <h1>Marvel App</h1>
            </div>
        </header>

        <article style="margin-top: 2rem">
            <div class="d-flex flex-column justify-content-center align-items-center row-gap-3">
                <h2>Let's get started in learning about Marvel</h2>
                <form method="POST" action=<?php echo $marvel_base ?>>
                    <input id="start-button" type="submit" class="btn btn-primary default-width-btn" value="Start" />
                </form>
            </div>
        </article>

    <?php require 'parts/footer.php'?>
    </body>
</html>