const thirdTaskView = document.getElementById('third-task')

async function thirdTask() {
    showLoadingButton(thirdTaskView)
    const selectedTypeId = thirdTaskView.querySelector('#activity-type').value;
    const selectedTypeName = thirdTaskView.querySelector('#activity-type option:checked').text;
    const alertsContainer = thirdTaskView.querySelector('.alerts');
    const response = await fetchDataByTypeId(selectedTypeId, 'getDistanceAccumulated');
    if (response.ok) {
        const data = await response.json();
        const distanceAccumulated = data.distanceAccumulated;
        let message = '';
        let alertClass = 'alert-danger';
        if (distanceAccumulated) {
            message = `The total distance accumulated for "${selectedTypeName}" is <b>${distanceAccumulated} KM.</b>`
            alertClass = 'alert-success';
        }

        clearContainers(alertsContainer)
        showAlert(alertsContainer, thirdTaskView, message, alertClass);
    } else  {
        const {alertClass, message} = getErrorMessage(response, selectedTypeName);
        clearContainers(alertsContainer)
        showAlert(alertsContainer, thirdTaskView, message, alertClass);
    }
    hideLoadingButton(thirdTaskView)

}
