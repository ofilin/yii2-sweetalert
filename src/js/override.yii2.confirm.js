yii.confirm = function (message, ok, cancel) {
    Swal.fire({
        title: message,
        type: 'error',
        showCancelButton: true,
        allowOutsideClick: true,
        focusConfirm: false
    }).then((result) => {
        if (result.value) {
            ok(this)
        }
    })
};
