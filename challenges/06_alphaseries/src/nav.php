<!-- Barre de navigation -->
<?php
require_once('./src/function.php');
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">AlphaSeries</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu principal -->
    <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="classement.php?type=popularity&id=1">
                    <i class="fas fa-trophy"></i> Classement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="serie.php?slug=<?= $random ?>">
                    <i class="fas fa-random"></i> Une série aléatoire
                </a>
            </li>
        </ul>

        <!-- Formulaire de recherche -->
        <form action="recherche.html" method="post" class="form-inline my-2 my-lg-0">
            <input name="search" class="form-control mr-sm-2" type="text" placeholder="Rechercher une série" aria-label="Rechercher une série">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">
                <i class="fa fa-search"></i> <span class="d-md-none">Rechercher</span>
            </button>
        </form>
    </div>
</nav>
