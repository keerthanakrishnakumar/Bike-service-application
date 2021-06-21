function addRecord() {
    // get values
    var target_month = $("#target_month").val();
    var spars = $("#spars").val();
    var sparsPercen = $("#spars_percentage").val();
    var oil = $("#oil").val();
    var oilPercen = $("#oil_percentage").val();
    var multibrand = $("#multibrand").val();
    var multibrandPercen = $("#multibrand_percentage").val();
    var user_id = $("#user_id").val();
 
    // Add record
    $.post("../view/ajax/addTarget.php", {
        target_month: target_month,
        spars: spars,
        spars_percentage: sparsPercen,
        oil: oil,
        oil_percentage: oilPercen,
        multibrand: multibrand,
        multibrand_percentage: multibrandPercen,
        user_id: user_id,
    }, function (data, status) {
        // close the popup
        $("#myModal").modal("hide");
 
        // read records again
        readRecords();
 
        // clear fields from the popup
        $("#target_month").val("");
        $("#spars_percentage").val("");
        $("#oil_percentage").val("");
        $("#multibrand_percentage").val("");
    });
}

function readRecords() {
    $.get("../view/ajax/readTarget.php", {}, function (data, status) {
        $(".target_content").html(data);
    });
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("../view/ajax/readTarget.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#etarget_month").val(user.target_month);
            $("#espars_percentage").val(user.spars_percentage);
            $("#eoil_percentage").val(user.oil_percentage);
            $("#emultibrand_percentage").val(user.multibrand_percentage);
        }
    );
    // Open modal popup
    $("#myModalEdit").modal("show");
}

function UpdateTargetDetails() {
    // get values
    var targetMonth = $("#etarget_month").val();
    var sparsPercentage = $("#espars_percentage").val();
    var oilPercentage = $("#eoil_percentage").val();
    var brandPercentage = $("#emultibrand_percentage").val();
    
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("../view/ajax/updateTarget.php", {
            id: id,
            targetMonth: targetMonth,
            sparsPercentage: sparsPercentage,
            oilPercentage: oilPercentage,
            brandPercentage: brandPercentage,
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
    var conf = confirm("Are you sure, do you really want to delete Target?");
    if (conf == true) {
        $.post("../view/ajax/deleteTarget.php", {
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