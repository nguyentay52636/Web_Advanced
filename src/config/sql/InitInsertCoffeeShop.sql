INSERT INTO `ACCOUNTS` (`USENAME`, `PASSWORD`) VALUES
('john_doe', 'password123'),
('jane_smith', 'securepass'),
('peter_jones', 'mysecret'),
('alice_wonder', 'wonderland');

INSERT INTO `USERS` (`ACCOUNTID`, `FULLNAME`, `ADDRESS`, `PHONE`, `EMAIL`, `DATEOFBIRTH`) VALUES
(1, 'John Doe', '123 Main St', '123-456-7890', 'john.doe@example.com', '1990-01-15'),
(2, 'Jane Smith', '456 Oak Ave', '987-654-3210', 'jane.smith@example.com', '1985-05-20'),
(3, 'Peter Jones', '789 Pine Ln', '555-123-4567', 'peter.jones@example.com', '1992-11-08'),
(4, 'Alice Wonderland', '10 Downing St', '012-345-6789', 'alice.wonder@example.com', '2000-03-22');

INSERT INTO `UNITS` (`TYPE`) VALUES
('kg'),
('g'),
('ml'),
('pcs'),
('l');

INSERT INTO `PRODUCERS` (`PRODUCERNAME`, `ADDRESS`, `PHONE`) VALUES
('Local Farm', '12 Farm Rd', '111-222-3333'),
('Imported Goods', '45 Trade St', '444-555-6666'),
('Regional Supplier', '78 Supply Ln', '777-888-9999');

INSERT INTO `INGREDIENTS` (`PRODUCERID`, `INGREDIENTNAME`, `QUANTITY`, `UNITID`) VALUES
(1, 'Coffee Beans', 100, 1), -- 100 kg
(1, 'Milk', 500, 3), -- 500 ml
(2, 'Sugar', 50, 1), -- 50 kg
(3, 'Chocolate Syrup', 200, 3); -- 200 ml

INSERT INTO `RECIPES` (`RECIPENAME`) VALUES
('Espresso'),
('Latte'),
('Americano'),
('Mocha');

INSERT INTO `RECIPEDETAILS` (`RECIPEID`, `INGREDIENTID`, `QUANTITY`, `UNITID`) VALUES
(1, 1, 100, 1), -- 100 kg
(1, 2, 500, 3), -- 500 ml
(2, 1, 200, 1), -- 200 kg(2, 2, 1000, 3), -- 1000 ml
(3, 1, 50, 1), -- 50 kg
(3, 2, 250, 3), -- 250 ml
(4, 1, 150, 1), -- 150 kg
(4, 2, 750, 3), -- 750 ml
(4, 3, 25, 1), -- 25 kg
(4, 4, 125, 3); -- 125 ml

INSERT INTO `PRODUCTS` (`RECIPEID`, `PRODUCTNAME`, `PRICE`, `UNITID`) VALUES
(1, 'Espresso', 3.50, 4), -- pcs
(2, 'Latte', 4.50, 4),
(3, 'Americano', 3.00, 4),
(4, 'Mocha', 5.00, 4);

INSERT INTO `IMPORTS` (`PRODUCERID`, `DATE`, `TOTAL`) VALUES
(1, '2023-10-26', 5000),
(2, '2023-10-27', 10000),
(3, '2023-10-28', 7500);


INSERT INTO `IMPORTDETAILS` (`IMPORTID`, `INGREDIENTID`, `QUANTITY`, `PRICE`, `TOTAL`) VALUES
(1, 1, 100, 40, 4000),
(1, 2, 500, 2, 1000),
(2, 3, 50, 100, 5000),
(2, 4, 200, 25, 5000),
(3, 1, 50, 50, 2500),
(3, 3, 25, 200, 5000);

INSERT INTO `DISCOUNTS` (`DISCOUNTNAME`, `DISCOUNTPERCENT`, `REQUIREMENT`, `STARTDATE`, `ENDDATE`) VALUES
('Summer Sale', 10, 20, '2023-06-01', '2023-08-31'),
('Winter Deal', 15, 30, '2023-12-01', '2023-12-31');

INSERT INTO `ORDERS` (`USERID`, `TOTAL`, `DATEOFORDER`, `ORDERSTATUS`, `DISCOUNTID`) VALUES
(1, 7, '2023-10-26', 'Pending', 1),
(2, 13.50, '2023-10-27', 'Completed', 2),
(3, 3.50, '2023-10-28', 'Pending', 1);

INSERT INTO `ORDERDETAILS` (`ORDERID`, `PRODUCTID`, `QUANTITY`, `PRICE`, `TOTAL`) VALUES
(1, 1, 2, 3.50, 7),
(1, 3, 1, 3.00, 3),
(2, 2, 3, 4.50, 13.50),
(2, 4, 1, 5.00, 5),
(3, 1, 1, 3.50, 3.50),
(3, 2, 2, 4.50, 9),
(3, 4, 1, 5.00, 5);

INSERT INTO `CARTS` (`USERID`, `QUANTITY`) VALUES
(1, 3),
(2, 1),
(3, 3),
(4, 1);

INSERT INTO `CARTDETAILS` (`CARTID`, `PRODUCTID`, `QUANTITY`) VALUES
(1, 1, 2),
(1, 2, 1),
(3, 3, 3),
(4, 4, 1);


INSERT INTO `PRODUCTREVIEWS` (`USERID`, `PRODUCTID`, `RATING`, `DATE`, `COMMENT`) VALUES
(1, 1, 4.5, '2023-10-26', 'Great espresso!'),
(2, 2, 5.0, '2023-10-27', 'Perfect latte!'),
(3, 3, 4.0, '2023-10-28', 'Good Americano.'),
(4, 4, 4.8, '2023-10-29', 'Delicious Mocha.');