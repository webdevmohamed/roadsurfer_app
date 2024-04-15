const fourthTaskView = document.getElementById('fourth-task')

/**
 * Performs all the functionality of the fourth task
 * @returns {Promise<void>}
 */
async function fourthTask() {
    showLoadingButton(fourthTaskView)
    const selectedTypeId = fourthTaskView.querySelector('#activity-type').value;
    const selectedTypeName = fourthTaskView.querySelector('#activity-type option:checked').text;
    const alertsContainer = fourthTaskView.querySelector('.alerts');
    const response = await fetchDataByTypeId(selectedTypeId, 'getTotalElapsedTime');
    if (response.ok) {
        const data = await response.json();
        const totalElapsedTime = data.totalElapsedTime;
        let message = '';
        let alertClass = 'alert-danger';
        if (totalElapsedTime) {
            message = `The total elapsed time for "${selectedTypeName}" is <b>${totalElapsedTime}</b>.`
            alertClass = 'alert-success';
        }
        clearContainers(alertsContainer)
        showAlert(alertsContainer, fourthTaskView, message, alertClass);
    } else  {
        const {alertClass, message} = getErrorMessage(response, selectedTypeName);
        clearContainers(alertsContainer)
        showAlert(alertsContainer, fourthTaskView, message, alertClass);
    }
    hideLoadingButton(fourthTaskView)

}
