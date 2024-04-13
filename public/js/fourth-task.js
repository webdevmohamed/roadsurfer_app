const fourthTaskView = document.getElementById('fourth-task')

async function fourthTask() {
    const selectedTypeId = fourthTaskView.querySelector('#activity-type').value;
    const alertsContainer = fourthTaskView.querySelector('.alerts');
    alertsContainer.innerHTML = '';

    const response = await fetchDataByTypeId(selectedTypeId, 'getTotalElapsedTime');
    if (response.ok) {
        const data = await response.json();
        const totalElapsedTime = data.totalElapsedTime;
        let message = '';
        let alertClass = 'alert-danger';
        if (totalElapsedTime) {
            message = `The total elapsed time for the activity type selected is <b>${totalElapsedTime}</b>`
            alertClass = 'alert-success';
        }
        showAlert(alertsContainer, fourthTaskView, message, alertClass);
    } else  {
        const errorMessage = getErrorMessage(response);
        showAlert(alertsContainer, fourthTaskView, errorMessage);
    }

}
