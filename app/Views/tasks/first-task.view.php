<div id="first-task" class="mb-5">
    <h3 class="mb-4">List of all Fitness Activities</h3>
    <?php if (empty($fitnessActivities)): ?>
        <div class="alert alert-warning" role="alert">
            There is no Fitness Activities to display
        </div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Activity Type</th>
                <th scope="col">Activity Date</th>
                <th scope="col">Activity Name</th>
                <th scope="col">Distance</th>
                <th scope="col">Distance Unit</th>
                <th scope="col">Elapsed Time</th>

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

    <?php endif; ?>
</div>