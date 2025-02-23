function collapse(id) {
    row = document.getElementById("row"+id);
    button = document.getElementById(id);
    if(row.style.display != "none") {
        row.style.display = "none";
        button.innerHTML = "Row "+(id+1)+": Un-Collapse";
    }
    else {
        button.innerHTML = "Row "+(id+1)+": Collapse";
        row.style.display = "block";
    }
}