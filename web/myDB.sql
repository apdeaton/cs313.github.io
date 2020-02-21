CREATE TABLE price (
id SERIAL NOT NULL PRIMARY KEY,
cost real NOT NULL);

CREATE TABLE room (
id SERIAL NOT NULL PRIMARY KEY,
room_type varchar(256) NOT NULL,
room_price INT NOT NULL REFERENCES price(id));

CREATE TABLE cruise (
id SERIAL NOT NULL PRIMARY KEY,
cruise_type varchar(256) NOT NULL,
cruise_price INT NOT NULL REFERENCES price(id));

CREATE TABLE trip (
id SERIAL PRIMARY KEY,
cruise_id INT NOT NULL REFERENCES cruise(id),
room_id INT NOT NULL REFERENCES room(id),
total_cost real);

INSERT INTO price VALUES (1, 10.00);
INSERT INTO price VALUES (2, 50.00);
INSERT INTO price VALUES (3, 100.00);
INSERT INTO price VALUES (4, 500.00);
INSERT INTO price VALUES (5, 1000.00);
INSERT INTO price VALUES (6, 1000.00);
INSERT INTO price VALUES (7, 2000.00);
INSERT INTO price VALUES (8, 3000.00);

INSERT INTO cruise VALUES (1, 'Salt Lake City Cruise', 6);
INSERT INTO cruise VALUES (2, 'Antarctic Cruise', 7);
INSERT INTO cruise VALUES (3, 'Moon Cruise', 8);

INSERT INTO room VALUES (1, 'Sleep on Deck', 1);
INSERT INTO room VALUES (2, 'Half Room', 2);
INSERT INTO room VALUES (3, 'Normal-Sized Room', 3);
INSERT INTO room VALUES (4, 'Luxury Suite', 4);
INSERT INTO room VALUES (5, 'Captain Quarters', 5);

SELECT cruise_type, cost FROM cruise AS c
JOIN price AS p
ON c.cruise_price = p.id;

//Trying to see cruise names from trip;
SELECT cruise_type FROM trip AS t JOIN cruise AS c ON t.cruise_id = c.id;
 
//Trying to see cost of the listed cruises;
SELECT cost FROM cruise as c JOIN price AS p ON c.cruise_price = p.id;

//Trying to see the trip table with the filled in names, NOT numbers;
SELECT cruise_type, room_type, total_cost FROM trip
 AS t JOIN cruise AS c ON t.cruise_id = c.id
 JOIN room AS r ON t.room_id = r.id;
 
 //Getting specific information using more than one qualifier;
 SELECT cruise_type, room_type, total_cost FROM trip AS t JOIN cruise AS c 
 ON t.cruise_id = c.id JOIN room AS r ON t.room_id = r.id 
 WHERE cruise_id = 1 AND room_id = 2;
 
//Getting cost within a TABLE thats WITHIN another TABLE;
SELECT cost FROM trip AS t JOIN cruise AS c ON t.cruise_id = c.id
 JOIN price AS p ON c.cruise_price = p.id;
 
 //Getting cost within a TABLE thats WITHIN another TABLE WITH a qualifier;
SELECT cost FROM trip AS t JOIN cruise AS c ON t.cruise_id = c.id
 JOIN price AS p ON c.cruise_price = p.id WHERE cruise_id = 1;
