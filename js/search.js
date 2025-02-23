function search(str) {
    let main = document.getElementById('main');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            main.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", '../search_products.php?searchTerm='+str, true);
    xmlhttp.send();
}