<div id="add-fitness-activity" class="col-5">
    <h3 class="mb-4">Add a new Fitness Activity</h3>
    <form>
        <div class="mb-3">
            <label for="activity-type" class="form-label">Activity Type</label>
            <select name="activity-type" id="activity-type" class="form-select" <?php if (empty($acticityTypes)): ?> disabled <?php endif; ?> >
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
            <input type="date" name="activity-date" class="form-control" id="activity-date">
        </div>
        <div class="mb-3">
            <label for="activity-name" class="form-label">Activity Name</label>
            <input type="text" name="activity-name" class="form-control" id="activity-name">
        </div>
        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="number" name="distance" class="form-control" id="distance">
        </div>
        <div class="mb-3">
            <label for="distance" class="form-label">Distance Unit</label>
            <select name="distance-unit" id="distance-unit" class="form-select">
                <option value="m">Meters</option>
                <option value="dam">Decameters</option>
                <option value="hm">Hectometers</option>
                <option value="km">Kilometers</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="elapsed-time" class="form-label">Elapsed Time</label>
            <input type="time" step="1" name="elapsed-time" class="form-control" id="elapsed-time">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>

