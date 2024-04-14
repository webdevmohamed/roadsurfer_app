<div id="add-fitness-activity" class="col-5">
    <?php if (isset($_SESSION['addFitnessActivityMessage'])) { ?>
        <div class="alert alert-<?= $_SESSION['addFitnessActivityAlertClass'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['addFitnessActivityMessage'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php session_unset(); } ?>

    <h3 class="mb-4">Add a new Fitness Activity</h3>
    <form action="addFitnessActivity" method="POST">
        <div class="mb-3">
            <label for="activity-type" class="form-label">Activity Type</label>
            <select name="activity-type" id="activity-type" class="form-select" <?php if (empty($acticityTypes)): ?> disabled <?php endif; ?> required>
                <?php if (empty($acticityTypes)): ?>
                    <option selected>There is no Activity Types to filter by</option>
                <?php else: ?>
                    <?php foreach ($acticityTypes as $acticityType): ?>
                        <option value="<?= $acticityType->getId() ?>"><?= $acticityType->getName() ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>
        <div class="mb-3">
            <label for="activity-date" class="form-label">Activity Date</label>
            <input type="date" name="activity-date" class="form-control" id="activity-date" min="<?php echo date('Y-m-d', 0); ?>" max="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="activity-name" class="form-label">Activity Name</label>
            <input type="text" name="activity-name" class="form-control" id="activity-name" required>
        </div>
        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="number" name="distance" class="form-control" id="distance" required>
        </div>
        <div class="mb-3">
            <label for="distance-unit" class="form-label">Distance Unit</label>
            <select name="distance-unit" id="distance-unit" class="form-select" required>
                <option value="m">Meters</option>
                <option value="dam">Decameters</option>
                <option value="hm">Hectometers</option>
                <option value="km">Kilometers</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="elapsed-time" class="form-label">Elapsed Time (HH:MM:SS)</label>
            <input type="time" step="1" name="elapsed-time" class="form-control" id="elapsed-time" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>

