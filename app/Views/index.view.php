<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <title>Roadsurfer app</title>
</head>
<body>



        <?php include 'layout/header.view.php'?>
        <div class="container">
            <h3 class="mb-4">List of all Fitness Activities</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Activity type</th>
                    <th scope="col">Activity date</th>
                    <th scope="col">Activity name</th>
                    <th scope="col">Distance</th>
                    <th scope="col">Distance unit</th>
                    <th scope="col">Elapsed time</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($fitnesActivities as $fitnesActivity): ?>
                    <tr>
                        <td><?= $fitnesActivity->getId() ?></td>
                        <td><?= $fitnesActivity->getActivityType() ?></td>
                        <td><?= $fitnesActivity->getActivityDate() ?></td>
                        <td><?= $fitnesActivity->getName() ?></td>
                        <td><?= $fitnesActivity->getDistance() ?></td>
                        <td><?= $fitnesActivity->getDistanceUnit() ?></td>
                        <td><?= $fitnesActivity->getElapsedTime() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <?php include 'layout/footer.view.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
