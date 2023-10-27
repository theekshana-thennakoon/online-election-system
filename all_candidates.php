<?php
session_start();
include('database.php');
if(!isset($_SESSION['AddStatusAdmin'])){
    header("Location:login");
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
        body::-webkit-scrollbar {
            display: none;
        }
    .header-1 img{width:30%;}
    .contact{
        margin-top:5vh;align-items: center;justify-content: center;
    }
    a{text-decoration:none;color:#9C53A0;}
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
    <form action='all_candidates.php' method = 'post' style = "border:none;margin-bottom:2%;">
        <input type="text" name = 'name' class="form-control form-control-lg pt-3 pb-3 fs-4" placeholder = "Search Candidate">
        <input type='submit' name = 'search_party' value='Confirm identity' style = 'display:none;'>
    </form>
    <h2>All Candidates</h2>
    <a href="'adminprocessing?candidate_del_all=0'">
        <h2 class = "fs-4 text-end mb-2">Delete all candidates</h2>
        </a>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class = 'fs-4' style = 'color:#fff;background:#9C53A0;'>id</th>
      <th scope="col" class = 'fs-4' style = 'color:#fff;background:#9C53A0;'>Name of Candidate</th>
      <th scope="col" class = 'fs-4' style = 'color:#fff;background:#9C53A0;'>Name of Party</th>
      <th scope="col" class = 'fs-4' style = 'color:#fff;background:#9C53A0;'>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
			$sql = "SELECT * FROM parties";
            if(isset($_POST['search_party'])){
                $name = $_POST['name'];
                $sql = "SELECT * FROM candidates WHERE namee LIKE '%{$name}%' OR names LIKE '%{$name}%' OR namet LIKE '%{$name}%'";
            }
            else{
                $sql = "SELECT * FROM candidates";
            }
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$id = $row['id'];
					$namee = $row['namee'];
					$pid = $row['pid'];
                    $sqlc = "SELECT * FROM parties WHERE id = {$pid}";
                    $resultc = $conn->query($sqlc);
                    if ($resultc->num_rows > 0){
                        while($rowc = $resultc->fetch_assoc()){
                            $nameep = $rowc['namee'];
                        }
                    }
					echo "
                    <tr>
                        <th scope='row' class = 'fs-4'>{$id}</th>
                        <td class = 'fs-4'>{$namee}</td>
                        <td class = 'fs-4'>{$nameep}</td>
                        <td class = 'fs-4'><a href = '#'>Edit</a> | <a href = 'adminprocessing?candidate_del_id={$id}'>Delete</a></td>
                    </tr>
                    ";
				}
			}
		?>
  </tbody>
</table>
</section>

<!-- Pickup section ends -->
<br><br>
<!-- custom js file link  -->
<script src="script.js"></script>
<?php
if(isset($_SESSION['setparty'])){
    $txt = 'Successfully. Set the Party';
    echo "<script>
        swal({
        title: 'Successfully',
            text: '$txt',
            icon: 'success',
        });
    </script>";
}
unset($_SESSION['setparty']);
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>