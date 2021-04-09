// $.ajax
//     ({
//         type: "POST",
//         url: "student/watched-video",
//         data: $("#tag-form").serialize(),
    
//         beforeSend: function(){
//             // $(".submit").html('SENDING');
//         },

//         success: function(data)
//         {
//             console.log(data);
//         }
//     });

//     // Initiate venobox (lightbox feature used in portofilo)
//     $(document).ready(function() {
//         $('.venobox').venobox();
//     });  
    
// Edit Config Modal
$('#edit-config-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var data = 'id=' + id;

    $.ajax({
        type: "GET",
        url: "/manage/config/edit/"+id,
        data: data,
        cache: false,
        success: function (data) {
            console.log(data);
            $('.dynamic-content').html(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
});

// Delete Config Modal
$('#delete-config-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var data = 'id=' + id;

    $.ajax({
        type: "GET",
        url: "/manage/config/delete/"+id,
        data: data,
        cache: false,
        success: function (data) {
            console.log(data);
            $('.dynamic-content').html(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
});

// Load Card
$(document).ready(function() {
  $.ajax({
      type: "GET",
      url: "/manage/cards",
      cache: false,
      success: function (data) {
          console.log(data);
          $('#cards').html(data);
      },
      error: function(err) {
          console.log(err);
      }
  });
    // console.log('Success');
});