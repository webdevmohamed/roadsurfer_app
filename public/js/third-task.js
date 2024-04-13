const thirdTaskView = document.getElementById('third-task')

async function thirdTask() {
    const selectedTypeId = thirdTaskView.querySelector('#activity-type').value;
    const alertsContainer = thirdTaskView.querySelector('.alerts');
    alertsContainer.innerHTML = '';

    const response = await fetchDataByTypeId(selectedTypeId, 'getDistanceAccumulated');
    if (response.ok) {
        const data = await response.json();
        const distanceAccumulated = data.distanceAccumulated;
        let message = '';
        let alertClass = 'alert-danger';
        if (distanceAccumulated) {
            message = `The total distance accumulated for the activity type selected is <b>${distanceAccumulated} KM</b>`
            alertClass = 'alert-success';
        }

        showAlert(alertsContainer, thirdTaskView, message, alertClass);
    } else  {
        const errorMessage = getErrorMessage(response);
        showAlert(alertsContainer, thirdTaskView, errorMessage);
    }

}
