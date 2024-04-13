<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/layouts/header.css">
    <link rel="stylesheet" href="./public/css/layouts/footer.css">
    <link rel="stylesheet" href="./public/css/tasks/second-task.css">
    <link rel="stylesheet" href="./public/css/tasks/third-task.css">
    <title>Roadsurfer app</title>
</head>
    <body>
        <?php include 'layouts/header.view.php' ?>
        <div class="container tasks">
            <?php include 'tasks/first-task.view.php' ?>
            <?php include 'tasks/second-task.view.php' ?>
            <?php include 'tasks/third-task.view.php' ?>
        </div>

        <?php include 'layouts/footer.view.php' ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
        <script src="./public/js/common.js" defer></script>
        <script src="./public/js/second-task.js" defer></script>
        <script src="./public/js/third-task.js" defer></script>
    </body>
</html>
