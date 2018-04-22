<?php
// création de la connexion
$dsn = 'mysql:dbname=php;host=127.0.0.1';
$user = 'root';
$password = 'ynov';
$connection = new PDO($dsn, $user, $password);
// suppression d'un produit
if (isset($_GET['delete_id'])) {
    $statement = $connection->prepare("
        DELETE
        FROM shopping_list
        WHERE id = :delete_id
    ");

    $statement->bindValue(':delete_id', $_GET['delete_id']);
    $statement->execute();
}
// ajout d'un produit
if (isset($_POST['product'])) {
    $statement = $connection->prepare("
        INSERT INTO shopping_list(product, category)
        VALUES(:product, :category)
    ");

    $statement->bindValue(':product', $_POST['product']);
    $statement->bindValue(':category', $_POST['category']);
    $statement->execute();
}
// affichage de la liste
$statement = $connection->prepare("
    SELECT *
    FROM shopping_list
    ORDER BY category ASC, product ASC
");
$statement->execute();
$products = $statement->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Liste de courses</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Ma liste de courses</h1>
            </div>
        </div>

        <div class="container">
            <h2>Choses à acheter</h2>

            <?php if (count($products) === 0) { ?>
                <div class="alert alert-success" role="alert">
                    La liste de course est vide. 👌
                </div>
            <?php } else { ?>
                <table class="table">
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <th width="250px"><?= $product['category'] ?></th>
                            <td><?= $product['product'] ?></td>
                            <td style="text-align: right">
                                <a href="course.php?delete_id=<?= $product['id'] ?>">Supprimer</a>
                            <td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>

            <hr />

            <h2>Ajouter un produit</h2>
            <form action="course.php" method="POST">
                <div class="form-group">
                    <label for="product">Produit</label>
                    <input name="product" type="product" class="form-control" id="product" placeholder="Nom du produit">
                </div>
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select class="form-control" name="category">
                        <option value="Animaux">Animaux</option>
                        <option value="Bébé">Bébé</option>
                        <option value="Boissons et Cave à vins">Boissons et Cave à vins</option>
                        <option value="Charcuterie">Charcuterie</option>
                        <option value="Crémerie">Crémerie</option>
                        <option value="Entretien et nettoyage">Entretien et nettoyage</option>
                        <option value="Epicerie Salée">Epicerie Salée</option>
                        <option value="Epicerie Sucrée">Epicerie Sucrée</option>
                        <option value="Fruits et Légumes">Fruits et Légumes</option>
                        <option value="Hygiène et Beauté">Hygiène et Beauté</option>
                        <option value="Maison, Loisir, Textile">Maison, Loisir, Textile</option>
                        <option value="Pains et Pâtisseries">Pains et Pâtisseries</option>
                        <option value="Surgelés">Surgelés</option>
                        <option value="Traiteur">Traiteur</option>
                        <option value="Viandes et Poissons">Viandes et Poissons</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter un produit</button>
            </form>
        </div>
    </main>
</body>
</html>
