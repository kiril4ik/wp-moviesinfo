$(document).ready(function() {
    $(".widget-sort-by").click(function () {
        let sort_order;
        if (this.id == 'widget-sort-asc') {
            sort_order = 'ASC';
        }
        if (this.id == 'widget-sort-desc') {
            sort_order = 'DESC';
        }
        if (sort_order) {
            let the_id = $('.widget_movies_by_category_widget').attr('id');
            $.get("/wp-admin/admin-ajax.php", {sort_order: sort_order, action: 'sort_widget_category', the_id: the_id})
                .done(function (data) {
                    $('.widget_movies_by_category_widget ul.list-group').html(data);
                });
        }
    });
});

