<!DOCTYPE html>
<?php
session_start();
include('database.php');
if(!isset($_SESSION['AddStatusAdmin'])){
    header("Location:login");
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
	<title>Sri Lanka Election</title>
	<style>
		*{margin:0;padding:0;}
		.leftbar{float:left;width:18%;height:100vh;background:#eee;text-align:center;
		}
		.rightbar{float:right;width:82%;height:100vh;background:#fff;text-align:center;
		}
		.leftbar input , .leftbar button{width:90%;height:8vh;margin:4% 0;background:#9C53A0;border:1px solid #9C53A0;}
		.leftbar form img{width:90%;margin:3% 0;cursor:pointer;color:#fe2121;
		}
		.contact-2{display:none;}
		@media (max-width: 750px) {
		.header-1 img{width:90%;}
		.leftbar , .rightbar{display:none;}
		.ntfoundgif{width:50%;}
		.contact-2{
            display: block;
        }
    } 
	</style>
</head>
<body>
	<div class="leftbar">
		<form action="#" method = 'post'>
			<button type="submit" name = 'dashboard' style = "background:transparent;border:none;margin-bottom:50%;"><img src = 'badge.png'></button>
			<br><br><br>
			<button type="submit" class = "btn btn-primary fs-4" name = 'add_new_party'> Add New Party</button>
			<button type="submit" class = "btn btn-primary fs-4" name = 'add_candidate'> Add Candidate</button>
			<button type="submit" class = "btn btn-primary fs-4" name = 'election_date'>Set Election Date</button>
			<button type="submit" class = "btn btn-primary fs-4" name = 'all_parties'>All Parties</button>
			<button type="submit" class = "btn btn-primary fs-4" name = 'all_candidates'>All Candidates</button>
		</form>
	</div>
	<div class="rightbar">
	<?php            
        if (isset($_POST['add_new_party'])){
            echo "<iframe src='add_new_party' style = 'border:none;width:100%;height:99vh'></iframe>";
        }
        else if (isset($_POST['election_date'])){
            echo "<iframe src='election_date.php' style = 'border:none;width:100%;height:99vh'></iframe>";
        }
		else if (isset($_POST['add_candidate'])){
            echo "<iframe src='add_candidate.php' style = 'border:none;width:100%;height:99vh'></iframe>";
        }
		else if (isset($_POST['all_parties'])){
            echo "<iframe src='all_parties.php' style = 'border:none;width:100%;height:99vh'></iframe>";
        }
		else if (isset($_POST['all_candidates'])){
            echo "<iframe src='all_candidates.php' style = 'border:none;width:100%;height:99vh'></iframe>";
        }
		else if (isset($_POST['dashboard'])){
            echo "<iframe src='dashboard.php' style = 'border:none;width:100%;height:89.43vh'></iframe>";
        }
        else{
            echo "<iframe src='dashboard.php' style = 'border:none;width:100%;height:99vh'></iframe>";
        }
    ?>
	</div>

	<section class="contact-2"  style = "width:100%;">
		<div class="header-1">
		<center><a href="#" class="logo" style = 'color:#fe2121;'>
		<img src = 'logo.png'></a>

		</div>
		<form>
		<center><img src = 'images/nofoundpageimg.png' class = 'ntfoundgif'><br>
			<input type = 'submit' value="You can't View this page in mobile view" class='btn btn-primary btn-lg mt-5 pt-4 pb-4 fs-1' style = 'width:100%;background:#5F3920;'>
		</form>	
	</section>

	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
</body>
</html>