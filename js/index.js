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

/*var selectedSpicyLevels = [1, 2, 3];
var visibleCards = document.getElementsByClassName('recipe-card');
var spicySelections = document.getElementsByClassName('filter-inputs__input--spicy');

function getCheckedSpicy(el){
	let clickedNumTemp = el.nextSibling.innerHTML;
	let clickedNum = parseInt(clickedNumTemp);
	let index = selectedSpicyLevels.indexOf(clickedNum);

	if (index > -1) {
		selectedSpicyLevels.splice(index, 1);
		console.log(`Removed ${clickedNum} from list`);
		console.log(`list is now ${selectedSpicyLevels}`);
	} else{
		selectedSpicyLevels.push(clickedNum);
		console.log(`list is now ${selectedSpicyLevels}`);
	}
	
	return hideCards(selectedSpicyLevels, clickedNum);
}

function hideCards(num){
		//console.log(selectedSpicyLevels)
		for (i = 0; i < visibleCards.length; i++){
			let cardSpicyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[1].innerHTML;
			let cardSpicyLevel = parseInt(cardSpicyLevelTemp);
	
			if (selectedSpicyLevels.indexOf(cardSpicyLevel) == -1) {
				console.log('hiding cards without spicy level of: ' + num + '. Its actual spicyLevel is ' + cardSpicyLevel);
				visibleCards[i].style.display = 'none';
			} else {
				visibleCards[i].style.display = 'block';
			}
		}
	}

for (i = 0; i < spicySelections.length; i++){
	spicySelections[i].addEventListener("click", function(){getCheckedSpicy(this)});
}*/



var selectedSpicyLevels = [1, 2, 3];
var selectedDifficultyLevels = [1, 2, 3];
var selectedTimeLevels = [1, 2, 3];

var spicySelections = document.getElementsByClassName('filter-inputs__input--spicy');
var timeSelections = document.getElementsByClassName('filter-inputs__input--time');
var difficultySelections = document.getElementsByClassName('filter-inputs__input--difficulty');

var visibleCards = document.getElementsByClassName('recipe-card');


function checkMaster(checkboxes, selected, attribute){
	function getChecked(el){
		let clickedNumTemp = el.nextSibling.innerHTML;
		let clickedNum = parseInt(clickedNumTemp);
		let index = selected.indexOf(clickedNum);

		if (index > -1) {
			selected.splice(index, 1);
			//console.log(`Removed ${clickedNum} from list`);
			//console.log(`list is now ${selected}`);
		} else{
			selected.push(clickedNum);
			//console.log(`list is now ${selected}`);
		}
		console.log(`${attribute} levels that are visible: ${selected}`);
		return hideCards(selected);
	}

	function hideCards(num){
		

		//console.log(`these are the levels that should be visible: ${selected}`);
		for (i = 0; i < visibleCards.length; i++){
			let cardTimeLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[0].innerHTML;
			let cardTimeLevel = parseInt(cardTimeLevelTemp);
			let cardSpicyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[1].innerHTML;
			let cardSpicyLevel = parseInt(cardSpicyLevelTemp);
			let cardDifficultyLevelTemp = visibleCards[i].firstChild.nextSibling.children[2].children[2].innerHTML;
			let cardDifficultyLevel = parseInt(cardDifficultyLevelTemp);
			var cardLevel = 0;
			
			if (attribute == "Time"){
				cardLevel = cardTimeLevel;
			} else if (attribute == "Spicy"){
				cardLevel = cardSpicyLevel;
			} else if (attribute == "Difficulty"){
				cardLevel = cardDifficultyLevel;
			}
	
			if (selected.indexOf(cardLevel) == -1) {
				visibleCards[i].style.display = 'none';
				console.log(`Hiding ${visibleCards[i]} with ${attribute} level ${cardLevel}`);
			} else if ((selectedSpicyLevels.indexOf(cardSpicyLevel) != -1) && (selectedTimeLevels.indexOf(cardTimeLevel) != -1) && (selectedDifficultyLevels.indexOf(cardDifficultyLevel) != -1)){
				console.log(`Making visible ${visibleCards[i]} with ${attribute} level ${cardLevel}`);
				visibleCards[i].style.display = 'block';
			}
		}
	}


	
	for (i = 0; i < checkboxes.length; i++){
		checkboxes[i].addEventListener("click", function(){getChecked(this)});
	}
}

checkMaster(timeSelections, selectedTimeLevels, "Time");
checkMaster(spicySelections, selectedSpicyLevels, "Spicy");
checkMaster(difficultySelections, selectedDifficultyLevels, "Difficulty");




//for (i = 0; i < visibleCards.length; i++){
			
//		