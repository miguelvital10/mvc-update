<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> <?php echo $title ?> </title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

    <div class="container">

        <section id="header">
            <ul id="nav">
                <li><a href="/">Início</a></li>
                <li><a href="/signup">Sign Up</a></li>
                <li><a href="/login">Login</a></li>
            </ul>

            <div>
                Bem Vindo!
            </div>
        </section>

        <?php require VIEW_PATH.$this->controller->view ?>
    </div>
</body>
</html>