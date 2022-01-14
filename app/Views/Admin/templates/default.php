<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin :: <?= $title ?? 'Mouad' ?></title>
    <style>
        .avatar-preview{
            width: 150px;
            height: 150px;
            display: inline-block;
            margin-right: 20px;
            position: relative;
            border-radius: 25%;
            border: 4px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
        }
        .avatar-preview #imagePreview{
            width: 100%;
            height: 100%;
            border-radius: 25%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .default_img_radio{
            position: relative;
            right: 100px;
        }
        .delete_img_form{
            position: absolute;
            left: 112px;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="<?= PATH ?>/admin" class="navbar-brand">ADMIN</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= PATH ?>" class="nav-link">Store</a>
            </li>
            <li class="nav-item">
                <a href="<?= PATH ?>/login/logout" class="nav-link">LogOut</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        <?= $content ?>
    </div>

</body>

</html>