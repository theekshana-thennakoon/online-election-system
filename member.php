<?php
session_start();
include('database.php');
if(!isset($_SESSION['AddStatusAdmin']) && !isset($_GET['mid'])){
    header("Location:/projects/Election2/");
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
	
	<link href="/projects/Election/assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/projects/Election/assets/css/style.css">
    <style>
    .header-1 img{width:30%;}
    .inputBox select , .inputBox input{padding:1rem;font-size: 1.7rem;background:#f7f7f7;text-transform: none;margin:1rem 0;border:.1rem solid rgba(0,0,0,.3);width: 49%;}
    table{width:100%;border:1px solid #aaa;}
    th,td{padding:1.5%;border:1px solid #aaa;font-size:16px;}
    @media (max-width: 739px) {
        .contact{display: flex;min-height: 80%;align-items: center;justify-content: center;}
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
        <img src = '/projects/Election/logo.png'></a></center>

    </div>

    

</header>
<!-- Pickup section starts  -->
<?php
$mid = $_GET['mid'] - 6123;
$sql = "SELECT * FROM register where id = {$mid}";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $nic = $row['nic'];
        $fname = $row['fname'];
        $gender = $row['gender'];
        $district = $row['district'];
        $address = trim($row['address']);
    }
}

?>
<section class="contact">
	<form action='/projects/Election/xadmin.php' method = 'post' style = "text-align:left;">
        <input type = 'hidden' name = 'aorrmid' value = <?php echo $mid ?>>
            <table>
                <tr><td>NIC</td><td><?php echo $nic ?></td></tr>
                <tr><td>Full Name</td><td><?php echo $fname ?></td></tr>
                <tr><td>Gender</td><td><?php echo $gender ?></td></tr>
                <tr><td>District</td><td><?php echo $district ?></td></tr>
                <tr><td>Address</td><td><?php echo $address ?></td></tr>
            </table>
            <br>
            <div class='inputBox'>
            <input type='submit' name = 'reject' value='Reject' class='btn' style = 'background:#fe2121;width:30%;'>
                <input type='submit' name = 'approve' value='Approve' class='btn' style = 'background:#0a0;width:30%;'>
            </div>
    </form>
	
</section>

<!-- Pickup section ends -->
<br><br>
<!-- custom js file link  -->
<script src="script.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>