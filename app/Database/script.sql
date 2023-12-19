-- Active: 1703000121270@@127.0.0.1@3306@library
CREATE DATABASE library;
CREATE Table User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255),
    phone VARCHAR(50)
);
CREATE Table Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);
CREATE Table User_Role (
    user_id INT,
    Foreign Key (user_id) REFERENCES user(id),
    role_id INT,
    Foreign Key (role_id) REFERENCES role(id)
);
CREATE Table Book (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    author VARCHAR(50),
    genre VARCHAR(50),
    description VARCHAR(255),
    publication_year DATE,
    total_copies INT,
    available_copies INT
);
CREATE Table Resevation (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    Foreign Key (user_id) REFERENCES user(id),
    book_id INT,
    Foreign Key (book_id) REFERENCES book(id),
    description VARCHAR(255),
    reservation_date DATE,
    return_date DATE,
    is_returned INT
);