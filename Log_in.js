$(document).ready(function() {
  console.log('kwdkdwkwdkwd')

$("#form-content").submit(function(e) {
    const regData = {
      username: $("#username").val(),
      password: $("#password").val(),
    };
    

    $.post('auth/login.php', regData, function(resp) {
        console.log(resp)
        window.location.href = "home.php";
    });
    
    e.preventDefault();
  });

});


