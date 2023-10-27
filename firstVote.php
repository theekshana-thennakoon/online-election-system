<?php
session_start();
include('database.php');
date_default_timezone_set('Asia/Colombo');
if(date('Y-m-d') != "2023-09-14" and !(isset($_GET['party_id'])) and !isset($_SESSION['user_nic'])){
	header("Location:index");
}
else{
	$party_id = $_GET['party_id'];
	$_SESSION['party_id'] = $party_id;
}
?>
<?php
//include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sri Lanka Election</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link href="/projects/Election2/assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/projects/Election2/assets/css/style.css">
    <style>
	.home {margin-top:-70px}
	.header-1 img{width:30%;}
	.sinhala{
    font-family: 'FMBindumathi x';
    src: url ('FM-Bindumathi.TTF');
}
  @media (max-width: 739px) {
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
        <img src = '/projects/Election2/logo.png'></a></center>
    </div>
</header>
<section class="content text-center">
	<h2>Select Your first Vote</h2>
	<h1 class = "sinhala"> ඔබේ පළමු ඡන්දය තෝරන්න </h1>
	<h2>உங் கள்முதல்வாக்ககத்ததர்ந்ததடுக்கவும</h2>
</section>
<section class="content">
	<form action="/projects/Election2/processing" method = 'post'>
	<div class="row">
		<?php

			$sql = "SELECT * FROM candidates where pid = {$party_id}";
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$id = $row['id'];
					$namee = $row['namee'];
					$names = $row['names'];
					$namet = $row['namet'];
					//$id = ($id / $id) * 12;
					echo "
					<div class='col-sm-3 mb-3'>
					<input style = 'display:none;' type = 'radio' value = '{$id}' id = '{$id}' name = 'first_vote' class = 'first_vote' style = ''>
					<label for = '{$id}'>
					<div class='card vote vote_{$id}'>
					<div class='card-body' title = '{$names}'>
						<center>
							<h5 class='card-title fs-4 mb-3 mt-2'>{$names}</h5>
							<h5 class='card-title fs-4 mb-3 mt-2'>{$namee}</h5>
							<h5 class='card-title fs-4 mb-3 mt-2'>{$namet}</h5>
						</center>
					</div>
					</div>
					</label>
				</div>
					";
				}
			}
			
			?>
	</div>
	<center>
		<button type='submit' name = 'select_first_vote' class='btn btn-primary w-50 pt-3 pb-3 fs-4' disabled style = 'background:#9C53A0;'>Record your first vote | ඔබේ පළමු ඡන්දය සටහන් කරන්න <br> உங் கள்முதல்வாக்ககத்ததர்ந்ததடுக்கவும</button>
	</center>
	</form>
</section>
<!-- Pickup section ends -->
<br><br>
<!-- custom js file link  -->
<!--<script src="script.js"></script>-->
<script>
	let first_votes = document.querySelectorAll("input[name='first_vote']");

	let findSelected = () => {
		let selected = document.querySelector("input[name='first_vote']:checked").value;
		let voted_card = document.querySelector(".vote_"+selected);
		let submit_btn = document.querySelector(".btn");
		voted_card.style.background = '#9C53A0';
		voted_card.style.color = '#FFF';
		submit_btn.disabled = false;
	}

	first_votes.forEach(first_vote =>{
		first_vote.addEventListener("change",findSelected);
	});
</script>
    
</body>
</html>