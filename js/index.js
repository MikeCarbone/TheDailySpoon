//Controls search bar
var isSearchOpen = false;
const SEARCH_INPUT = document.getElementById('search__input-js');
const SEARCH_NAV = document.getElementById('search-js');
document.getElementById('search-button-js').addEventListener("click", function(){
	if (isSearchOpen == false){
		SEARCH_NAV.style.display = "flex";
		SEARCH_NAV.classList.remove("inactive-search");
		SEARCH_NAV.classList.add("active-search");
		SEARCH_INPUT.focus();
		isSearchOpen = true;
	}
	else{
		SEARCH_NAV.classList.remove("active-search");
		SEARCH_NAV.classList.add("inactive-search");
		setTimeout(function(){
			SEARCH_NAV.style.display = "none";
		}, 200)
		SEARCH_NAV.autofocus = false;
		isSearchOpen = false;
	}
})

var selectedSpicyLevels = [1, 2, 3];
var selectedDifficultyLevels = [1, 2, 3];
var selectedTimeLevels = [1, 2, 3];

var spicySelections = document.getElementsByClassName('filter-inputs__input--spicy');
var timeSelections = document.getElementsByClassName('filter-inputs__input--time');
var difficultySelections = document.getElementsByClassName('filter-inputs__input--difficulty');

var visibleCards = document.getElementsByClassName('recipe-card');

//Controls the tag filter system
function checkMaster(checkboxes, selected, attribute){

	//Loops through the checkboxes and adds click events
	for (i = 0; i < checkboxes.length; i++){
		checkboxes[i].addEventListener("click", function(){getChecked(this)});
	}

	//Will see what was clicked, and edit the corresponding array to add/remove the number
	function getChecked(el){
		let clickedNumTemp = el.children[0].innerHTML;
		let clickedNum = parseInt(clickedNumTemp);
		let index = selected.indexOf(clickedNum);
		//console.log(clickedNumTemp);

		if (index > -1) {
			selected.splice(index, 1);
			el.style.transform = "scale(.75)";
		} else{
			selected.push(clickedNum);
			el.style.transform = "";
		}
		//console.log(`${attribute} levels that are visible: ${selected}`);
		return hideCards(selected);
	}

	//This will hide or show the cards with the clicked tag
	function hideCards(num){
		for (i = 0; i < visibleCards.length; i++){
			let cardTimeLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[0].children[1].innerHTML;
			let cardTimeLevel = parseInt(cardTimeLevelTemp);
			let cardSpicyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[1].children[1].innerHTML;
			let cardSpicyLevel = parseInt(cardSpicyLevelTemp);
			let cardDifficultyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[2].children[1].innerHTML;
			let cardDifficultyLevel = parseInt(cardDifficultyLevelTemp);
			var cardLevel = 0;

			//iconColors(cardTimeLevel, cardSpicyLevel, cardDifficultyLevel);
			
			if (attribute == "Time"){
				cardLevel = cardTimeLevel;
			} else if (attribute == "Spicy"){
				cardLevel = cardSpicyLevel;
			} else if (attribute == "Difficulty"){
				cardLevel = cardDifficultyLevel;
			}
	
			if (selected.indexOf(cardLevel) == -1) {
				visibleCards[i].style.display = 'none';
				//console.log(`Hiding ${visibleCards[i]} with ${attribute} level ${cardLevel}`);
			} else if ((selectedSpicyLevels.indexOf(cardSpicyLevel) != -1) && (selectedTimeLevels.indexOf(cardTimeLevel) != -1) && (selectedDifficultyLevels.indexOf(cardDifficultyLevel) != -1)){
				//console.log(`Making visible ${visibleCards[i]} with ${attribute} level ${cardLevel}`);
				visibleCards[i].style.display = 'block';
			}
		}
	}
}

checkMaster(timeSelections, selectedTimeLevels, "Time");
checkMaster(spicySelections, selectedSpicyLevels, "Spicy");
checkMaster(difficultySelections, selectedDifficultyLevels, "Difficulty");


//Controls what color each icon will be
function iconColors(){

	for (i = 0; i < visibleCards.length; i++){
		let cardTimeLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[0].children[1].innerHTML;
		let cardTimeLevel = parseInt(cardTimeLevelTemp);
		let cardSpicyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[1].children[1].innerHTML;
		let cardSpicyLevel = parseInt(cardSpicyLevelTemp);
		let cardDifficultyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[2].children[1].innerHTML;
		let cardDifficultyLevel = parseInt(cardDifficultyLevelTemp);
		
		let timeIcon = visibleCards[i].firstChild.nextSibling.children[2].children[0].children[0];
		let spicyIcon = visibleCards[i].firstChild.nextSibling.children[2].children[1].children[0];
		let difficultyIcon = visibleCards[i].firstChild.nextSibling.children[2].children[2].children[0];

		function colorSwitch(level, icon){
			switch(level){
				case 1:
					icon.style.fill = "#008000";
					break;
				case 2:
					icon.style.fill = "#FFB700";
					break;
				case 3:
					icon.style.fill = "#AB0D0D";
					break;
			}
		}

		colorSwitch(cardTimeLevel, timeIcon);
		colorSwitch(cardSpicyLevel, spicyIcon);
		colorSwitch(cardDifficultyLevel, difficultyIcon);
	}
}

iconColors();