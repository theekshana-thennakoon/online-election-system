<?php
session_start();
if(isset($_SESSION['AddStatusAdmin'])){
    header("Location:SelectMembors");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sri Lanka Election</title>

    <!-- font awesome cdn link  -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
-->
    <!-- custom css file link  -->
	
	<link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    .header-1 img{width:30%;}
    .contact{margin-top:10%;}
    .inputBox select , .inputBox input{
	  padding:1rem;font-size: 1.7rem;background:#f7f7f7;text-transform: none;
	  margin:1rem 0;border:.1rem solid rgba(0,0,0,.3);width: 49%;
    }
    @media (max-width: 739px) {
        .contact{
            margin-top:0;display: flex;min-height: 80%;align-items: center;justify-content: center;
        }
	    .header-1 img{width:80%;}
	    .inputBox .selectplant{width:100%}
    } 
    </style>
</head>
<body>
<script src="sweetalert.min.js"></script>

<!-- header section starts  -->

<header>

    <div class="header-1">

        <center><a href="#" class="logo" style = 'color:#fe2121;'>
        <img src = 'logo.png'></a>

    </div>

    

</header>
<!-- Pickup section starts  -->

<section class="contact">
	<form action='adminprocessing' method = 'post'>

        <div class='inputBox'>

            <input type = 'text' name = 'usernameAdmin' placeholder='Username' required>
			<input type = 'password' name = 'pwd' placeholder='Password' required>
        </div>
		<input type='submit' name = 'loginAdmin' value='Login' class='btn' style = 'background:#fe2121;'>
       
    </form>
	
</section>

<!-- Pickup section ends -->
<br><br>
<!-- custom js file link  -->
<script src="script.js"></script>
<?php
if(isset($_SESSION['wrongpwd'])){
    echo "<script>
        swal({
        title: 'Wrong Password',
            text: 'Please Check Your Password',
            icon: 'error',
        });
    </script>";
    session_destroy();
}

if(isset($_SESSION['wrongemail'])){
    echo "<script>
        swal({
        title: 'Wrong Username',
            text: 'Please Check Your Username',
            icon: 'error',
        });
    </script>";
    session_destroy();
}

?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>