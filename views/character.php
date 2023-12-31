<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/index.css">
    <link rel="stylesheet" href="/assets/character.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" hreft="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/src/main.js"></script>
    <script src="https://kit.fontawesome.com/6412fbb59a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">


</head>

<?php
include '../apiClass.php';

$currentId = $_GET['id'];

$api = new MarvelApi($currentId);
$characterData = $api->getOneCharacter();
$characterArray = $characterData['data']['results'][0];
$name = $characterArray['name'];
$image = $characterArray['thumbnail']['path'] . "." . $characterArray['thumbnail']['extension'];
$description = $characterArray['description'];

?>

<body>
    <div id="character_page_wrapper">
        <header class="bg-dark pt-4 pb-4">
            <div class="inner-container d-flex flex-row justify-content-center gap-12" style="column-gap: 2rem; position: relative;">
                <div class="image-container" style="background-image: url('<?php echo $image ?>'">
                    <div class="bg-overlay">
                        <div class="inner-text">
                            <h1><?php echo $name ?></h1>

                            <?php if (strlen($description) > 0) {
                                echo "<p>$description</p>";
                            } else {
                                echo "<p>Unfortunately $name has no available description</p>";
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <article>
                <div class="header d-flex justify-content-center flex-wrap-wrap mt-6 align-items-center">
                    <h2 class="mt-4 text-center"><?php echo $name ?> Is Featured In The Following Comics</h2>
                </div>
                <div class="row d-flex flex-row justify-content-center gap-4 mt-4 mb-4">
                    <?php include "../parts/comics.php" ?>
                </div>
            </article>
        </main>
        
    </div>

    <?php include "../parts/footer.php" ?>

</body>

</html>