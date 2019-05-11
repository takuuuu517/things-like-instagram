$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// var like_path = "http://localhost/storage/dQKNLx9CqLnJ9x0jSHwhmfjW0y0eeEzOMJtDe5DP.png";
// var notlike_path = "http://localhost/storage/8n8eyl5RvZWkGfWc7jaFod3JUeYgWqvlBEByR0lW.png";

var like_path = "https://image.flaticon.com/icons/svg/148/148841.svg";
var notlike_path = "https://image.flaticon.com/icons/svg/149/149222.svg";


function likeClicked(post_id, user_id, like) {


    var image = document.getElementById('like'+post_id);
    console.log(image.src);

    if(image.src == notlike_path){ // if not liked
        image.src = like_path;
        like = 1;
    } else{ // if liked
        image.src = notlike_path;
        like = 0;
    }

    $.ajax({
        type: "POST",
        url: "/liker",
        data: {
            user_id:user_id,
            post_id:post_id,
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);

        },
    });
    console.log(image.src);
}