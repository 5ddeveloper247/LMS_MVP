$(".toggle-password").click(function () {
    var input = $(this).closest(".input-group").find("input");

    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(document).on(
    "click",
    "#lms_table .switch_toggle, #lms_table2 .switch_toggle",
    function (e) {
        var input = $(this).find("input.status_enable_disable");
        if (!input.length) {
            return;
        }
        if (parseInt(input.data("has-password"), 10) !== 0) {
            return;
        }
        // Block only when trying to activate (currently inactive)
        if (!input.is(":checked")) {
            e.preventDefault();
            e.stopImmediatePropagation();
            toastr.warning(
                "Please set the password first from the Action button, then activate the user.",
                "Warning"
            );
            return false;
        }
    }
);
$(".imgBrowse").change(function (e) {
    e.preventDefault();
    var file = $(this).closest(".primary_file_uploader").find(".imgName");
    var filename = $(this).val().split("\\").pop();
    file.val(filename);
});

$(document).on("click", ".editInstructor", function () {
    let instructor_id = $(this).data("item-id");
    let url = $("#url").val();
    url = url + "/admin/get-user-data/" + instructor_id;
    let token = $(".csrf_token").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
        },
        success: function (instructor) {
            let password_required = (instructor.pass) ? false : true;
            $('#password').attr('required',password_required);
            $('#password_confirm').attr('required',password_required);
            $("#instructorId").val(instructor.id);
            $("#instructorRoleId").val(instructor.role_id);
            $("#instructorName").val(instructor.name);
            if ($("#instructorGender").length) {
                $("#instructorGender").val(instructor.gender);
                $("#instructorGender").niceSelect("update");
            }
            $('#instructorAbout').val(instructor.about);
            if ($("#instructorDob").length) {
                $("#instructorDob").val(instructor.dob);
            }
            $("#instructorPhone").val(instructor.phone);
            $("#instructorEmail").val(instructor.email);
            $("#instructorImage").val(instructor.image);
            $("#image_preview-1").attr("src", instructor.assetimage);
            $("#image_preview-1-old").val(instructor.assetimage);
            if ($("#instructorFacebook").length) {
                $("#instructorFacebook").val(instructor.facebook);
            }
            if ($("#instructorTwitter").length) {
                $("#instructorTwitter").val(instructor.twitter);
            }
            if ($("#instructorLinkedin").length) {
                $("#instructorLinkedin").val(instructor.linkedin);
            }
            if ($("#instructorInstragram").length) {
                $("#instructorInstragram").val(instructor.instagram);
            }
            $("#editInstructor").modal("show");
        },
        error: function (data) {
            toastr.error("Something Went Wrong", "Error");
        },
    });
});

$(document).on("click", ".deleteInstructor", function () {
    let id = $(this).data("id");
    $("#instructorDeleteId").val(id);
    $("#deleteInstructor").modal("show");
});

$(document).on("click", "#add_instructor_btn", function () {
    $("#addName").val("");
    $("#addAbout").html("");
    $("#startDate").val("");
    $("#addPhone").val("");
    $("#addEmail").val("");
    $("#addPassword").val("");
    $("#addCpassword").val("");
    $("#addFacebook").val("");
    $("#addTwitter").val("");
    $("#addLinked").val("");
    $("#addInstagram").val("");
});
