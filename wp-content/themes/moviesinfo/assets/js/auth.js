$(document).ready(function () {
    let postUrl = reg_api_data['basic_endpoint_url']+reg_api_data['namespace']+reg_api_data['route'];
    $(".moviesinfo-reg-form").submit(function (event) {
        event.preventDefault();
        $.post(postUrl,
            $(".moviesinfo-reg-form").serialize())
            .done(function (data) {
                location.href = data['redirect_url'];
            })
            .fail(function (data) {
                console.log(data);
                let errMessage = "";
                let errLog = data['responseJSON']['data']['params'];
                if(!(typeof(errLog) == 'undefined' || errLog === null)) {
                    for (err in errLog) {
                        errMessage += errLog[err] + '<br>';
                    }
                } else {
                    errMessage = data['responseJSON']['message'];
                }
                $('#form-error-found').html(errMessage);
            });
    });
});