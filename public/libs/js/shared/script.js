$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function swal(html = '', type = 'success') {
    Swal.fire({
        icon: type,
        title: '',
        html: html,
    })
}

function clearInputs(v) {
    let modal = $('#updateModal');
    let inputs = modal.find('input,select,textarea');
    $('.bundle-choices').addClass('d-none');
    $.each(inputs, function(i, v) {
        if ($(v).attr('type') != 'hidden') {
            if ($(v).attr('type') == 'checkbox') {
                modal.find('input[type="checkbox"]').prop('checked', false);
                return;
            }
            $(v).val('');
        }
    });
}