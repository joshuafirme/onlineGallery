

function autocomplete(items) {

    $(document).on('input', '.autocomplete-input', function () {
        let _this = $(this);
        var input = $(this).val();
        var autocompleteList = _this.parent().find('.autocomplete-items');
        autocompleteList.empty();

        if (input.length > 0) {
            var matchingitems = items.filter(function (item) {
                return item.full_name.toLowerCase().startsWith(input.toLowerCase());
            });

            if (matchingitems.length > 0) {
                _this.parent().find('.err-msg').empty()
                matchingitems.forEach(function (item) {
                    var listItem = $(`<div 
                        data-address="${item.address}" 
                        data-attachments="${JSON.parse(item.attachments)}"
                        data-id="${item.id}">
                        </div>`).text(item.full_name);
                    autocompleteList.append(listItem);
                });
            }
            else {
                console.log('testt')
                _this.parent().find('.err-msg').html('<small class="text-danger">Vendor \"'+input+'\" do not match in our records.</small>')
            }

            autocompleteList.show();
        } else {
            autocompleteList.hide();
        }
    });

    $(document).on('click', '.autocomplete-items div', function () {
        let _this = $(this);
        var selectedText = $(this).text();
        var selectedAddress = $(this).attr('data-address');
        var id = $(this).attr('data-id');
        var attachments = $(this).attr('data-attachments');
        attachments = attachments ? attachments.split(',') : [];
        let attachmentHtml = "";
        for (let index = 0; index < attachments.length; index++) {
            let attachment = attachments[index];
            let fileName = attachment.replace("attachments/", "")

            attachmentHtml += `
                <div class="mt-1">
                    <a target="_blank"
                        href="/vendors/download/${fileName}">
                        <i class="fa fa-download"></i> ${fileName}
                    </a>
                    <a class="btn btn-remove-file" data-id="${id}"
                        data-file="${attachment}">
                    </a>
                </div>`;

        }

        
        _this.closest('tr').append(`<input type="hidden" value="${id}" name="vendor_id[]">`)

        _this.parent().parent().find('.autocomplete-input').val(selectedText);
        _this.closest('tr').find('.address').text(selectedAddress);
        _this.closest('tr').find('.attachments').html(attachmentHtml);
        _this.parent().parent().find('.autocomplete-items').hide();
    });

    $(document).on('click', function (e) {
        let _this = $(this);
        if (!$(e.target).closest('.autocomplete-items').length) {
            $('.autocomplete-items').hide();
        }
    });
}