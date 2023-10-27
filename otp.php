<?php
session_start();
?>
<?php
include('database.php');
date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d");
$date_with_time = date("Y-m-d h:i");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sri Lanka Election</title>
</head>
<body oncontextmenu = "return false;">

<!-- header section starts  -->
<?php
    if(isset($_POST['gtotp'])){
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
                        $_SESSION['notVoted'] = 0;
                        echo "<script>window.history.back()</script>";
                    }
                }
            }
            else{
                $pending_vote = 'pending_vote';
                $sqli = "insert into voters(nic,status,date) values($nic,'$pending_vote','$date_with_time')";
                if($conn->query($sqli) === TRUE){
                    $_SESSION['sussessReg'] = 0;
                    echo "<script>window.history.back()</script>";
                }
            }
        }       
    }
    else{
        header("Location:registration");
    }
?>

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