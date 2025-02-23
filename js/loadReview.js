async function loadReview(str) {
    let review = document.getElementsByClassName('newest');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            review.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", '../load_review.php?id='+str, true);
    xmlhttp.send();
}
