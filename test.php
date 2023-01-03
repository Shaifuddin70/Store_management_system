

SELECT item_catagory.catagory, item.item_name, item_stock.quantity,item_stock.recieve_date
FROM item_stock
  LEFT JOIN item_catagory ON item_stock.catagory_id = item_catagory.catagory_id
  LEFT JOIN item ON item_stock.item_id = item.item_id



  CREATE TEMPORARY TABLE tstock AS
SELECT
	catagory_id,
	item_id,
	quantity,
    recieve_date
FROM
	item_stock;




SHOW COLUMNS FROM tstock