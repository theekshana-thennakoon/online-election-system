<?php
session_start();
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .header-1 img{width:30%;}
    .contact{
        margin-top:20vh;align-items: center;justify-content: center;
    }
    .contact-2{
        display:none;
    }
    .form-control , .btn{border:1px solid #9C53A0;}
    @media (max-width: 739px) {
        .ntfoundgif{width:50%;}
        .contact{
            display:none;
        }
        .contact-2{
            display: block;margin-top: 20vh;align-items: center;justify-content: center;
        }
	    .header-1 img{width:80%;}
    } 
    </style>
</head>
<body oncontextmenu = "return false;">
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
	<form action='processing' method = 'post'>
        <input type="text" name = 'nic' class="form-control form-control-lg pt-3 pb-3 fs-4" placeholder = "Enter Nic Number ( ජාතික හැදුනුම්පත් අංකය ඇතුලත් කරන්න | தேசிய அடையாள எண்ணை உள்ளிடவும் )" required>
        <button type='submit' name = 'confirm' class='btn btn-primary btn-lg mt-5 pt-3 pb-3 fs-3' style = 'width:45%;background:#9C53A0;'>අනන්‍යතාවය තහවුරු කරන්න | Confirm identity அடையாளத்தைச் சரிபார்க்கவும்'</button>
    </form>	
</section>

<section class="contact-2">
	<form>
    <center><img src = 'images/nofoundpageimg.png' class = 'ntfoundgif'><br>
        <input type = 'confirm' value="You can't View this page in mobile view" class='btn btn-primary btn-lg mt-5 pt-4 pb-4 fs-1' style = 'width:100%;background:#5F3920;'>
    </form>	
</section>

<!-- Pickup section ends -->
<br><br>
<!-- custom js file link  -->
<script src="script.js"></script>
<?php
if(isset($_SESSION['checkNic'])){
    echo "<script>
        swal({
        title: 'Invalied NIC',
            text: 'Please Check Your National Identity Card Number',
            icon: 'error',
        });
    </script>";
}
if(isset($_SESSION['cantApply'])){
    echo "<script>
        swal({
        title: 'Cannot Vote',
            text: 'You cant vote for this election because your  age not yet completed',
            icon: 'error',
        });
    </script>";
}
if(isset($_SESSION['alreadyVoted'])){
    echo "<script>
        swal({
        title: 'Cannot Vote',
            text: 'You Already Voted',
            icon: 'error',
        });
    </script>";
}

if(isset($_SESSION['notVoted'])){
    echo "<script>
        swal({
        title: 'You can Vote',
            text: 'You Already registerd. but not voted',
            icon: 'success',
        });
    </script>";
}

if(isset($_SESSION['notRegisterd'])){
    echo "<script>
        swal({
        title: 'You cannot Vote',
            text: 'You not registerd.',
            icon: 'error',
        });
    </script>";
}

if(isset($_SESSION['sussessReg'])){
    $txt = 'Successfully. You can vote now';
    echo "<script>
        swal({
        title: 'Successfully',
            text: '$txt',
            icon: 'success',
        });
    </script>";
}
session_destroy();
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>