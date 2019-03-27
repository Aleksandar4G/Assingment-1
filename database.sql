CREATE DATABASE income;

use income;

CREATE TABLE working (
	id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	totalincome INT(20) NOT NULL, 
	bills int(10) NOT NULL,
	petrol int(10) NOT NULL,
	groceries int(10) NOT NULL,
    dailyspendings int(10) NOT NULL,
	date TIMESTAMP
);
