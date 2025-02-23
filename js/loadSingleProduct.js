function loadProduct(str) {
    let main = document.getElementById('productInfo');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            main.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", '../fetch_single_product.php?id='+str, true);
    xmlhttp.send();
}