<?php
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	include 'includes/_head.php';


	$mainTable = "recipes_main3";
	$query = "SELECT * FROM {$mainTable}";
	$result = mysqli_query($connection, $query);

	if (!$result) {
		die ("Database query failed");
	}

?>
	<section class="landing flex-container">
		<div class="title-container flex-container">
			<h1 class="landing__header">THE</h1>
			<h1 class="landing__header landing__header--bold">DAILY</h1>
			<h1 class="landing__header">SPOON</h1>
		</div>
		<h3 class="landing__description">The inside scoop on all your cooking needs</h3>
		<div class="landing__buttons buttons-container">
			<!--<button class="buttons-container__button button">Get cookin</button>-->
			<!--<button class="buttons-container__button button">Log in</button>-->
		</div>
		<!--<img class="landing__bg" src="../img/food.jpg">-->
	</section>
	<section class="about flex-container">
		<img class="about__img" src="img/chef-min.png">
		<h2 class="about__text">The Daily Spoon is the place to go for all your cooking recipes. Buttered bread, Chateubriand Steak, and the smell of your grandma's kitchen all in one place.</h2>
	</section>
	<section class="recipes">
		<h1 class="recipes__header">Featured Recipes</h1>
		<ul class="recipes__recipe-zone recipe-zone flex-container">
			
			<?php 
				//Generating six unique recipe cards
				$mainTable = "recipes_main3";
				$generatedNums = []; 

				for ($i = 0; $i <= 5; $i++){
					$randNum = rand( 1 , 40 );
					$isInstantiated = false;

					while ($isInstantiated == false) {
						
						if (!in_array($randNum, $generatedNums)){
							$isInstantiated = true;
							array_push($generatedNums, $randNum);
						
							$query = "SELECT * FROM {$mainTable} WHERE `recipe_id` = {$randNum}";
							$result = mysqli_query($connection, $query);

							if (!$result) {
								die ("Database query failed");
							}

							$row = mysqli_fetch_assoc($result);
							$recipeId = $row['recipe_id'];
							$recipeTitle = $row['recipe_title'];
							$recipeSubTitle = $row['recipe_sub_title'];
							$recipeThumb = $row['recipe-thumb'];
							$imgFolder = $row['img-folder'];
							$spicyLevel = $row['spicy-level'];
							$difficultyLevel = $row['difficulty-level'];
							$timeLevel = $row['time-level'];
							include 'includes/_component.recipe-card.php';
							
						} else{
							$randNum = rand(1, 40);
						}
					}
				}
			?>
		</ul>
	</section>
<?php 
	include 'includes/_footer.php'
?>
	