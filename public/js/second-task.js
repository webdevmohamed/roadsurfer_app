var baseUrl = window.location.href;

async function secondTask() {
    const selectedTypeId = document.getElementById('activity-type').value;
    const alertsContainer = document.getElementsByClassName('alerts')[0];
    const dataTableContainer = document.getElementsByClassName('data-table')[0];
    alertsContainer.innerHTML = '';
    dataTableContainer.innerHTML = '';

    const response = await getFilteredActivitiesById(selectedTypeId);
    if (response.ok) {
        const data = await response.json();
        showFilteredActivities(data, dataTableContainer);
    } else {
        showAlert(response, alertsContainer);
    }

}

async function getFilteredActivitiesById(selectedTypeId) {
    return await fetch(`${baseUrl}filterByActivityType`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `ActivityTypeId=${selectedTypeId}`
    })
}

function showFilteredActivities(data, dataTableContainer) {
    const template = document.getElementById("data-table-template");
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

function showAlert(response, alertsContainer) {
    let alertClass = 'alert-danger';
    if (response.status === 404) {
        alertClass = 'alert-warning';
    }
    const template = document.getElementById('failed-alert-template');
    const clon = template.content.cloneNode(true);
    const alert = clon.querySelector('.alert');
    alert.classList.add(alertClass);
    alert.innerText = response.statusText;
    alertsContainer.appendChild(alert);
}