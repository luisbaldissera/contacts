CREATE USER 'site'@'%' IDENTIFIED BY 'site';
CREATE USER 'site'@'localhost' IDENTIFIED BY 'site';
CREATE DATABASE 'site';
GRANT ALL PRIVILEGES ON site.* TO 'site'@'%';
GRANT ALL PRIVILEGES ON site.* TO 'site'@'localhost';
USE site;

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
-- Some test entries in the table
INSERT INTO contacts (firstname, lastname, email, phone, birth, active) VALUES (
    'Will',
    'Smith',
    'willyieyoyo@belair.edu',
    '+17 98123-4567',
    DATE '1968-09-25',
    1
);

INSERT INTO contacts (firstname, lastname, email, phone, birth, active) VALUES (
    'Philip',
    'Banks',
    'banks@loyer.com',
    '+11 1234-4567',
    DATE '1942-09-11',
    1
);

INSERT INTO contacts (firstname, lastname, email, phone, birth, active) VALUES (
    'Vivian',
    'Banks',
    'vivian@princeton.edu',
    '+15 4445-5544',
    DATE '1952-05-02',
    1
);

INSERT INTO contacts (firstname, lastname, email, phone, birth, active) VALUES (
    'Carlton',
    'Banks',
    'carlton@belair.edu',
    '+12 3421-1234',
    DATE '1972-04-01',
    1
);

INSERT INTO contacts (firstname, lastname, email, birth, active) VALUES (
    'Hilary',
    'Banks',
    'hilary@hills.mall',
    DATE '1965-10-10',
    1
);

INSERT INTO contacts (firstname, lastname, email, birth, active) VALUES (
    'Ashley',
    'Banks',
    'littlebarbie@doll.com',
    DATE '1981-09-22',
    1
);

INSERT INTO contacts (firstname, lastname, email, birth, active) VALUES (
    'Geoffrey',
    'Butler',
    'butler@england.en',
    DATE '1952-04-12',
    1
);