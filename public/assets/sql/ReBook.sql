

CREATE TABLE _USER(
    user_id VARCHAR(256) NOT NULL PRIMARY KEY,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    age INTEGER(3) NOT NULL,
    email_address VARCHAR(256) NOT NULL,
    user_pass VARCHAR(256) NOT NULL,
    user_status INTEGER(1) NOT NULL
);

CREATE TABLE _BOOK(
    book_id VARCHAR(256) NOT NULL PRIMARY KEY,
    book_title VARCHAR(256) NOT NULL,
    book_description VARCHAR(65535) NOT NULL,
    book_page INTEGER(21) NOT NULL,
    book_volume INTEGER(5) DEFAULT 0,
    book_author VARCHAR(256) NOT NULL,
    book_ISBN VARCHAR(256)
);

CREATE TABLE _FAVOURITE_BOOK(
    favourite_book_id VARCHAR(256) NOT NULL PRIMARY KEY,
    book_title VARCHAR(256) NOT NULL,
    book_description VARCHAR(256) NOT NULL,
    book_author VARCHAR(256) NOT NULL,
    book_id VARCHAR(256) NOT NULL,
    user_id VARCHAR(256) NOT NULL,
    FOREIGN KEY (book_id) REFERENCES _BOOK(book_id),
    FOREIGN KEY (user_id) REFERENCES _USER(user_id)
);

CREATE TABLE _REVIEW(
    review_id VARCHAR(256) NOT NULL PRIMARY KEY,
    user_review VARCHAR(65535) NOT NULL,
    rating int(2) NOT NULL,
    book_id VARCHAR(256) NOT NULL,
    user_id VARCHAR(256) NOT NULL,
    
    FOREIGN KEY (book_id) REFERENCES _BOOK(book_id),
    FOREIGN KEY (user_id) REFERENCES _USER(user_id)
);


CREATE TABLE _USER_IMAGE(
    user_image_id VARCHAR(256) NOT NULL,
    user_image_name VARCHAR(256) NOT NULL,
    user_image_extension VARCHAR(256) NOT NULL,
    user_image_dir VARCHAR(256) NOT NULL,
    user_id VARCHAR(256) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES _USER(user_id)
);


CREATE TABLE _BOOK_IMAGE(
    book_image_id VARCHAR(256) NOT NULL,
);



