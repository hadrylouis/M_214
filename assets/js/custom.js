$( document ).ready(function() {
    //regex to validate email in json array
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    console.log( "Jquery ready!" );

    //sub lang change
    $("#language").click(function() {
      $("#changeLang").submit();
    });

    // Upload button
    $('#select_file').click(function () {
      $("input[type='file']").trigger('click');
    });

    // get uploaded file name and load it in table
    $.getJSON("uploads/userFiles/" + $("#userImgName").data('value'), function(data) {

      var personnes = data;

      // printing header row
      for (var i = 0; i < 1; i++) {
        var obj = personnes[i];
        for (var j in obj ){
          $('#tablejson > thead > tr:last').append('<th>' + j + '</th>')
        }
      }

      // printing content rows
      $.each(personnes, function(k, obj) {
        $('#tablejson').append('<tr></tr>')
        $.each(obj, function(k2, val) {
          $('#tablejson').find('tr:last').append('<td>' + val + '</td>')
        })
      })

      $('html, body').animate({
        scrollTop: $("#tablejson").offset().top
      }, 2000);

    });

});
