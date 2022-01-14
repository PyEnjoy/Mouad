<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Titre</label>
        <input class="form-control mb-3" type="text" name="titre" value="<?= $product->getTitre() ?>" required="">
    </div>
    <div class="form-group">
        <label>Images</label>
        <input class="form-control mb-3" type="file" accept=".png, .jpg, .jpeg" name="images[]" multiple="">
        <div class="form-group">

        <label>Default Image</label><br>
        <?php foreach($Productimg as $imgs): ?>
            <div class="avatar-preview mb-3">
                <?php if($imgs->getId() !== $product->id_df_img):?>
                    <button class="delete_img_form btn btn-danger" value="<?= $imgs->getId() ?>">x</button>
                <?php endif; ?>
                <div id="imagePreview" style="background-image: url(<?= $imgs->getUrl_img() ?>);">
                </div>
            </div>
            <input type="radio" name="id_df_img" class="default_img_radio" value="<?= $imgs->getId() ?>" <?= $imgs->getId() === $product->id_df_img ? "checked" :"" ?>>
        
        <?php endforeach; ?>
        </div>
    </div>    
    <div class="form-group">
        <label>Prix</label>
        <input class="form-control mb-3" type="number" name="price" value="<?= $product->price ?>" required="">
    </div>
    <div class="form-group">
        <label>contenu</label>
        <textarea class="form-control mb-3" rows="6" type="textarea" name="content"><?= $product->getContent() ?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$('.delete_img_form').click(function() {
    if(confirm("Are you sure you want to delete this item?")){
        var id = $(this).val();

        $.ajax({
            url:"../deleteimg",
            method:"POST",
            dataType:"json",
            data:{id:id},
            success:function(data)
            {
                location.reload(true);
            }
        });
    }
    return false;
});

</script>