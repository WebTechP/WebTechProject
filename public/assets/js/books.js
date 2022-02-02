
// $(document).ready(function() {

    var bookContainer = $('#books-container');
    var limit = 12, offset = 0, length;

// console.log("document.URL : " + document.URL);
// console.log("document.location.href : " + document.location.href);
// console.log("document.location.origin : " + document.location.origin);
// console.log("document.location.hostname : " + document.location.hostname);
// console.log("document.location.host : " + document.location.host);
// console.log("document.location.pathname : " + document.location.pathname);

    $(window).on("load", function (){
        var url = "http://localhost:8008/_book/get/limits?offset="+offset+"&limit=" + limit; 
          
        $.ajax({
            type: "GET",
            async: false,
            // contentType: "application/json",
            dataType:'json',
            url: url,
            beforeSend: function () {
                $('.content-loader-0').show();
            },
            complete: function () {
                $('.content-loader-0').hide();
            },
            success: function (data) {
                bookContainer.html('');
                var books = data;
                length = books.length;
                $.each(books, function(){
                    bookContainer.append(
                        `
                    <div class="col">
                        <div class="card mb-3" style="width: 18rem;">
                           <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">${this['book_title']}</h5>
                                <p class="card-text">${this['book_description']}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Number of Pages: ${this['book_pages']}</li>
                                <li class="list-group-item">Book Author: ${this['book_author']}</li>
                            </ul>
                            <div class="card-body">
                                <a href="http://localhost:8008/details/${this['book_id']}" class="card-link">Book Details</a>
                            </div>
                        </div>
                    </div>
                    `);
                });
            }   
        });
    });



// });