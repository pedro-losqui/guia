window.addEventListener('show', event => {
    $('#' + event.detail.open).modal('show');
})

window.addEventListener('hide', event => {
    $('#' + event.detail.close).modal('hide');
})
