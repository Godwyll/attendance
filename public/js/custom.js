// $(document).ready(function() {
// Create Attendance Entry Form
$("#attendance-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "/entries",
        data: $("#attendance-form").serialize(),

        beforeSend: function () {
            // console.log(data),
            $("#message-box").html("<div class='progress progress-lg'><div class='progress-bar progress-bar-striped active progress-bar-warning' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%;'><span>Loading...</span></div></div>");
        },

        success: function (data) {
            $("#message-box").html(data);
            document.getElementById("attendance-form").reset();
            document.getElementById("student_no").focus();
        }
    });
});

// });

// Edit Session Modal
$('#edit-session-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var data = 'id=' + id;

    $.ajax({
        type: "GET",
        url: "/sessions/" + id + "/edit",
        data: data,
        cache: false,
        success: function (data) {
            console.log(data);
            $('.dynamic-content').html(data);
        },
        error: function (err) {
            console.log(err);
        }
    });
});

// Delete Session Modal
$('#delete-session-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var data = 'id=' + id;

    $.ajax({
        type: "GET",
        url: "/sessions/" + id + "/delete",
        data: data,
        cache: false,
        success: function (data) {
            console.log(data);
            $('.dynamic-content').html(data);
        },
        error: function (err) {
            console.log(err);
        }
    });
});

// Load Card
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/cards",
        cache: false,
        success: function (data) {
            console.log(data);
            $('#cards').html(data);
        },
        error: function (err) {
            console.log(err);
        }
    });
    // console.log('Success');
});
