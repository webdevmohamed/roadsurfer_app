const baseUrl = window.location.href;
const STATUS_BAD_REQUEST = 400;
const STATUS_NOT_FOUND = 404;

function getErrorMessage(response) {
    // Since statusText not working properly in production, i decided to generate the error messages in client side
    switch (response.status) {
        case STATUS_BAD_REQUEST:
            return 'The value sent to perform the filter is not valid, please try again later';
        case STATUS_NOT_FOUND:
            return 'There are no fitness activities belonging to the selected activity type';
        default:
            return 'Oops, something went wrong in the server, please try again later';
    }
}


async function fetchDataByTypeId(selectedTypeId, apiRoute) {
    return await fetch(`${baseUrl}${apiRoute}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `ActivityTypeId=${selectedTypeId}`
    });
}


function showAlert(alertsContainer, taskView, message, alertClass = 'alert-danger') {
    const template = taskView.querySelector('#failed-alert-template');
    const clon = template.content.cloneNode(true);
    const alert = clon.querySelector('.alert');
    alert.classList.add(alertClass);
    alert.innerHTML = message;
    alertsContainer.appendChild(alert);
}