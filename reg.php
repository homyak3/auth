<!DOCTYPE html>
<html leng="english">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style_registr.css">
</head>
<body>
<main>
 <div class="auth_block">
  <div class="form_auth_block">
    <span class="head_text">REGISTRATION ACCOUNT</span>
      <form action="#" method="post">
    	   <span class="auth_name">USERNAME<?php if (isset($ok4)) {
            if ($ok4 == true) {
                echo "<span style = 'color:red'> Input login at 4 to 10 simbol!</span>";
            }}?></span>
    	   <div class="auth_style">
                <input type="text" name="login" required>
           </div>
           <span class="auth_name">EMAIL<?php if (isset($ok2)) {
            if($ok2 == true) {
                echo "<span style = 'color:red'>Input validate email!</span>";
            }} ?></span>
         <div class="auth_style">
                <input type="email" name="email" required>
           </div>
            <span class="auth_pass">PASSWORD<?php if (isset($ok3)) {
                if($ok3 == true){echo "<span style = 'color:red'>Input password at 6 to 12 simbol!</span>";
            }} ?></span>
           <div class="auth_style">
                <input type="password" id = "password-input" name="password" required>
                <a href="#" class="password-control"></a>
           </div>
            <span class="auth_pass">REPEAT PASSWORD</span>
           <div class="auth_style">
                <input type="password" id = "password-input_sr" name="password_sr" required>
                <a href="#" class="password-control_sr"></a>
           </div>
           <span class="auth_name">NAME</span>
           <div class="auth_style">
                <input type="text" name="name" required>
           </div>
           <span class="auth_name">SURNAME</span>
           <div class="auth_style">
                <input type="text" name="surname" required>
           </div>
           <span class="auth_name">HAPPY BIRTHDAY<?php if (isset($ok)) {
            if($ok == true){echo "<p style = 'color:red'>Input validate your happy birthday!</p>";
            }} ?></span>
           <div class="auth_style">
                <input type="text" name="hb" required>
           </div>
                <button class="auth_button" type="submit" name="auth_submit">Registration</button>
       </form>
  </div>
 </div>
 <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script>
$('body').on('click', '.password-control', function(){
	if ($('#password-input').attr('type') == 'password'){
		$(this).addClass('view');
		$('#password-input').attr('type', 'text');
	} else {
		$(this).removeClass('view');
		$('#password-input').attr('type', 'password');
	}
	return false;
});
$('body').on('click', '.password-control_sr', function(){
    if ($('#password-input_sr').attr('type') == 'password'){
        $(this).addClass('view1');
        $('#password-input_sr').attr('type', 'text');
    } else {
        $(this).removeClass('view1');
        $('#password-input_sr').attr('type', 'password');
    }
    return false;
});
</script>
</main>
</body>
</html>