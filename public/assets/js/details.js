

var bookDetails = $('#book_details');
var url_ = document.location.pathname;
var urlSplit = url_.split('/');
// $("#demo").html(urlSplit[3]);
var id = urlSplit[2]; // this is the id of the book you take out of the url path
var url = "http://localhost:8008/details/screen/" + id;

$(window).on("load", function (){ 
    // location
  
    $.ajax({ 
        url: url,
        // data: ,
        dataType: 'json',
        async: false,
        success: function (data) {
        if(data['status'] == "success"){ 
            book = data['bookDetails'];
            userReviews = data['userReviews'];
       
            $.each(book, function () {
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Review</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Title:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                                </div>
                            </div>
                            </div>
                            <p class="card-text mt-4"> ${this['book_description']}</p>
                        </div>
                        <div class="container">
                            <h6 class="card-subtitle mb-2">Reviews</h6>
                            <ul class="col" id='${this['book_id']}'>
                               
                            </ul>
                        </div>
                    </div>
                        `
                );

            });
         var userData;
    var reviewData;
    $.each(userReviews, function () {
        userData = this['userData'];
        reviewData = this['reviewData'];
        $("#"+id).append(
            `
        <div class="card w-100" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">${userData[0]['first_name'] + " " + userData[0]['last_name']} </h5>
                <p class="card-text">${reviewData['user_review']}</p>
             
            </div>
        </div>

        `);
    });

        }else{ 

        }
    
    },
  });
});


function reviews(userReviews, id){
    
}