<div id="first-task" class="mb-5">
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
        <?php foreach ($fitnessActivities as $fitnessActivity): ?>
            <tr>
                <td><?= $fitnessActivity->getId() ?></td>
                <td><?= $fitnessActivity->getActivityType() ?></td>
                <td><?= $fitnessActivity->getActivityDate() ?></td>
                <td><?= $fitnessActivity->getName() ?></td>
                <td><?= $fitnessActivity->getDistance() ?></td>
                <td><?= $fitnessActivity->getDistanceUnit() ?></td>
                <td><?= $fitnessActivity->getElapsedTime() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>