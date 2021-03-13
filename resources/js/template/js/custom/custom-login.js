$(document).ready(function() {
    $(".alert").delay(10000).slideUp(200, function() {
        $(this).alert('close');
    });
});

let viewPassword = () => {
    var x = document.getElementById("password");
    // console.log($('.view-password'))//.removeClass('feather')
    if (x.type === "password") {
        $('#view-password').html('<i class="feather icon-eye-off" style="font-size: 20px;"></i>')
        x.type = "text";
    } else {
        $('#view-password').html('<i class="feather icon-eye" style="font-size: 20px;"></i>')
        x.type = "password";
    }
}

/** funcion para solicitar domiciliario a domisuperadmin**/
$("body").on("click", "#submit", function() { 
    $('#submit').html('<span class="spinner-border spinner-border" role="status" aria-hidden="true"></span>');
 });