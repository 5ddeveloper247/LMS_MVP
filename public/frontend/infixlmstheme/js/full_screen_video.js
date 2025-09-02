$(document).ready(function () {
    var base_url = $(".base_url").val();
    var csrf = $(".csrf_token").val();

    $(document).on("click", ".course_name", function (e) {
        let status = 0;
        if ($(this).prop("checked") == true) status = 1;
        let course_id = $(this).data("course");
        let lesson_id = $(this).data("lesson");
        $.ajax({
            url: base_url + "/lesson-complete",
            method: "POST",
            data: {
                status: status,
                course_id: course_id,
                lesson_id: lesson_id,
                _token: csrf,
            },

            success: function (result) {
                location.reload();
                $(".certificate_btn").hide();

                if (result.btn == 1) {
                    $(".certificate").show();
                } else {
                    $(".certificate").hide();
                }
            },
        });
    });
});

function goFullScreen(
    course_id,
    lesson_id,
    program_id = 'null',
    course_type = 'null',
    plan_id = 'null'
) {
    var url = document.getElementById("url").value;
    var fullurl = url;
    if (program_id != 'null' && program_id > 0) {
        fullurl = url +
            "/fullscreen-view/" +
            course_id +
            "/" +
            lesson_id +
            "?program_id=" +
            program_id;
        if(plan_id != 'null'){
            fullurl = fullurl + '&plan_id=' + plan_id;
        }
    } else if (course_type != 'null' && course_type > 0) {
        fullurl = url +
            "/fullscreen-view/" +
            course_id +
            "/" +
            lesson_id +
            "?courseType=" +
            course_type;
        if (plan_id != 'null') {
            fullurl = fullurl + '&plan_id=' + plan_id;
        }
        
    } else {
        fullurl = url + "/fullscreen-view/" + course_id + "/" + lesson_id;
        
    }
    window.location.replace(fullurl);
}

function goQuizTest(current) {
    // let link = current.('url');
    window.location.href = current;
}
