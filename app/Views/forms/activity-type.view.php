<div id="add-fitness-activity" class="col-5">

    <?php if (isset($_SESSION['addActivityTypeMessage'])) { ?>
        <div class="alert alert-<?= $_SESSION['addActivityTypeAlertClass'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['addActivityTypeMessage'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php session_unset(); } ?>

    <h3 class="mb-4">Add a new Activity Type</h3>
    <form action="addActivityType" method="POST">
        <div class="mb-3">
            <label for="activity-type-name" class="form-label">Activity Type Name</label>
            <input type="text" name="activity-type-name" class="form-control" id="activity-type-name">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
