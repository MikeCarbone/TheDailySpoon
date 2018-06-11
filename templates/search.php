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
		<section class="filter-zone flex-container">
			<div class="filter-zone__inputs filter-inputs">
				<h1 class="filter-inputs__header">Time-level</h1>
				<div class="icon icon-time input-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
				</div>
				<div class="filter-container">
					<div class="filter-inputs__input filter-inputs__input--time filter-inputs__input--green"><span>1</span></div>
					<div class="filter-inputs__input filter-inputs__input--time filter-inputs__input--orange"><span>2</span></div>
					<div class="filter-inputs__input filter-inputs__input--time filter-inputs__input--red"><span>3</span></div>
				</div>
			</div>
			<div class="filter-zone__inputs filter-inputs">
				<h1 class="filter-inputs__header">Spicy-level</h1>
				<div class="icon icon-time input-icon">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						<path d="M165.494,533.333c-35.545-73.962-16.616-116.343,10.703-156.272c29.917-43.728,37.627-87.013,37.627-87.013 s23.518,30.573,14.11,78.39c41.548-46.25,49.389-119.938,43.115-148.159c93.914,65.63,134.051,207.737,79.96,313.054 c287.695-162.776,71.562-406.339,33.934-433.775c12.543,27.435,14.922,73.88-10.416,96.42C331.635,33.333,225.583,0,225.583,0 c12.543,83.877-45.466,175.596-101.404,244.13c-1.965-33.446-4.053-56.525-21.641-88.531 C98.59,216.357,52.157,265.884,39.583,326.76C22.551,409.2,52.341,469.562,165.494,533.333z"/>
					</svg>
				</div>
				<div class="filter-container">
					<div class="filter-inputs__input filter-inputs__input--spicy filter-inputs__input--green"><span>1</span></div>
					<div class="filter-inputs__input filter-inputs__input--spicy filter-inputs__input--orange"><span>2</span></div>
					<div class="filter-inputs__input filter-inputs__input--spicy filter-inputs__input--red"><span>3</span></div>
				</div>
			</div>
			<div class="filter-zone__inputs filter-inputs">
				<h1 class="filter-inputs__header">Difficulty-level</h1>
				<div class="icon icon-time input-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"/></svg>
				</div>
				<div class="filter-container">
					<div class="filter-inputs__input filter-inputs__input--difficulty filter-inputs__input--green"><span>1</span></div>
					<div class="filter-inputs__input filter-inputs__input--difficulty filter-inputs__input--orange"><span>2</span></div>
					<div class="filter-inputs__input filter-inputs__input--difficulty filter-inputs__input--red"><span>3</span></div>
				</div>
			</div>

		
		</section>
		<ul class="recipe-zone flex-container">
			<?php
				$mainTable = "recipes_main3";
				$displayedRecipes = [];

				$searchArray = explode(" ", $searchTerm);

				for ($i = 0; $i < count($searchArray); $i++){
					
					$lowerSearch = strtolower($searchArray[$i]);
					$query7 = "SELECT * FROM {$mainTable} WHERE `recipe_title` LIKE '%{$searchArray[$i]}%' OR `recipe_sub_title` LIKE '%{$searchArray[$i]}%' OR `recipe_description` LIKE '%{$lowerSearch}%'";
					
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