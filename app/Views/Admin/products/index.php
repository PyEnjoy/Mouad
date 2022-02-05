<?php if (isset($_GET['delete']) && $_GET['delete'] == 1) : ?>
    <div class="alert alert-success">
        L'enregistrement bien etre supprimer
    </div>
<?php endif ?>

<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Img</th>
                <th scope="col">Titre</th>
                <th scope="col">Quantite</th>
                <th scope="col">created At</th>
                <th scope="col">upated At</th>
                <th scope="col">Price</th>
                <th><a href="admin/products/add" class="btn btn-primary">Noveau</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th># <?= $product->getID(); ?></th>
                    
                    <td>
                        <img src="<?= $product->getImage() ?>" class="img-fluid" width="100px">
                    </td>
                    <td>
                        <a href="<?= $product->getUrl(); ?>"><?= $product->getTitre(); ?></a>
                    </td>
                    <td><?= $product->qt; ?></td>
                    <td><?= $product->getCreated_at() ?></td>
                    <td><?= $product->getUpdated_at() ?></td>
                    <td><?= $product->price ?> $</td>
                    <td>
                        <a href="./admin/products/edit/<?= $product->getID(); ?>" class="btn btn-outline-primary">Edit</a>
                        <form action="./admin/products/delete" method="POST" onSubmit="if(!confirm('Confirm delete?')){return false;}" style="display: inline;">
                            <input type="hidden" name="product" value="<?= $product->getId() ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>