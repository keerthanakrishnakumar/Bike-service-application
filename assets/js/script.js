function addRecord() {
    // get values
    var branch_name = $("#branch_name").val();
 
    // Add record
    $.post("../view/ajax/addRecord.php", {
        branch_name: branch_name,
    }, function (data, status) {
        // close the popup
        $("#myModal").modal("hide");
 
        // read records again
        readRecords();
 
        // clear fields from the popup
        $("#branch_name").val("");
    });
}

function readRecords() {
    $.get("../view/ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("../view/ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_branch_name").val(user.branch_name);
        }
    );
    // Open modal popup
    $("#myModalEdit").modal("show");
}

function UpdateUserDetails() {
    // get values
    var branchName = $("#update_branch_name").val();
    
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("../view/ajax/updateUserDetails.php", {
            id: id,
            branchName: branchName,
        },
        function (data, status) {
            // hide modal popup
            $("#myModalEdit").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete Branch?");
    if (conf == true) {
        $.post("../view/ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});