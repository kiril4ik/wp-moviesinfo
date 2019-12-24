$(document).ready(function () {
    $('.add-to-fav-block').click(function () {
        let context = this;
        let postId = $(this).data('post-id');
        let isFav = !$(this).data('is-fav');

        // console.log(fav_posts_settings);
        let path_data = fav_posts_settings['path_data'];
        let postUrl = path_data['basic_endpoint_url'] + path_data['namespace'] + path_data['route_modify'];
        // console.log(fav_posts_settings['wp_nonce_field']);
        $.post(postUrl, {
            _wpnonce: fav_posts_settings['wp_nonce_field'],
            action: 'wp_rest',
            post_id: postId,
            is_fav: isFav
        })
            .done(function (data) {
                console.log(data);
                if (!isFav) {
                    $(context).parent('.fav-post-block').slideUp();
                }
                // console.log(isFav);
                $(context).data('is-fav', isFav);
                $(context).find('.glyphicon').toggleClass('glyphicon-star').toggleClass('glyphicon-star-empty');
                $(context).find('.text-fav').toggleClass('hide');
            });

    });
});