<?php if($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>
<form method="POST" action="<?= PATH ?>/login">
    <?= $form->input('username','User Name'); ?>
    <?= $form->input('password','Mot de pass',['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>