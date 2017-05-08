-- Drop tables
DROP TABLE IF EXISTS Prod2Cat;
DROP TABLE IF EXISTS Basket;
DROP TABLE IF EXISTS OrderRow;
DROP TABLE IF EXISTS lStatusLog;
DROP TABLE IF EXISTS `Order`;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS ProdCategory;

-- Tables
CREATE TABLE ProdCategory (
  id       INT AUTO_INCREMENT,
  category CHAR(10),

  PRIMARY KEY (id)
);

CREATE TABLE Product (
  id          INT AUTO_INCREMENT,
  description VARCHAR(20),
  price       INT,
  lStatus     INT,
  image       TEXT,

  PRIMARY KEY (id),
  KEY index_price (price)
);

CREATE TABLE Prod2Cat (
  id      INT AUTO_INCREMENT,
  prod_id INT,
  cat_id  INT,

  PRIMARY KEY (id),
  FOREIGN KEY (prod_id) REFERENCES Product (id),
  FOREIGN KEY (cat_id) REFERENCES ProdCategory (id)
);


CREATE TABLE Basket (
  id       INT AUTO_INCREMENT,
  products INT,
  amount   INT,

  PRIMARY KEY (id),
  FOREIGN KEY (products) REFERENCES Product (id)
);

CREATE TABLE Customer (
  id     INT AUTO_INCREMENT,
  `name` VARCHAR(20),

  PRIMARY KEY (id)
);

CREATE TABLE `Order` (
  id       INT      AUTO_INCREMENT,
  customer INT,
  created  DATETIME DEFAULT CURRENT_TIMESTAMP,
  deleted  DATETIME DEFAULT NULL,

  PRIMARY KEY (id),
  KEY index_date (created),
  FOREIGN KEY (customer) REFERENCES Customer (id)

);

CREATE TABLE OrderRow (
  id      INT AUTO_INCREMENT,
  `order` INT,
  product INT,
  amount  INT,

  PRIMARY KEY (id),

  FOREIGN KEY (`order`) REFERENCES `Order` (id),
  FOREIGN KEY (product) REFERENCES Product (id)

);

CREATE TABLE lStatusLog
(
  `id`      INTEGER PRIMARY KEY AUTO_INCREMENT,
  `when`    TIMESTAMP           DEFAULT CURRENT_TIMESTAMP,
  `what`    VARCHAR(20),
  `product` INT,
  `amount`  INT,

  FOREIGN KEY (product) REFERENCES Product (id)
);

-- Inserts
INSERT INTO ProdCategory (category)
VALUES ("desktop"), ("laptop");

INSERT INTO Product (description, price, lStatus, image)
VALUES ("Acer Aspire", 10000, 100, "img/acerAspire"), ("Apple Macbook", 20000, 20, "img/appleMacbook"),
  ("Lenovo L430", 5000, 40, "img/lenovoL430"), ("Lenovo IC 300", 8000, 66, "img/lenovoIC300"),
  ("VOX G4", 2000, 10, "img/voxG4");

INSERT INTO Prod2Cat (prod_id, cat_id)
VALUES (1, 2), (2, 2), (3, 2), (4, 1), (5, 1);

INSERT INTO Basket (products, amount)
VALUES (1, 20), (3, 5);

INSERT INTO Customer (`name`)
VALUES ("Mr Test"), ("Mrs Test");

INSERT INTO `Order` (customer)
VALUES (1), (2);

INSERT INTO OrderRow (`order`, product, amount)
VALUES (1, 3, 10), (2, 1, 2), (1, 5, 3), (2, 2, 1), (1, 4, 1);

-- Get information about order
SELECT
  O.id,
  C.id AS `Customer ID`,
  C.`name`,
  P.description,
  O.amount
FROM OrderRow AS O
  INNER JOIN Customer AS C ON O.`order` = C.id
  INNER JOIN Product AS P ON O.product = P.id
GROUP BY O.id
ORDER BY O.`order`;

-- SELECT * FROM VOrderDetails;


-- Get all information and category
SELECT
  P.id,
  P.description          AS `Description`,
  P.price                AS `Price`,
  P.lStatus              AS `Status`,
  P.image                AS `Image`,
  group_concat(category) AS Category
FROM Product AS P
  INNER JOIN Prod2Cat AS P2C ON P.id = P2C.prod_id
  INNER JOIN ProdCategory AS PC ON PC.id = P2C.cat_id
GROUP BY P.id
ORDER BY P.description;


DROP VIEW IF EXISTS VProduct;
CREATE VIEW VProduct AS
  SELECT
    P.id,
    P.description          AS `Description`,
    P.price                AS `Price`,
    P.lStatus              AS `Status`,
    P.image                AS `Image`,
    group_concat(category) AS Category
  FROM Product AS P
    INNER JOIN Prod2Cat AS P2C ON P.id = P2C.prod_id
    INNER JOIN ProdCategory AS PC ON PC.id = P2C.cat_id
  GROUP BY P.id
  ORDER BY P.description;

