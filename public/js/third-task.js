var thirdTaskView = document.getElementById('third-task')

async function thirdTask() {
    const selectedTypeId = thirdTaskView.querySelector('#activity-type').value;
    const alertsContainer = thirdTaskView.querySelector('.alerts');
    alertsContainer.innerHTML = '';

    const response = await getDistanceAccumulatedByTypeId(selectedTypeId);
    if (response.ok) {
        const data = await response.json();
        const distanceAccumulated = data.distanceAccumulated;
        showAlert(response, alertsContainer, secondTaskView, distanceAccumulated);
    } else  {
        showAlert(response, alertsContainer, secondTaskView);
    }

}
