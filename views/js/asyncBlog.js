$(document).ready(function() {
    $.ajax({
        url: '/blog',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('.blog-content').append(response.rendered_template);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});