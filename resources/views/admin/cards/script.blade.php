<script>
    $(function() {

        "use strict";

        function clearInputs() {
            let modal = $('#updateModal');
            let inputs = modal.find('input,select');
            $('.bundle-choices').addClass('d-none');
            $.each(inputs, function(i, v) {
                if (i > 1) {
                    if ($(v).attr('type') == 'checkbox') {
                        modal.find('input[type="checkbox"]').prop('checked', false);
                        return;
                    }
                    $(v).val('');
                }
            });
        }

        $(document).on('click', '.btn-edit', function() {

            let v = $(this);
            clearInputs();
            $('#tbl-tracking tbody').empty();
            let data = v.attr('data-item');
            let mdl = $('#updateModal');
            mdl.find('.password-container').remove();
            $('#change-password').remove();

            if (data) {

                data = JSON.parse(data)
                console.log(data)

                mdl.find('.modal-title').text('Update card');
                mdl.find('form').attr('action', "/cards/update/" + data.id);

                for (var key of Object.keys(data)) {
                    if (key.indexOf('image') != -1 && data[key]) {
                        mdl.find('#' + key).attr('src', '/' + data[key]);
                        continue;
                    }
                    mdl.find(`[name='${key}']`).val(data[key])
                }
                return;
            } else {
                mdl.find('.modal-title').text('Add card');

                mdl.find('form').attr('action', `{{ route('cards.store') }}`)
                mdl.find(`[name='status']`).val(1)
            }

            return false;
        });

        $(document).on('click', '.btn-delete', function() {
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Please confirm',
                text: "You are sure do you want to delete it?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            type: 'DELETE',
                            url: "/cards/" + id
                        })

                        .done(function(data) {
                            $('#' + id).remove();
                            swal(data.message)
                        })
                        .fail(function() {
                            swal("Error occured. Please try again.", 'error');
                        });
                }
            })
        });

        $(document).on('change', ".file-upload", function() {
            const file = this.files[0];
            let __this = $(this);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    __this.parent().find(".img-preview")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

    });
</script>
