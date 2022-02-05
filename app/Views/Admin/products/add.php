<form action="" method="POST" enctype='multipart/form-data'>
    <?= $form->input('titre', 'Titre',['last'=>'required']); ?>
    <?= $form->input('images[]', 'Images',['type'=>'file','last'=>'multiple',"accept" => ".png, .jpg, .jpeg"]); ?>
    
    <?= $form->input('price', 'Prix',['type' => 'number','last'=>'required']); ?>
    <?= $form->input('qt', 'Quantité',['type' => 'number']); ?>
    <?= $form->input('content', 'contenu',['type'=>'textarea']); ?>

    <button class="btn btn-primary" type="submit">
        <?php if ($product->getID() !== null) : ?>
            Modifier
        <?php else : ?>
            Créé
        <?php endif ?>
    </button>
</form>