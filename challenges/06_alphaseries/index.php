<?php
require_once('./src/data.php');
require_once('./src/function.php');
?>


<!doctype html>
<html lang="fr">
    <?php require('src/head.php'); ?>
<body>
    <?php require('src/nav.php'); ?>

    <main role="main">
        <!-- Header -->
        <div class="jumbotron" style="position: relative">
            <div class="jumbotron-background">
                <img src="<?= $image ?> " style="width: 100%; height: 263px">
            </div>
            <div class="container">
                <h1 class="display-3">AlphaSeries</h1>
                <p>Retrouvez les meilleures séries TV !</p>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">
            <div class="row">

                <!-- Les 3 séries les plus populaires -->
                <div class="col-md-6">
                    <h2><i class="fa fa-fire"></i> Les plus populaires</h2>
                    <p>Les séries qui sont suivient par le plus de monde.</p>
                    <?php foreach ($series as $value) : ?>
                        <?php if($top1 == $value["statistics"]["popularity"]): ?>
                        <p>
                            <div class="card">
                              <img class="card-img-top" src="<?= $value["images"]['banner'] ?>">
                              <div class="card-body">
                                  <h5 class="card-title">#1 - <a href="serie.php?slug=<?= $value["slug"] ?>"><?= $value["name"] ?></a></h5>
                                  <p class="card-text"><?= $value["statistics"]["popularity"] ?> personnes regardent cette série.</p>
                              </div>
                            </div>
                        </p>
                    <?php endif; ?>
                    <?php endforeach ;?>
                    <?php foreach ($series as $value) : ?>
                    <?php if($top2 == $value["statistics"]["popularity"]) :?>
                        <p>
                            <div class="card">
                              <img class="card-img-top" src="<?= $value["images"]['banner'] ?>">
                              <div class="card-body">
                                  <h5 class="card-title">#2 - <a href="serie.php?slug=<?= $value['slug'] ?>"><?= $value["name"] ?></a></h5>
                                  <p class="card-text"><?= $value["statistics"]["popularity"] ?> personnes regardent cette série.</p>
                              </div>
                            </div>
                        </p>
                    <?php endif; ?>
                <?php endforeach ;?>
                    <?php foreach ($series as $value) : ?>
                    <?php if($top3 == $value["statistics"]["popularity"]) :?>
                    <p>
                        <div class="card">
                          <img class="card-img-top" src="<?= $value["images"]['banner'] ?>">
                          <div class="card-body">
                              <h5 class="card-title">#3 - <a href="serie.php?slug=<?= $value['slug'] ?>"><?= $value["name"] ?></a></h5>
                              <p class="card-text"><?= $value["statistics"]["popularity"] ?> personnes regardent cette série.</p>
                          </div>
                        </div>
                    </p>
                <?php endif; ?>
            <?php endforeach ;?>
                    <p>
                        <a class="btn btn-outline-secondary" href="classement.php?type=popularity&id=1" role="button">
                            <i class="fa fa-trophy"></i> Voir tout le classement
                        </a>
                    </p>
                </div>

                <!-- Les 3 séries les mieux notées -->
                <div class="col-md-6">
                    <h2><i class="fa fa-star"></i> Les mieux notées</h2>
                    <p>Les séries qui ont eu les meilleures notes.</p>
                    <p>
                        <?php foreach ($series as $valeur) : ?>
                            <?php if($top1r == $valeur["statistics"]["rating"]): ?>
                                <p>
                                    <div class="card">
                                      <img class="card-img-top" src="<?= $valeur["images"]['banner'] ?>">
                                      <div class="card-body">
                                          <h5 class="card-title">#1 - <a href="serie.php?slug=<?= $valeur["slug"] ?>"><?= $valeur["name"] ?></a></h5>
                                          <p class="card-text">La série est notée <?= $valeur["statistics"]["rating"] ?>/5.</p>
                                      </div>
                                    </div>
                                </p>
                            <?php endif; ?>
                        <?php endforeach ;?>
                        <?php foreach ($series as $valeur) : ?>
                            <?php if($top2r == $valeur["statistics"]["rating"]) :?>
                                <p>
                                    <div class="card">
                                      <img class="card-img-top" src="<?= $valeur["images"]['banner'] ?>">
                                      <div class="card-body">
                                          <h5 class="card-title">#2 - <a href="serie.php?slug=<?= $valeur['slug'] ?>"><?= $valeur["name"] ?></a></h5>
                                          <p class="card-text">La série est notée <?= $valeur["statistics"]["rating"] ?>/5.</p>
                                      </div>
                                    </div>
                                </p>
                            <?php endif; ?>
                        <?php endforeach ;?>
                        <?php foreach ($series as $valeur) : ?>
                        <?php if($top3r == $valeur["statistics"]["rating"]) :?>
                            <p>
                                <div class="card">
                                  <img class="card-img-top" src="<?= $valeur["images"]['banner'] ?>">
                                  <div class="card-body">
                                      <h5 class="card-title">#3 - <a href="serie.php?slug=<?= $valeur['slug'] ?>"><?= $valeur["name"] ?></a></h5>
                                      <p class="card-text">La série est notée <?= $valeur["statistics"]["rating"] ?>/5.</p>
                                  </div>
                                </div>
                            </p>
                            <p>
                                <a class="btn btn-outline-secondary" href="classement.php?type=rating&id=1" role="button">
                                    <i class="fa fa-trophy"></i> Voir tout le classement
                                </a>
                            </p>
                        <?php endif; ?>
                    <?php endforeach ;?>
                </div>
            </div>
            <hr>
        </div>
    </main>

    <!-- Footer -->
    <footer class="container">
        <p>&copy; Les données proviennent du site <a target="_blank" href="https://www.betaseries.com">BetaSeries</a></p>
    </footer>

    <!-- JavaScript Bootstrap -->
    <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
    // activation des tooltips bootstrap de partout
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
</body>
</html>
