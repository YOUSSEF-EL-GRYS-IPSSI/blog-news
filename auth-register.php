<?php


const ERROR_REQUIRED = 'Veuillez renseigner ce champs';

$errors = [
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'password' => '',
    'confirmpassword' => ''
];




if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        header('Location: /');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="public/css/auth-register.css">
    <title>Inscription</title>
</head>

<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="block p-20 form-container">
                <h1>Inscription</h1>
                <form action="/auth-register.php" method="post">

                    <div class="form-control">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" id="firstname" value="<?= $firstname ?? "" ?>">
                        <?php if ($errors['firstname']) :  ?>
                            <p class="text-error"> <?= $errors['firstname'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-control">
                        <label for="nom">Nom</label>
                        <input type="text" name="lastname" id="lastname" value="<?= $lastname ?? "" ?>">
                        <?php if ($errors['lastname']) :  ?>
                            <p class="text-error"> <?= $errors['lastname'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $email ?? "" ?>">
                        <?php if ($errors['email']) :  ?>
                            <p class="text-error"> <?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-control">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password">
                        <?php if ($errors['password']) :  ?>
                            <p class="text-error"> <?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-control">
                        <label for="confirmpassword">Confirmation Mot de passe</label>
                        <input type="password" name="password" id="confirmpassword">
                        <?php if ($errors['confirmpassword']) :  ?>
                            <p class="text-error"> <?= $errors['confirmpassword'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-action">
                        <a href="/" class="btn btn-secondary" type="button">Annuler</a>
                        <button class="btn btn-primary" type="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>

        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>

</body>

</html>