<?php
require_once('./src/data.php');
//require_once('./src/function_serie.php');
?>

<!doctype html>
<html lang="fr">
    <?php require('src/head.php'); ?>
<body>
    <?php require('src/nav.php'); ?>

    <main role="main">
        <!-- Header -->
        <div class="jumbotron" style="position: relative">
            <div class="jumbotron-background" style="background-image: url('<?= $serie['images']['banner'] ?>')"></div>
            <div class="container">
                <h1 class="display-3"> <?= $serie['name'] ?></h1>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">
            <div class="row">

                <!-- Poster de la série -->
                <div class="col-md-3 d-none d-md-block">
                    <img src="<?= $serie['images']['poster'] ?>" alt="Poster de <?= $serie['name']?>" class="img-thumbnail">
                </div>

                <!-- Fiche série -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?= $serie['name'] ?>

                                <!-- Affichage de la note avec le bon nombre d'étoiles et un tooltip -->
                                <span class="stars text-info" data-toggle="tooltip" data-placement="top" title="<?= $serie["statistics"]['rating'] ?>">
                                    <?php for ($i=1; $i < $serie["statistics"]["rating"] ; $i++): ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor ?>
                                </span>
                            </h4>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $serie["statistics"]['season_count'] ?> saisons, <?= $serie["statistics"]['episode_count'] ?> épisodes</h6>
                            <h5>
                                <?= $serie["statistics"]['popularity'] ?> personnes suivent la série
                            </h5>
                            <p>
                                <!-- Affichage des genres de la série -->
                                <?php foreach ($serie["genres"] as $genre) : ?>
                                <span class="badge badge-secondary"><?= $genre ?></span>
                            <?php endforeach ?>
                                <small>sortie en <?= $serie["release_year"] ?>  chez <?= $serie["network"] ?></small>
                            </p>
                            <p class="card-text">
                                <?= $serie["synopsis"] ?>
                            </p>
                            <a target="_blank" href="https://www.betaseries.com/serie/<?= $serie['slug'] ?>" class="card-link">
                                <i class="fa fa-external-link-alt"></i>
                                Voir la fiche sur BetaSeries
                            </a>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                <i class="fab fa-youtube"></i> Bande annonce
                            </h5>
                        </div>
                        <div class="embed-responsive embed-responsive-21by9">
                            <!-- Vidéo youtube, pensez à remplacer opRwgY7RDP0 par l'id youtube de la vidéo -->
                            <?php if(!empty($serie["youtube_id"])): ?>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $serie['youtube_id'] ?>?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
        </main>

        <!-- Footer -->
        <footer class="container">
            <p>&copy; Les données proviennent du site <a target="_blank" href="https://www.betaseries.com">BetaSeries</a></p>
        </footer>

        <!-- JavaScript Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript">
        // activation des tooltips bootstrap de partout
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        </script>
    </body>
    </html>
