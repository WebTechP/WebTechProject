

$('.my-form-validation').on('submit', function(){
    form = $(this);
    if (form[0].checkValidity() === false) {
        form.preventDefault();
        form.stopPropagation();
    }
    form.addClass('was-validated');

    var data = form.serialize();

    $.ajax({
        type: "POST",
        url: "http://localhost:8008/_user/register",
        data: data,
        contentType: "application/x-www-form-urlencoded",
        dataType: "json", 
        success: function(data) {
            if (data['status'] == 'success') {
                var temp = "http://localhost:8008/login";
                window.location.href = temp;
                // $(location).attr('href', '' + temp);
            } else {
                console.log("error");
            } 
        }


    })
})