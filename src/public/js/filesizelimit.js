var uploadField = document.getElementById("file");
var path = uploadField.value;

var extensions = /(\.jpg|\.png|\.gif)$/i;


uploadField.onchange = function () {
    if (this.files[0].size > 60000000) {
        alert("ファイルのサイズの上限は60MBです。");
        this.value = "";
    };

    if(!extensions.exec(path)){
        alert('jpg png gif が有効です。');
        this.value = '';
    };
};

