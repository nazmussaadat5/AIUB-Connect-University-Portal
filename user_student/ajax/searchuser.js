function searchUser()
{
    var searchInput = document.getElementById("searchuser").value;

    var searchresult=document.getElementById('search-results');
    searchresult.innerHTML = "";
    
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            searchresult.innerHTML=this.responseText;

        }

    }
    xhttp.open("POST","../controller/homecheck.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("searchuser="+searchInput);
    
}