DROP VIEW IF EXISTS VBasket;
CREATE VIEW VBasket AS
  SELECT
    B.id,
    P.id          AS `Product ID`,
    P.description AS `Product`,
    B.amount      AS `Amount`
  FROM Basket AS B
    INNER JOIN Product AS P ON B.products = P.id
  GROUP BY B.id
  ORDER BY B.products;
-- Procedure

DROP PROCEDURE IF EXISTS addToBasket;
DROP PROCEDURE IF EXISTS removeFromBasket;

DELIMITER //
CREATE PROCEDURE addToBasket(
  prod_id INT,
  amount  INT
)
  BEGIN
    START TRANSACTION;

    INSERT INTO Basket (products, amount) VALUES (prod_id, amount);
    COMMIT;
    SELECT *
    FROM VBasket;
  END
//


CREATE PROCEDURE removeFromBasket(
  prod_id INT
)
  BEGIN
    DELETE FROM Basket
    WHERE products = prod_id;
    COMMIT;
    SELECT *
    FROM VBasket;
  END
//

DROP PROCEDURE IF EXISTS CheckOrder //
CREATE PROCEDURE CheckOrder(
  customer INT
)
  BEGIN
    SELECT
      O.id,
      C.`name`,
      P.description,
      O.amount
    FROM OrderRow AS O
      INNER JOIN Customer AS C ON O.`order` = C.id
      INNER JOIN Product AS P ON O.product = P.id
    WHERE C.id = customer
    GROUP BY O.id
    ORDER BY O.`order`;
    COMMIT;
  END
//

DROP PROCEDURE IF EXISTS removeOrder //
CREATE PROCEDURE removeOrder(
  customer INT
)
  BEGIN
    DELETE FROM OrderRow
    WHERE OrderRow.`order` = customer;
    COMMIT;
  END
//

DROP PROCEDURE IF EXISTS makeOrder //
CREATE PROCEDURE makeOrder(
  customer VARCHAR(20),
  product  INT,
  amount   INT
)
  BEGIN
    DECLARE currentID INT;
    DECLARE currentBalanceProduct INT;
    DECLARE checkName INT;
    -- DECLARE checkOrder INT;
    -- Check if user exists. Add to existing user.

    SET checkName = (SELECT count(customer)
                     FROM Customer
                     WHERE `name` = customer);
    SET currentID = (SELECT id
                     FROM Customer
                     WHERE `name` = customer);
    -- SET checkOrder = (SELECT count(customer) FROM `Order` WHERE id = currentID);
    -- SELECT checkOrder;
    IF checkName != 1
    THEN
      INSERT INTO Customer (`name`)
      VALUES (customer);
      SET currentID = (SELECT id
                       FROM Customer
                       WHERE `name` = customer);

      INSERT INTO `Order` (customer)
      VALUES (currentID);
    ELSE
      INSERT INTO `Order` (customer)
      VALUES (currentID);
    END IF;

    SET currentBalanceProduct = (SELECT lStatus
                                 FROM Product
                                 WHERE id = product);
    -- SELECT checkUpdate

    START TRANSACTION;

    IF currentBalanceProduct - amount < 0
    THEN
      ROLLBACK;
      SELECT "Not enought items";
    ELSE
      INSERT INTO OrderRow (`order`, product, amount)
      VALUES (currentID, product, amount);

      UPDATE Product
      SET
        lStatus = lStatus - amount
      WHERE
        id = product;

      COMMIT;

    END IF;
    -- SELECT * FROM OrderRow WHERE id = currentID;
    -- SELECT * FROM Product;

  END
//


DROP FUNCTION IF EXISTS checkAmount //
CREATE FUNCTION checkAmount(
  amount INT
)
  RETURNS INT
  BEGIN
    RETURN amount;
  END
//

DELIMITER ;
-- Trigger
DROP TRIGGER IF EXISTS lStatusTrigger;
DELIMITER //
CREATE TRIGGER lStatusTrigger
AFTER UPDATE
  ON Product
FOR EACH ROW
  IF checkAmount(NEW.lStatus) < 5
  THEN
    INSERT INTO lStatusLog (`what`, `product`, `amount`)
    VALUES ("trigger", OLD.id, NEW.lStatus);
  END IF
//
DELIMITER ;

SELECT *
FROM lStatusLog;

DROP VIEW IF EXISTS VRapport;
CREATE VIEW VRapport AS
  SELECT
    P.description AS `Produkt att beställa`,
    lS.amount     AS `Nuvarande antal`
  FROM lStatusLog AS lS
    INNER JOIN Product AS P ON P.id = lS.product;

-- Add to basket
CALL addToBasket(1, 20);
-- Remove from basket
CALL removeFromBasket(1);
-- Check Order
CALL checkOrder(1);
-- Remove Order
CALL removeOrder(2);
-- Make Order // `name`, product, amount
CALL makeOrder("Test", 2, 10);
CALL makeOrder("Force", 1, 99);

-- See statuslog
SELECT *
FROM lStatusLog;

-- See rapport
SELECT *
FROM VRapport;

-- See all products
SELECT *
FROM VProduct;