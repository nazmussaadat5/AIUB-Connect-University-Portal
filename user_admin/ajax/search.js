
function searchUser() {
    var searchInput = document.getElementById("searchInput").value;
    var searchResult = document.getElementById("searchResult");
    searchResult.innerHTML = ""; 
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            searchResult.innerHTML = this.responseText; 
        }
    };
    xhr.open("GET", "../controller/homecontrol.php?search_query=" + searchInput, true);
    xhr.send();
}
