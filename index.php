<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/index.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" hreft="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" >
        <script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/src/main.js"></script>
       
    </head>

    <?php
    require 'apiClass.php';
    $characters = new MarvelApi(0);
        if (isset($_GET['offset'])) {
            $data = $characters->getAllCharacters($_GET['offset']);
        } else {
            $data = $characters->getAllCharacters(0);
        }
    ?>

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
                <h2>Welcome to the wonderful world of Marvel.</h2>
            </div>
        </article>

        <div style="margin-top: 4rem" class="d-flex flex-column justify-content-center align-items-center">
            <h3 class="pt-6">
                <?php 
                    $first = array_slice($data['data']['results'], 0, 1);
                    $last = array_slice($data['data']['results'], -1, 1);
                    echo "{$first[0]['name']} - {$last[0]['name']}";
                ?>
            </h3>
        </div>
        <article id="table_article" style="margin-top: 2rem;">
            <div class="d-flex flex-column justify-content-center align-items-center column-gap-3">
                <table id="marvel_table" class="display bg-dark">
                    <thead>
                        <tr>
                            <th class="table-header">Name</th>
                            <th class="table-header image-header">Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            require './parts/characterTable.php';
                            returnNamesAndImages($data);
                        ?>
                    </tbody>
                </table>

                <?php 

                function showButton($num) {
                    echo "<form method='get' action='/index.php/'><input type='hidden' name='offset' id='offset' value='$num'><input type='submit' value='See More' class='btn btn-info'/></form>";
                }

                    if (!isset($_GET['offset'])) {
                        showButton(100);

                    } else if ($_GET['offset'] === 1500 ) {
                        showButton(0);

                    } else {
                        $currentOffset = $_GET['offset'];
                        $currentOffset = $currentOffset + 100;
                        showButton($currentOffset);
                    }    
                ?>

            </div>
        </article>

    <?php require 'parts/footer.php'?>
    
    </body>
</html>