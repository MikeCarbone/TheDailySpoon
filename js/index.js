var isSearchOpen = false;
const SEARCH_NAV = document.getElementById('search-js');
document.getElementById('search-button-js').addEventListener("click", function(){
	if (isSearchOpen == false){
		SEARCH_NAV.style.display = "flex";
		SEARCH_NAV.classList.remove("inactive-search");
		SEARCH_NAV.classList.add("active-search");
		isSearchOpen = true;
	}
	else{
		SEARCH_NAV.classList.remove("active-search");
		SEARCH_NAV.classList.add("inactive-search");
		setTimeout(function(){
			SEARCH_NAV.style.display = "none";
		}, 200)
		isSearchOpen = false;
	}
})