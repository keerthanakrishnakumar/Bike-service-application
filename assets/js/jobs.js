function addJob() {
    // get values
    var category_name = $("#category_name").val();
    var job_name = $("#job_name").val();
 
    // Add record
    $.post("../view/ajax/addJob.php", {
        category_name : category_name,
        job_name : job_name,
    }, function (data, status) {
        // close the popup
        $("#myModal").modal("hide");
 
        // read records again
        readJob();
 
        // clear fields from the popup
        $("#category_name").val("");
        $("#job_name").val("");
    });
}

function readJob() {
    $.get("../view/ajax/readJobs.php", {}, function (data, status) {
        $(".jobs_content").html(data);
    });
}

function GetJobDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("../view/ajax/readJobDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_category_name").val(user.category_name);
            $("#update_job_name").val(user.job_name);
        }
    );
    // Open modal popup
    $("#myModalEdit").modal("show");
}

function UpdateJobDetails() {
    // get values
    var categoryName = $("#update_category_name").val();
    var jobName = $("#update_job_name").val();
    
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("../view/ajax/updateJobDetails.php", {
            id: id,
            categoryName: categoryName,
            jobName : jobName,
        },
        function (data, status) {
            // hide modal popup
            $("#myModalEdit").modal("hide");
            // reload Users by using readRecords();
            readJob();
        }
    );
}

function DeleteJob(id) {
    var conf = confirm("Are you sure, do you really want to delete Job?");
    if (conf == true) {
        $.post("../view/ajax/deleteJobs.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readJob();
            }
        );
    }
}

$(document).ready(function () {
    // READ recods on page load
    readJob(); // calling function
});