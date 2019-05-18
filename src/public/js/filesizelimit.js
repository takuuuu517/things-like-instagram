// function fileupload() {
    var uploadField = document.getElementById("file");
    console.log(uploadField);

    uploadField.onchange = function () {
        console.log('helo');

        if (this.files[0].size > 307200) {
            alert("File is too big!");
            this.value = "";
        }
        ;
    };
// }