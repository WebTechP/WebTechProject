// 'use strict';
var popup = $('#popup');
// popup.hide();

$(function () {
  $("input[type='password'][data-eye]").each(function (i) {
    var $this = $(this),
      id = 'eye-password-' + i,
      el = $('#' + id);

    $this.wrap(
      $('<div/>', {
        style: 'position:relative',
        id: id,
      })
    );

    $this.css({
      paddingRight: 60,
    });
    $this.after(
      $('<div/>', {
        html: 'Show',
        class: 'btn btn-primary btn-sm',
        id: 'passeye-toggle-' + i,
      }).css({
        position: 'absolute',
        right: 10,
        top: $this.outerHeight() / 2 - 12,
        padding: '2px 7px',
        fontSize: 12,
        cursor: 'pointer',
      })
    );

    $this.after(
      $('<input/>', {
        type: 'hidden',
        id: 'passeye-' + i,
      })
    );

    var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

    if (invalid_feedback.length) {
      $this.after(invalid_feedback.clone());
    }

    $this.on('keyup paste', function () {
      $('#passeye-' + i).val($(this).val());
    });
    $('#passeye-toggle-' + i).on('click', function () {
      if ($this.hasClass('show')) {
        $this.attr('type', 'password');
        $this.removeClass('show');
        $(this).removeClass('btn-outline-primary');
      } else {
        $this.attr('type', 'text');
        $this.val($('#passeye-' + i).val());
        $this.addClass('show');
        $(this).addClass('btn-outline-primary');
      }
    });
  });

  $('.my-login-validation').on('submit', function () {
    var form = $(this);
    // if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    // }
    // form.addClass('was-validated');

    $.ajax({
      type: "GET",
      url: "http://localhost:8008/_user/login",
      data: form.serialize(),
      contentType: "application/x-www-form-urlencoded",
      dataType: 'json',
      success: function(data){ 
        var userData;
        if (data['status'] == 'success') {
          userData = data['userData'];
          var temp = "http://localhost:8008/index?first_name=" + userData['first_name'] + "&last_name="+ userData['last_name'];
          window.location.href = temp;
          // $(location).attr('href', '' + temp);
        } else {
          console.log("error");
        } 
        // $("#demo").html(data[0]);
       
      }
    
    
    });
  });
});
