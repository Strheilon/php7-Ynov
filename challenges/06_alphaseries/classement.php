<!doctype html>
<html lang="fr">
    <?php require('src/head.php'); ?>
<body>
    <?php require('src/nav.php'); ?>

    <main role="main">

        <!-- Contenu -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-title">
                        <i class="fa fa-trophy"></i> Classement
                    </h2>
                    <p>
                        Séries les plus populaires :
                        <!-- OU Séries les mieux notées : -->
                    </p>

                    <!-- Tableau des résultats du classement -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Série</th>
                                <th scope="col">
                                    Note
                                    <a href="classement.php?type=rating&id=<?= $_GET['id'] ?>" ><i class="fa fa-sort-down"></i></a>
                                </th>
                                <th scope="col">
                                    Nombre de personnes qui regardent
                                    <a href="classement.php?type=popularity&id=<?= $_GET['id'] ?>" ><i class="fa fa-sort-down"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($display as $key => $value) : ?>
                            <tr>
                                <?php if ($_GET['id'] == 1): ?>
                                    <th scope="row"><?= $key+1 ?></th>
                                    <td><a href="serie.php?slug=<?= $value["slug"] ?>"><?= $value['name'] ?></a></td>
                                    <td>
                                        <span class="stars text-info" data-toggle="tooltip" data-placement="top" title="<?= $value['statistics']["rating"] ?>">
                                            <?php for ($i=1; $i < $value['statistics']["rating"]; $i++) : ?>
                                            <i class="fa fa-star"></i>
                                        <?php endfor ?>
                                        </span>
                                    </td>
                                    <td><?= $value['statistics']["popularity"]?></td>
                                <?php endif; ?>
                                <?php if ($_GET['id'] >= 2): ?>
                                    <th scope="row"><?= ($key+1)+10*($_GET['id']-1); ?></th>
                                    <td><a href="serie.php?slug=<?= $value["slug"] ?>"><?= $value['name'] ?></a></td>
                                    <td>
                                        <span class="stars text-info" data-toggle="tooltip" data-placement="top" title="<?= $value['statistics']["rating"] ?>">
                                            <?php for ($i=1; $i < $value['statistics']["rating"]; $i++) : ?>
                                            <i class="fa fa-star"></i>
                                        <?php endfor ?>
                                        </span>
                                    </td>
                                    <td><?= $value['statistics']["popularity"]?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- BONUS Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php if($_GET['type'] == 'popularity'): ?>
                                <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=1">&laquo;&laquo;</a></li>
                                <?php if($_GET['id'] == 2): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] -1 ?>">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] -1 ?>"><?=  $_GET['id'] -1 ?></a></li>
                                <?php endif; ?>
                                <?php if($_GET['id'] > 2): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] -1 ?>">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] -2 ?>"><?=  $_GET['id']-2 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] -1 ?>"><?=  $_GET['id'] -1 ?></a></li>
                                <?php endif; ?>
                                    <li class="page-item active"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id']?>"><?=  $_GET['id']  ?></a></li>
                                <?php if($_GET['id'] == $length-1): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] +1 ?>"><?=  $_GET['id']+1 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?= $_GET['id'] +1 ?>">&raquo;</a></li>
                                <?php endif; ?>
                                <?php if($_GET['id'] < $length-1): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] +1 ?>"><?=  $_GET['id']+1 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?=  $_GET['id'] +2 ?>"><?=  $_GET['id'] +2 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?= $_GET['id'] +1 ?>">&raquo;</a></li>
                                <?php endif; ?>
                                <li class="page-item"><a class="page-link" href="classement.php?type=popularity&id=<?= $length ?>">&raquo;&raquo;</a></li>
                            <?php endif; ?>
                            <?php if($_GET['type'] == 'rating'): ?>
                                <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=1">&laquo;&laquo;</a></li>
                                <?php if($_GET['id'] == 2): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] -1 ?>">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] -1 ?>"><?=  $_GET['id'] -1 ?></a></li>
                                <?php endif; ?>
                                <?php if($_GET['id'] > 2): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] -1 ?>">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] -2 ?>"><?=  $_GET['id']-2 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] -1 ?>"><?=  $_GET['id'] -1 ?></a></li>
                                <?php endif; ?>
                                    <li class="page-item active"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id']?>"><?=  $_GET['id']  ?></a></li>
                                <?php if($_GET['id'] == $length-1): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] +1 ?>"><?=  $_GET['id']+1 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?= $_GET['id'] +1 ?>">&raquo;</a></li>
                                <?php endif; ?>
                                <?php if($_GET['id'] < $length-1): ?>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] +1 ?>"><?=  $_GET['id']+1 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?=  $_GET['id'] +2 ?>"><?=  $_GET['id'] +2 ?></a></li>
                                    <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?= $_GET['id'] +1 ?>">&raquo;</a></li>
                                <?php endif; ?>
                                <li class="page-item"><a class="page-link" href="classement.php?type=rating&id=<?= $length ?>">&raquo;&raquo;</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
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
