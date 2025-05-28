$(document).on('click', '.remove-item', function (e) {
    e.preventDefault();

    var url = $(this).data('url');
    var id = $(this).data('id');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var $storeElement = $(this).closest('.cart-single-list');

    $.ajax({
        url: url,
        method: 'DELETE',
        data: {
            _token: csrfToken
        },
        success: function (response) {
            if (response.success) {
                $storeElement.remove();
            } else {
                console.log('Not successful');
            }
        },
        error: function (xhr, status, error) {
            console.log("Error:", error);
        }
    });
});

