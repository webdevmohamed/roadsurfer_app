<div id="second-task" class="mb-5">
    <h3 class="mb-4">Filter activities by Activity Type</h3>
        <div class="d-flex align-items-center filter-container">
            <label for="activity-type" class="label-select">Select an Activity Type:</label>
            <select id="activity-type" class="form-select">
                <?php foreach ($acticityTypes as $acticityType): ?>
                    <option value="<?= $acticityType->getId() ?>"><?= $acticityType->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <div class="button-container ms-3">
                <button onclick="secondTask()" class="btn btn-primary">Filter</button>
            </div>
        </div>

    <template id="failed-alert-template">
        <div class="alert mt-3" role="alert"></div>
    </template>
    <template id="data-table-template">
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </template>

    <div class="alerts"></div>
    <div class="data-table"></div>

</div>