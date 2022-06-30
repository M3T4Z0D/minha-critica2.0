<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php BASEPATH ?>public/css/reset.css">
    <?php include('app/views/head.php') ?>
    <title>Minha Crítica - Login</title>
    <link rel="stylesheet" href="<?php BASEPATH ?>public/css/user/login.css">
</head>

<body>
    <?php include('app/views/navbar.php') ?>

    <section id="form">
        <h1 class="form__title">Login</h1>
        
        <hr>

        <form class="login__form" name="login__form" method="POST">

            <div class="form__field">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form__field">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password">
            </div>

            <button class="btn" type="submit">Entrar</button>
        </form>
    </section>
</body>

</html>