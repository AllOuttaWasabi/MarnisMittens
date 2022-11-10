<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT recipename, recipedesc, recipedate, userid FROM recipe';
	$result = mysqli_query($dbc, $query);
	//Fetch all rows of result as an associative array
	if($result)
		mysqli_fetch_all($result, MYSQLI_ASSOC); //get the result as an associative, 2-dimensional array
	else {
		echo "<h2>We are unable to process this request right now.</h2>";
		echo "<h3>Please try again later.</h3>";
		exit;
	}
	mysqli_close($dbc);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, user-scalable=no, initial-scale=1.0,
maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"><link rel="stylesheet" href="./style.css"/>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Marnis Mittens</title>
</head>
<body>


    <div class="topnav">
        <a class="active" href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="blog.html">Blog</a>
        <a href="login.html">Login / Sign up</a>

        <div class = "topnav-right">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>

        </div>
    </div>
    <div class="divider">
    </div>

    <style>
        .logo-container{
            background-image: url("./img/egg.jpg");
            object-fit: cover;
            width: 70%;
            margin: auto;
        }
    </style>

    <div class="logo-container">
        <img src="./img/DifferentLogo.png" alt="logo">
    </div>

    <div class="midnav">
        <a href="recipes.html">Recipes</a>
        <a href="ingredients.html">Ingredients</a>
        <a href="style.html">Style</a>
        <a href="tips.html">Cooking Tips</a>
    </div>



    <div class = "body">
        <h1>
            Recent Recipes
        </h1>
        <div class="divider-short">
        </div>

            	<table>
		<tr>
			<th>Recipe Name</th>
			<th>Desc</th>
			<th>Date Uploaded</th>
			<th>User ID</th>
		</tr>

	</table>

        		<?php foreach ($result as $client) {
			echo "<tr>";
			echo "<td>".$client['recipename']."</td>"."<td></td>";
			echo "<td>".$client['recipedesc']."</td>";
			echo "<td>".$client['recipedate']."</td>";
			echo "<td>".$client['userid']."</td>";
			echo "</tr>";
		}
		?>
    </div>

</body>
</html>


