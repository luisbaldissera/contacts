CREATE USER app IDENTIFIED WITH mysql_native_password BY 'app';
CREATE DATABASE app;
GRANT ALL PRIVILEGES ON app.* TO app;
USE app;

CREATE TABLE contacts (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30),
    email VARCHAR(50),
    phone VARCHAR(50),
    birth DATE,
    active BOOLEAN NOT NULL,
    date TIMESTAMP
);