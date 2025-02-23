window.onload = function() {
    loadProducts('all');
}
function loadProducts(str) {
    let main = document.getElementById('main');
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            main.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", '../fetch_products.php?category='+str, true);
    xmlhttp.send();
}

function track(id) {
    console.log("Tracking");
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../log_click.php?id="+id, true);
    xmlhttp.send();
    console.log("Sent");
}