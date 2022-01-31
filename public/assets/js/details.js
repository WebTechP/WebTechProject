

var bookDetails = $('#book_details');
var url_ = document.location.pathname;
var urlSplit = url_.split('/');
// $("#demo").html(urlSplit[3]);
var id = urlSplit[3]; // this is the id of the book you take out of the url path
var url = "http://localhost:8008/details/" + id;

$(window).on("load", function (){ 
    // location
  
    $.ajax({ 
        url: url,
        // data: ,
        dataType: 'json',
        async: false,
        success: function (data) {
            $.each(data, function(){
                bookDetails.append(
                    `
                <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Book title: ${this['book_title']}</h5>

                    <h6 class="card-subtitle mb-2 text-muted">Author : ${this['book_author']}</h6>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Total Pages : ${this['book_page']}</li>
                        <li class="list-group-item mb-2">ISBN : ${this['book_ISBN']}</li>
                    </ul>
                    <button class="btn btn-primary"><i class="fa fa-star"></i></button>
                    <button class="btn btn-primary" onclick="addReview()">Add Reviews</button>
                    <p class="card-text mt-4"> ${this['book_description']}</p>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Reviews</h6>

                    <span style="font-size: 2em; color: yellow; href="/_favourite_book/put/${this['book_id']}"><i class="fa fa-star"></i></span>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
                `
        );
      });
    },
  });
});
