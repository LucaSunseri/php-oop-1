<?php

require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Movie.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Film Preferiti</title>

    <style>
        .ls-edit-title {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: 100%;
        }
    </style>
</head>

<body class="bg-dark">
    <h1 class="text-center text-white mb-5">I Tuoi Film Preferiti &#9825;</h1>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
            <?php foreach ($movies as $movie) :
                $new_film = new Movie($movie["title"]);
                $new_film->overview = $movie["overview"];
                $new_film->poster_path = $movie["poster_path"];
                $new_film->release_date = $movie["release_date"];
                $new_film->vote_average = $movie["vote_average"];
                $new_film->link_wiki = $movie["link_wiki"];
            ?>
                <div class="col d-flex justify-content-center">
                    <div class="card mb-5" style="width: 18rem;">
                        <img src="<?php echo $new_film->poster_path ?>" class="card-img-top" alt="<?php echo $new_film->title ?>">
                        <div class="card-body">
                            <h5 class="card-title ls-edit-title">
                                <?php echo $new_film->title ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $new_film->getEditOverview() ?>
                            </p>
                            <ul>
                                <li>
                                    Data uscita:
                                    <strong><?php echo $new_film->getFormatDate() ?></strong>
                                </li>
                                <li>
                                    Voto:
                                    <strong><?php echo $new_film->getFormatVote() ?></strong>
                                </li>
                            </ul>
                            <a href="<?php echo $new_film->link_wiki ?>" class="btn btn-primary"><?php echo $new_film->title ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>




</body>

</html>