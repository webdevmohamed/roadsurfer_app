var secondTaskView = document.getElementById('second-task')

async function secondTask() {
    const selectedTypeId = secondTaskView.querySelector('#activity-type').value;
    const alertsContainer = secondTaskView.querySelector('.alerts');
    const dataTableContainer = secondTaskView.querySelector('.data-table');
    alertsContainer.innerHTML = '';
    dataTableContainer.innerHTML = '';

    const response = await getFilteredActivitiesById(selectedTypeId);
    if (response.ok) {
        const data = await response.json();
        showFilteredActivities(data, dataTableContainer);
    } else {
        showAlert(response, alertsContainer, secondTaskView);
    }
}

function showFilteredActivities(data, dataTableContainer) {
    const template = secondTaskView.querySelector("#data-table-template");
    const table = template.content.cloneNode(true);
    const tbody = table.querySelector("tbody");
    const thead = table.querySelector("thead");
    tbody.innerHTML = '';
    thead.innerHTML = '';
    thead.innerHTML = `<tr>
                        <th scope="col">ID</th>
                        <th scope="col">Activity Type</th>
                        <th scope="col">Activity Date</th>
                        <th scope="col">Activity Name</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Distance Unit</th>
                        <th scope="col">Elapsed Time</th>
                    </tr>`;

    data.forEach(activity => {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${activity.id}</td>
                        <td>${activity.activity_type}</td>
                        <td>${activity.activity_date}</td>
                        <td>${activity.name}</td>
                        <td>${activity.distance}</td>
                        <td>${activity.distance_unit}</td>
                        <td>${activity.elapsed_time}</td>`;

        tbody.appendChild(row);
    });

    dataTableContainer.appendChild(table);
}