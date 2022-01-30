
$(document).ready(function() {

    var bookContainer = $('books-container');
    var limit = 12;
    var offset = 0;
    
    $.on("load", function (){
        var url = "http://localhost:8008/_book/get/limits?offset="+offset+"&limit=" + limit; 
        $.ajax({
            type: "GET",
            contentType: "application/json",
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
                var books = json.parse(data);
                $.each(books, function(element){
                    bookContainer.append(`
                    <div class="col">
                        <div class="card mb-3" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">${this['book_title']}</h5>
                                <p class="card-text">${this['book_description']}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    `);
                });
            }   
        });
    });
});