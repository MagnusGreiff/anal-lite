# How to use my SQL API.

## Basket commands:

##### Add product to basket:
CALL addToBasket(prod_id, amount);  
Ex: CALL addToBasket(1,20);

##### Remove from basket:
CALL removeFromBasket(prod_id);  
Ex: CALL removeFromBasket(1);

##### Check basket:
CALL showBasket();

## Order commands:

##### Check order:
CALL checkOrder(customer);  
Ex: CALL checkOrder(1);

##### Remove order:
CALL removeOrder(customer);  
Ex: CALL removeOrder(1);

##### Make order:
CALL makeOrder(customer, product, amount);  
Ex: CALL makeOrder(1, 2, 10); //Moves products from storage to order.

## Other commands:

##### Show products with low amount in storage:
SELECT * FROM VRapport;

##### Show all products:
SELECT * FROM VProduct;

##### Show statusLog:
SELECT * FROM lStatusLog;
