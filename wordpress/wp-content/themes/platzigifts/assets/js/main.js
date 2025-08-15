console.log("Hello from main.js");
(function ($) {
    $('#products-categories').change(function () {
        let selectedCategory = $(this).val();
        $.ajax({
            url: pg.ajaxurl,
            method: 'POST',
            data: {
                action: 'pg_filter_products',
                category: selectedCategory
            },
            beforeSend: function () {
                $('#products-list').html('<p>Loading...</p>');
            },
            success: function (response) {
                let html = '';
                response.forEach(function (item) {
                    html += `
                    <a href="${item.link}">
                            <div class="border p-4 rounded">
                                <h3 class="text-xl">${item.title}</h3>
                                <div class="mb-4">
                                   ${item.image}
                                </div>
                            </div>
                        </a>
                    `
                });
                $('#products-list').html(html);
            },
            error: function (error) {
                console.log('Error fetching products', error);
            }
        });
    })
})(jQuery);