var like = 0;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function likeClicked() {
    var image = document.getElementById('like');

    if(like == 0){ // if not liked
        image.src = "http://localhost/storage/dQKNLx9CqLnJ9x0jSHwhmfjW0y0eeEzOMJtDe5DP.png"
        like = 1;
    } else{ // if liked
        image.src = "http://localhost/storage/8n8eyl5RvZWkGfWc7jaFod3JUeYgWqvlBEByR0lW.png"
        like = 0;
    }

    $.ajax({
        type: "POST",
        url: "/liker",
        data: {
            name:"hello"
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);

        },
    });

    console.log(like);
}

// not like
// http://localhost/storage/8n8eyl5RvZWkGfWc7jaFod3JUeYgWqvlBEByR0lW.png


// like
// http://localhost/storage/dQKNLx9CqLnJ9x0jSHwhmfjW0y0eeEzOMJtDe5DP.png