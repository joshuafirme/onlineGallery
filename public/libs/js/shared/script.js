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

function clearInputs() {
    let modal = $('#updateModal');
    let inputs = modal.find('input,select,textarea,img');
    $('.bundle-choices').addClass('d-none');
    $.each(inputs, function(i, v) {
        if ($(v).attr('name') != '_token') {
            if ($(v).attr('type') == 'checkbox') {
                modal.find('input[type="checkbox"]').prop('checked', false);
                return;
            }
            $(v).val('');
            $(v).attr('src', '');
        }
    });
}