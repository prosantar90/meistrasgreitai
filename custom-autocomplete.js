jQuery(document).ready(function($) {
    // Fetch product names via Ajax
    $.ajax({
        url: wp_autocomplete_data.ajax_url,
        type: 'GET',
        dataType: 'json',
        data: {
            action: 'get_product_names'
        },
        success: function(response) {
            // Initialize autocomplete on the specific text field
            $('#field_pasl471auga').autocomplete({
                source: response
            });
        }
    });
});