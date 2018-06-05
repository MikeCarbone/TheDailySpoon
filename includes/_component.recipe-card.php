<li class="recipe-zone__recipe-card recipe-card">
	<a href= <?php echo "/scripting%20II/alpha/templates/recipe.php?recipe-id={$recipeId}" ?>>
		<img class="recipe-card__img" src=<?php echo 

		"/scripting%20II/alpha/img/images/{$imgFolder}/{$recipeThumb}.jpg"?>

		>
		<h4 class="recipe-card__title"><?php echo $recipeTitle . " " . $recipeSubTitle ?></h4>
		<div class="recipe-card__tag-container tag-container">
			<?php
				echo "<span class='tag-container__time-level'>{$timeLevel}</span>";
				echo "<span class='tag-container__spicy-level'>{$spicyLevel}</span>";
				echo "<span class='tag-container__difficulty-level'>{$difficultyLevel}</span>";
			?>
		</div>
		<!--<h5 class="recipe-card__tag">italian</h5>-->
	</a>
</li>