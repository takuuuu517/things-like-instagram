var uploadField = document.getElementById("file");

uploadField.onchange = function () {
    if (this.files[0].size > 60000000) {
        alert("ファイルのサイズの上限は60MBです。");
        this.value = "";
    };
};

