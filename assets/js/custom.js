$( document ).ready(function() {
    console.log( "Jquery ready!" );

    // CHANGER LANGUE
    $("#language").click(function() {
      $("#changeLang").submit();
    });

    // AFFICHER BON JSON EN FONCTION DE LA LANGUE
    $.getJSON("assets/json/test.json", function(data) {
      var personnes = data;

      // GET ALL KEY NAME
      for (var i = 0; i < 1; i++) {
        var obj = personnes[i];
        for (var j in obj ){
          $('#tablejson > thead > tr:last').append('<th>' + j + '</th>')
        }
      }

      // LOOP THROW JSON AND RETURN DATA
      $.each(personnes, function(k, obj) {
        $('#tablejson').append('<tr></tr>')
        $.each(obj, function(k2, val) {
          $('#tablejson').find('tr:last').append('<td>' + val + '</td>')
        })
      })

    });

});
