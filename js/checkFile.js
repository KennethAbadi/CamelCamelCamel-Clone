function checkFile() {
    let file = document.getElementById('profilePic');
    let max_size = document.getElementById('MAX_FILE_SIZE');

    if(file.files && file.files.length == 1) {
        if(file.files[0].size > max_size) {
            alert("The file must be less than " + (max_size/1024) + "KB");
            e.preventDefault();
        }
    }
}