const baseUrl = window.location.href;
const STATUS_BAD_REQUEST = 400;
const STATUS_NOT_FOUND = 404;

/**
 * Returns object of alert and message depending of the response status given
 * @param response
 * @param selectedTypeName
 * @returns {{alertClass: string, message: string}}
 */
function getErrorMessage(response, selectedTypeName) {
    // Since statusText not working properly in production, i decided to generate the error messages in client side
    switch (response.status) {
        case STATUS_BAD_REQUEST:
            return {
                alertClass: 'alert-danger',
                message: 'The value sent to perform the filter is not valid, please try again later.'
            };
        case STATUS_NOT_FOUND:
            return {
                alertClass: 'alert-warning',
                message: `There are no Fitness Activities belonging to "${selectedTypeName}".`
            };
        default:
            return {
                alertClass: 'alert-danger',
                message: 'Oops, something went wrong in the server, please try again later.'
            };
    }
}

/**
 * Fetch necessary data depending on a given Activity Type ID and the specific endpoint
 * @param selectedTypeId
 * @param apiRoute
 * @returns {Promise<Response>}
 */
async function fetchDataByTypeId(selectedTypeId, apiRoute) {
    return await fetch(`${baseUrl}${apiRoute}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `ActivityTypeId=${selectedTypeId}`
    });
}

/**
 * Shows the alerts for the second, third and fourth task
 * @param alertsContainer
 * @param taskView
 * @param message
 * @param alertClass
 */
function showAlert(alertsContainer, taskView, message, alertClass ) {
    const template = taskView.querySelector('#failed-alert-template');
    const clon = template.content.cloneNode(true);
    const alert = clon.querySelector('.alert');
    alert.classList.add(alertClass);
    alert.innerHTML = message;
    alertsContainer.appendChild(alert);
}

/**
 * Cleans the containers of the results of the tasks
 * @param alertsContainer
 * @param dataTableContainer
 */
function clearContainers(alertsContainer, dataTableContainer ) {
    alertsContainer.innerHTML = '';
    if (dataTableContainer) {
        dataTableContainer.innerHTML = '';
    }
}

/**
 * Shows the loading button while the data is being obteined
 * @param taskView
 */
function showLoadingButton(taskView) {
    taskView.querySelector('#submit-button').classList.add('d-none');
    taskView.querySelector('#loading-button').classList.remove('d-none');
}

/**
 * Hides the loading button while the data have already been obtained
 * @param taskView
 */
function hideLoadingButton(taskView) {
    taskView.querySelector('#loading-button').classList.add('d-none');
    taskView.querySelector('#submit-button').classList.remove('d-none');
}