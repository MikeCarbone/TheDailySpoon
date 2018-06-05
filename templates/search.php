<?php
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	require "../includes/_head.php";

	$resultsCount = 0;
	$searchTerm = ucwords(htmlspecialchars($_GET["search"]));

?>
	<section class="search-zone flex-container">
		<h1 class="search-zone__header"><?php echo "Search Results for: {$searchTerm}" ?></h1>
		<h3 class="search-term"></h3>
		<form action="">
			<section class="filter-zone flex-container">
				<div class="filter-zone__inputs filter-inputs">
					<h1 class="filter-inputs__header">Time-level</h1>
					<input class="filter-inputs__input--time" type="checkbox" checked="checked" name="time"><span>1</span></input>
					<input class="filter-inputs__input--time" type="checkbox" checked="checked" name="time"><span>2</span></input>
					<input class="filter-inputs__input--time" type="checkbox" checked="checked" name="time"><span>3</span></input>
				</div>
				<div class="filter-zone__inputs filter-inputs">
					<h1 class="filter-inputs__header">Spicy-level</h1>
					<input class="filter-inputs__input--spicy" type="checkbox" checked="checked" name="spicy"><span>1</span></input>
					<input class="filter-inputs__input--spicy" type="checkbox" checked="checked" name="spicy"><span>2</span></input>
					<input class="filter-inputs__input--spicy" type="checkbox" checked="checked" name="spicy"><span>3</span></input>
				</div>
				<div class="filter-zone__inputs filter-inputs">
					<h1 class="filter-inputs__header">Difficulty-level</h1>
					<input class="filter-inputs__input--difficulty" type="checkbox" checked="checked" name="difficulty"><span>1</span></input>
					<input class="filter-inputs__input--difficulty" type="checkbox" checked="checked" name="difficulty"><span>2</span></input>
					<input class="filter-inputs__input--difficulty" type="checkbox" checked="checked" name="difficulty"><span>3</span></input>
				</div>

			
			</section>
		</form>
		<ul class="recipe-zone flex-container">
			<?php
				$mainTable = "recipes_main3";
				$displayedRecipes = [];

				$searchArray = explode(" ", $searchTerm);

				for ($i = 0; $i < count($searchArray); $i++){
					
					$query7 = "SELECT * FROM {$mainTable} WHERE `recipe_title` LIKE '%{$searchArray[$i]}%' OR `recipe_sub_title` LIKE '%{$searchArray[$i]}%'";
					
					$result = mysqli_query($connection, $query7);
					
					if (!$result) {
						echo "No results! Try searching again.";
					}

					$count = mysqli_num_rows($result);

					if($count == 0){
						$output = "No results for {$searchTerm}.";
						echo "<h1 class='search-zone__header'>{$output}</h1>";
					} else {
						while ($row = mysqli_fetch_assoc($result)) {
							$recipeId = $row['recipe_id'];

							if(!in_array($recipeId, $displayedRecipes)){

								array_push($displayedRecipes, $recipeId);

								$recipeTitle = $row['recipe_title'];
								$recipeSubTitle = $row['recipe_sub_title'];
								$recipeThumb = $row['recipe-thumb'];
								$imgFolder = $row['img-folder'];
								$spicyLevel = $row['spicy-level'];
								$difficultyLevel = $row['difficulty-level'];
								$timeLevel = $row['time-level'];
								include '../includes/_component.recipe-card.php';
							}
						}
					}
				}
			?>
		</ul>
	</section>
	

<?php 
	include '../includes/_footer.php'
?>