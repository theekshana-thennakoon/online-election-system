<?php
session_start();
include('database.php');
date_default_timezone_set('Asia/Colombo');

$sqlc = "SELECT * FROM electiondate";
$resultc = $conn->query($sqlc);
if ($resultc->num_rows > 0){
    while($rowc = $resultc->fetch_assoc()){
        $election_date = $rowc['date'];
    }
}
if(date('Y-m-d') != "{$election_date}" and !(isset($_SESSION['party_id'])) ){
	header("Location:index");
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .header-1 img{width:30%;}
    body::-webkit-scrollbar {
            display: none;
        }
    .contact{
        margin-top:2vh;align-items: center;justify-content: center;
    }
    a{text-decoration:none;color:#9C53A0;}
    .contact-2{
        display:none;
    }
    .form-control{border:1px solid #9C53A0;}
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
    <h2>ඔබේ මනාප | Your Votes | உங்கள் வாக்குகள்</h2>
    <table class="table mt-5" style = 'border:1px solid #9C53A0;'>
  <tbody>

        <?php
            if(isset($_SESSION['party_id'])){
                $pid = $_SESSION['party_id'];
                $sql = "SELECT * FROM parties WHERE id = {$pid}";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $p_id = $row['id'];
                        $namee = $row['namee'];
                        $names = $row['names'];
                        $namet = $row['namet'];
                    }
                    $p_name = $names . "<br>" . $namee . "<br>" . $namet;
                }
            }
            else{
                $p_name = "-";
            }

            if(isset($_SESSION['first_vote_id'])){
                $fid = $_SESSION['first_vote_id'];
                $sqlf = "SELECT * FROM candidates WHERE id = {$fid}";
                $resultf = $conn->query($sqlf);
                if ($resultf->num_rows > 0){
                    while($rowf = $resultf->fetch_assoc()){
                        $f_id = $rowf['id'];
                        $fnamee = $rowf['namee'];
                        $fnames = $rowf['names'];
                        $fnamet = $rowf['namet'];
                    }
                    $f_name = $fnames . "<br>" . $fnamee . "<br>" . $fnamet;
                }
            }
            else{
                $f_name = "-";
            }

            if(isset($_SESSION['second_vote_id'])){
                $sid = $_SESSION['second_vote_id'];
                $sqls = "SELECT * FROM candidates WHERE id = {$sid}";
                $results = $conn->query($sqls);
                if ($results->num_rows > 0){
                    while($rows = $results->fetch_assoc()){
                        $s_id = $rows['id'];
                        $snamee = $rows['namee'];
                        $snames = $rows['names'];
                        $snamet = $rows['namet'];
                    }
                    $s_name = $snames . "<br>" . $snamee . "<br>" . $snamet;
                }
            }
            else{
                $s_name = "-";
            }

            if(isset($_SESSION['third_vote_id'])){
                $tid = $_SESSION['third_vote_id'];
                $tqls = "SELECT * FROM candidates WHERE id = {$tid}";
                $resultt = $conn->query($sqlt);
                if ($resultt->num_rows > 0){
                    while($rowt = $resultt->fetch_assoc()){
                        $t_id = $rowt['id'];
                        $tnamee = $rowt['namee'];
                        $tnames = $rowt['names'];
                        $tnamet = $rowt['namet'];
                    }
                    $t_name = $tnames . "<br>" . $tnamee . "<br>" . $tnamet;
                }
            }
            else{
                $t_name = "-";
            }
        ?>

            <tr>
                <th scope='row' class = 'fs-4 pt-3 pb-3'>Name of the party</th>
                <td class = 'fs-4 pt-3 pb-3'><?php echo $p_name;?></td>
            </tr>

            <tr>
                <th scope='row' class = 'fs-4 pt-3 pb-3'>First Vote</th>
                <td class = 'fs-4 pt-3 pb-3'><?php echo $f_name;?></td>
            </tr>

            <tr>
                <th scope='row' class = 'fs-4 pt-3 pb-3'>Second Vote</th>
                <td class = 'fs-4 pt-3 pb-3'><?php echo $s_name;?></td>
            </tr>

            <tr>
                <th scope='row' class = 'fs-4 pt-3 pb-3'>Third Vote</th>
                <td class = 'fs-4 pt-3 pb-3'><?php echo $t_name;?></td>
            </tr>
  </tbody>
</table>
    <center>
    <?php
        if(isset($_SESSION['party_id'])){
            if(isset($_SESSION['party_id'])){
                $pid = $_SESSION['party_id'];
            }
            if(isset($_SESSION['first_vote_id'])){
                $fid = $_SESSION['first_vote_id'];
            }
            if(isset($_SESSION['second_vote_id'])){
                $sid = $_SESSION['second_vote_id'];
            }
            if(isset($_SESSION['third_vote_id'])){
                $tid = $_SESSION['third_vote_id'];
            }
    ?>
    <a href="processing?submitvote=1">
        <button class='btn btn-primary w-50 pt-3 pb-3 fs-4' style = 'background:#9C53A0'>Enter the vote | ඡන්දය ඇතුලත් කරන්න | வாக்கை உள்ளிடவும் </button>
    </a>
    <a href="processing?clear_sessions=1">
        <button class='btn btn-primary w-50 pt-3 pb-3 fs-4' style = 'background:#f00'>Change the vote | ඡන්දය වෙනස් කරන්න | வாக்கை மாற்றவும் </button>   
    </a>
    <?php
        }
    ?>
	</center>
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