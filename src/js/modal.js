$(document).ready(function () {

    $("#myModal").on('shown.bs.modal', function() {
        console.log("shown");
        setTimeout(() => window.location.replace('./dash.php'), 5000);
    });

    $("#myModal").on('hide.bs.modal', function() {
        console.log("hide");
        window.location.replace('./dash.php')
    });

});