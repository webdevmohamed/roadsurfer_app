var baseUrl = window.location.href;

async function fetchDataByTypeId(selectedTypeId, apiRoute) {
    return await fetch(`${baseUrl}${apiRoute}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `ActivityTypeId=${selectedTypeId}`
    });
}

async function getFilteredActivitiesById(selectedTypeId) {
    return await fetchDataByTypeId(selectedTypeId, 'getFilteredActivities');
}

async function getDistanceAccumulatedByTypeId(selectedTypeId) {
    return await fetchDataByTypeId(selectedTypeId, 'getDistanceAccumulated');
}


function showAlert(response, alertsContainer, taskView, distanceAccumulated = false) {
    let alertClass = 'alert-danger';
    // Since statusText not working properly in production, i decided to generate the error messages in client side
    let message = 'Oops, something went wrong in the server, please try again later'

    if (response.status === 400) {
        message = 'The value sent to perform the filter is not valid, please try again later'
    }

    if (response.status === 404) {
        message = 'There are no fitness activities belonging to the selected activity type'
        alertClass = 'alert-warning';
    }

    if (distanceAccumulated) {
        message = `The total distance Accumulated for the activity type selected is <b>${distanceAccumulated} KM</b>`
        alertClass = 'alert-success';
    }

    const template = taskView.querySelector('#failed-alert-template');
    const clon = template.content.cloneNode(true);
    const alert = clon.querySelector('.alert');
    alert.classList.add(alertClass);
    alert.innerHTML = message;
    alertsContainer.appendChild(alert);
}