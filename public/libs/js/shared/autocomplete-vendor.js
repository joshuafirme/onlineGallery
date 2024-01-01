

function autocompleteVendor() {

    $(document).on('input', '.autocomplete-input', function () {
        let _this = $(this);
        var input = _this.val();

        if (input.length > 0) {
            $.get("/vendors/get-all", function(items, status){
                var autocompleteList = _this.parent().find('.autocomplete-items');
                autocompleteList.empty();
                if (input.length > 0) {
                    var matchingitems = items.filter(function (item) {
                        return item.full_name.toLowerCase().startsWith(input.toLowerCase());
                    });
    
                    matchingitems.forEach(function (item) {
                        var listItem = $(`<div 
                            data-bank_account_name="${item.bank_account_name}" 
                            data-bank_account_number="${item.bank_account_number}" 
                            data-bank_name="${item.bank_name}" 
                            data-id="${item.id}">
                            </div>`).text(item.full_name);
                        autocompleteList.append(listItem);
                    });
                    
                    if (matchingitems.length == 0) {
                        $('.no-vendor').removeClass('d-none')
                        $('input[name="vendor_id"]').val(0)
                    }
                    else {
                        $('.no-vendor').addClass('d-none')
                    }
    
                    autocompleteList.show();
                } else {
                    autocompleteList.hide();
                    $('.no-vendor').addClass('d-none')
                }
            });
        }
    });

    $(document).on('click', '.autocomplete-items div', function () {
        let _this = $(this);
        var selectedText = _this.text();
        var id = _this.attr('data-id');
        var account_name = _this.attr('data-bank_account_name');
        var account_number = _this.attr('data-bank_account_number');
        var bank = _this.attr('data-bank_name');

        $('input[name="vendor_id"]').val(id)
        $('.v_account_name').text(account_name)
        $('.v_account_number').text(account_number)
        $('.v_bank').text(bank)

        _this.parent().parent().find('.autocomplete-input').val(selectedText);
        _this.parent().parent().find('.autocomplete-items').hide();
        $('.no-vendor').addClass('d-none')
    });

    $(document).on('click', function (e) {
        let _this = $(this);
        if (!$(e.target).closest('.autocomplete-items').length) {
            $('.autocomplete-items').hide();
        }
    });
}