<?php
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	require "../includes/_head.php";

	$recipeId = htmlspecialchars($_GET["recipe-id"]);

	$mainTable = "recipes_main3";
	$query = "SELECT * FROM {$mainTable} WHERE `recipe_id` = {$recipeId}";
	$result = mysqli_query($connection, $query);

	$row = mysqli_fetch_assoc($result);
	$recipeThumb = $row['recipe-thumb'];
	$imgFolder = $row['img-folder'];

	if (!$result) {
		die ("Database query failed");
	}

?>
	<section class="main flex-container">
		
		<div>
			<h1 class="main__header"><?php 
				echo $row['recipe_title'] ?>
				
			</h1>
			<h2 class="main__subheader"><?php 
				echo $row['recipe_sub_title'] ?>
					
				</h2>
			<img class="main__img" src=<?php echo 

		"../img/images/{$imgFolder}/{$recipeThumb}.jpg"?>>
			<h3 class="main__caption"><?php 
				echo $row['recipe_description'] ?></h3>
		</div>
		
		<div class="main__ingredients ingredients flex-container">
			<img class="ingredients__img" src=<?php echo "../img/images/{$imgFolder}/{$row['ingredients-img']}.png" ?> >
			<ul class="ingredients__list ingredients-list">
				<?php
					$ingredientsTable = "recipes_ingredients3";
					$query2 = "SELECT * FROM {$ingredientsTable} WHERE `recipe-id` = {$recipeId}";
					$result2 = mysqli_query($connection, $query2);
					
					while($ingredients = mysqli_fetch_assoc($result2)){
						$ingredients_item = $ingredients['ingredients-text'];
						echo "<li class='ingredients-list__item'>" . $ingredients_item . "</li>";
		
					}
				?>
			</ul>
		</div>

		<div class="main__step step">
			<?php 
				$stepsTable = "recipe_steps";
				$query3 = "SELECT * FROM {$stepsTable} WHERE `recipe-id` = {$recipeId}";
				$result3 = mysqli_query($connection, $query3);
				$steps = mysqli_fetch_assoc($result3);

				if (!$result3) {
					die ("Database query failed");
				}

				//Repeating step because loop below starts at step 2???
				$stepNum = $steps['step-num'];
				$stepTitle = $steps['step-title'];
				$stepText = $steps['step-text'];
				$stepImg = $steps['step-img'];
				$stepImgRetina = $steps['step-img-retina'];
				$spicyLevel = $row['spicy-level'];
				$difficultyLevel = $row['difficulty-level'];
				$timeLevel = $row['time-level'];

				echo "<h2 class='step__header'>{$stepNum} {$stepTitle}</h2>";
				echo "<picture>
						  <source class='step__img main__img' media='(min-width: 750px)' srcset='../img/images/{$imgFolder}/{$stepImgRetina}.jpg'>
						  <source class='step__img main__img' media='(max-width: 650px)' srcset='../img/images/{$imgFolder}/{$stepImg}.jpg'>
						  <img class='step__img main__img' src='../img/images/{$imgFolder}/{$stepImg}.jpg'>
						</picture>";
				echo "<h3 class='step__description'>{$stepText}</h3>";
		
				while($steps = mysqli_fetch_assoc($result3)){
						$stepNum = $steps['step-num'];
						$stepTitle = $steps['step-title'];
						$stepText = $steps['step-text'];
						$stepImg = $steps['step-img'];
						$stepImgRetina = $steps['step-img-retina'];
						$spicyLevel = $row['spicy-level'];
						$difficultyLevel = $row['difficulty-level'];
						$timeLevel = $row['time-level'];

					echo "<h2 class='step__header'>{$stepNum} {$stepTitle}</h2>";
					/*echo "<img class='step__img main__img' src='../img/images/{$imgFolder}/{$stepImg}.jpg'>";*/
					echo "<picture>
							  <source class='step__img main__img' media='(min-width: 750px)' srcset='../img/images/{$imgFolder}/{$stepImgRetina}.jpg'>
							  <source class='step__img main__img' media='(max-width: 650px)' srcset='../img/images/{$imgFolder}/{$stepImg}.jpg'>
							  <img class='step__img main__img' src='../img/images/{$imgFolder}/{$stepImg}.jpg'>
							</picture>";
					echo "<h3 class='step__description'>{$stepText}</h3>";
		
					}
			?>
		</div>	
	</section>
<?php
	require "../includes/_footer.php";
?>