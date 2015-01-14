/**
 * Created by finallee on 15. 1. 14..
 */
$(document).ready(function() {

    $("#add_student_row").click(function(e) {
        var number_of_students = $("#number_of_students").val();
        var next_number_of_students = parseInt(number_of_students) + 1;
        $("#student_row_" + number_of_students).after("<div id='student_row_" + next_number_of_students + "' class='row'>\
        <div class='col-lg-12'>\
        <div class='box'>\
        <div class='box-head box-head-xs style-support3'>\
        <header><h5 class='text-light'>학생 <strong>#" + next_number_of_students + "</strong></h5></header>\
        </div>\
        <div class='box-body'>\
        <div class='form-group'>\
        <div class='col-lg-3 col-sm-2'>\
        <label for='student_name_" + next_number_of_students + "' class='control-label'>이름</label>\
        </div>\
        <div class='col-lg-9 col-sm-10'>\
        <input type='text' name='student_name_" + next_number_of_students + "' id='student_name_" + next_number_of_students + "' class='form-control' placeholder='이름' required='' data-rule-minlength='2'>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-lg-3 col-sm-2'>\
        <label for='student_email_" + next_number_of_students + "' class='control-label'>이메일</label>\
        </div>\
        <div class='col-lg-9 col-sm-10'>\
        <input type='email' name='student_email_" + next_number_of_students + "' id='student_email_" + next_number_of_students + "' class='form-control' placeholder='이메일' required=''>\
        </div>\
        </div>\
        </div>\
        </div>\
        </div>\
        </div>");
        $("#number_of_students").val(next_number_of_students);
    });

    $("#remove_student_row").click(function(e) {
        var number_of_students = $("#number_of_students").val();
        if(number_of_students > 1) {
            $("#student_row_" + number_of_students).remove();
            $("#number_of_students").val(parseInt(number_of_students) - 1);
        }
    });
});