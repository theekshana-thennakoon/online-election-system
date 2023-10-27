<?php
session_start();
?>
<?php
include('database.php');
date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d");
$date_with_time = date("Y-m-d h:i");
?>
<script src="sweetalert.min.js"></script>
<?php

if(isset($_POST['register'])){
	$otpnum = $_POST['otpnum'];
	if ($otpnum == $_SESSION['stotp']){

		$nic = $_SESSION['nic'];
        $fnamewithint = $_SESSION['fnamewithint'];
        $genderslct = $_SESSION['genderslct'];
        $districtslct = $_SESSION['districtslct'];
        $mobile = $_SESSION['mobile'];
        $address = $_SESSION['address'];

		$sqli = "insert into register(nic,fname,gender,address,district,phone) values('$nic','$fnamewithint','$genderslct','$address','$districtslct',$mobile)";
		if($conn->query($sqli) === TRUE){
			$_SESSION['sussessReg'] = 0;
			header("Location:registration");
		}
	}
	else{
		
		//echo "<script>window.history.back()</script>";
	}
}

if(isset($_POST['select_first_vote'])){
    $first_vote_id = $_POST['first_vote'];
    $_SESSION['first_vote_id'] = $first_vote_id;
    header("Location:second_vote");
}
if(isset($_POST['select_second_vote'])){
    $second_vote_id = $_POST['first_vote'];
    $_SESSION['second_vote_id'] = $second_vote_id;
    header("Location:third_vote");
}
if(isset($_POST['select_third_vote'])){
    $third_vote_id = $_POST['first_vote'];
    $_SESSION['third_vote_id'] = $third_vote_id;
    header("Location:submit_vote");
}
if(isset($_GET['clear_sessions'])){
    session_destroy();
    echo "<script>window.history.back()</script>";header("Location:index");
}

if(isset($_POST['confirm'])){
    $nic = $_POST['nic'];
        
    if($nic[0] == 2){
        $getmonth = $nic[4] . $nic[5] . $nic[6];
        $birthyear = $nic[0] . $nic[1] . $nic[2] . $nic[3];
    }
    else if($nic[0] == 9 ||$nic[0] == 8 ||$nic[0] == 7 ||$nic[0] == 6 ||$nic[0] == 5 ||$nic[0] == 4 ||$nic[0] == 3){
        $getmonth = $nic[2] . $nic[3] . $nic[4];
        $birthyear = "19" . $nic[0] . $nic[1];
    }
    else{
        $_SESSION['checkNic'] = 0;
        echo "<script>window.history.back()</script>";
    }

    if ($getmonth > 500){
        $getmonth -= 500;
    }
    if ($getmonth <= 31){
        $monthNumber = '01';
        $day = $getmonth;
    }
    else if ($getmonth <= 60){
        $monthNumber = '02';
        $day = $getmonth - 31;
    }
    else if ($getmonth <= 91){
        $monthNumber = '03';
        $day = $getmonth - 60;
    }
    else if ($getmonth <= 121){
        $monthNumber = '04';
        $day = $getmonth - 91;
    }
    else if ($getmonth <= 152){
        $monthNumber = '05';
        $day = $getmonth - 121;
    }
    else if ($getmonth <= 182){
        $monthNumber = '06';
        $day = $getmonth - 152;
    }
    else if ($getmonth <= 213){
        $monthNumber = '07';
        $day = $getmonth - 182;
    }
        else if ($getmonth <= 244){
        $monthNumber = '08';
        $day = $getmonth - 213;
    }
    else if ($getmonth <= 274){
        $monthNumber = '09';
        $day = $getmonth - 244;
    }
    else if ($getmonth <= 305){
        $monthNumber = '10';
        $day = $getmonth - 274;
    }
        else if ($getmonth <= 335){
        $monthNumber = '11';
        $day = $getmonth - 305;
    }
    else if ($getmonth <= 366){
        $monthNumber = '12';
        $day = $getmonth - 335;
    }
    if (strlen($day) < 2){
        $day = '0' . $day;
    }
    $birthday = "{$birthyear}-{$monthNumber}-{$day}";
    $birthday = strtotime("{$birthday}");
    $todate = strtotime("{$date}");
	$diff_days = $todate - $birthday;
	$different = floor($diff_days/(60*60*24*366));
    if ($different < 18){
        $_SESSION['cantApply'] = 0;
        echo "<script>window.history.back()</script>";
    }
    else{
        $sql = "SELECT * FROM voters WHERE nic = '{$nic}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $status = $row['status'];
                if($status == "voted"){
                    $_SESSION['alreadyVoted'] = 0;
                    echo "<script>window.history.back()</script>";
                }
                else if($status == "pending_vote"){
                    $_SESSION['user_nic'] = $nic;
                    header("Location:index");
                }
            }
        }
        else{
            $_SESSION['notRegisterd'] = 0;
            echo "<script>window.history.back()</script>";
        }
    }       
}

if(isset($_GET['submitvote'])){
    if(isset($_SESSION['party_id'])){
        $pid = $_SESSION['party_id'];
        $sql = "SELECT * FROM votes WHERE pid = {$pid}";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $count = $row['count'] + 1;
                $sqli = "UPDATE votes SET count = $count WHERE pid = {$pid}";
            }
        }
        else{
            $sqli = "INSERT INTO votes(pid,count) VALUES($pid,1)";
        }
        if($conn->query($sqli) === TRUE){
            
        }
    }
    if(isset($_SESSION['first_vote_id'])){
        $fid = $_SESSION['first_vote_id'];
        $sql = "SELECT * FROM votes WHERE candidate_id = {$fid}";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $count = $row['f_count'] + 1;
                $sqli = "UPDATE votes SET f_count = $count WHERE candidate_id = {$fid}";
            }
        }
        else{
            $sqli = "INSERT INTO votes(candidate_id,f_count) VALUES($fid,1)";
        }
        if($conn->query($sqli) === TRUE){
            
        }
    }
    if(isset($_SESSION['second_vote_id'])){
        $sid = $_SESSION['second_vote_id'];
        $sql = "SELECT * FROM votes WHERE candidate_id = {$sid}";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $count = $row['s_count'] + 1;
                $sqli = "UPDATE votes SET s_count = $count WHERE candidate_id = {$sid}";
            }
        }
        else{
            $sqli = "INSERT INTO votes(candidate_id,s_count) VALUES($sid,1)";
        }
        if($conn->query($sqli) === TRUE){
            
        }
    }
    if(isset($_SESSION['third_vote_id'])){
        $tid = $_SESSION['third_vote_id'];
        $sql = "SELECT * FROM votes WHERE candidate_id = {$tid}";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $count = $row['t_count'] + 1;
                $sqli = "UPDATE votes SET t_count = $count WHERE candidate_id = {$tid}";
            }
        }
        else{
            $sqli = "INSERT INTO votes(candidate_id,t_count) VALUES($tid,1)";
        }
        if($conn->query($sqli) === TRUE){
            
        }
    }
    $nic = $_SESSION['user_nic'];
    $sqli = "UPDATE voters SET status = 'voted' WHERE nic = {$nic}";
    if($conn->query($sqli) === TRUE){
        session_destroy();
        header("Location:index");       
    }
}

?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>