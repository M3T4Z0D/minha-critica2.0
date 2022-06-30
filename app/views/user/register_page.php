<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= BASEPATH ?>public/css/reset.css">
    <?php include('app/views/head.php') ?>

    <title>Minha Crítica - Login</title>

    <link rel="stylesheet" href="<?= BASEPATH ?>public/css/user/register.css">
</head>

<body>
    
    <?php include('app/views/navbar.php') ?>

    <section id="form">
        <h1 class="form__title">Cadastro</h1>
        
        <hr>

        <form  action="#" class="login__form" method="POST">
            
            <div class="form__field">
                <label for="name">Nome completo</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="form__field">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email">
            </div>

            <div class="form__field">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password">
            </div>

            <button class="btn" type="submit">Cadastrar</button>
        </form>
    </section>
</body>

</html>