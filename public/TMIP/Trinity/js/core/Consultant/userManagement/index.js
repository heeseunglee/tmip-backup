/**
 * Created by Heeseung on 2015-01-13.
 */
$(document).ready(function() {
    jQuery.ajaxSetup({async:false});

    $(".link_users_management_index_ajax_consultant_course").click(function(e) {
        e.preventDefault();
        var consultant_id = $(this).find("input[name=consultant_id]").val();

        $.get("ajax/companyList/" + consultant_id, function(data) {
            if(!$("#inserted").isNull) {
                $("#inserted").remove();
            }
            $("#insert").before(data);
            $(".link_users_management_index_ajax_company").click(function(e) {
                e.preventDefault();
                var consultant_id = $(this).find("input[name=consultant_id]").val();
                var company_id = $(this).find("input[name=company_id]").val();
                $.get("ajax/companyCourseDetail/" + consultant_id + "/" + company_id, function(data) {
                    $("#users_management_index_company_course_detail").html(data);
                })
                $(".table_user_management_index_consultant_course_detail").dataTable();
                $(".hr_tooltip").tooltipster();
            })
        });

        $.get("ajax/companyCourseDetail/" + consultant_id, function(data) {
            $("#users_management_index_company_course_detail").html(data);
        });
        $(".table_user_management_index_consultant_course_detail").dataTable();
        $(".hr_tooltip").tooltipster();
    });

});