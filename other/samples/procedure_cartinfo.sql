DROP PROCEDURE IF EXISTS `cartInfo`;

DELIMITER //

CREATE PROCEDURE cartInfo()
BEGIN
		SELECT 
				`products`.`name`,
				`products`.`price`,
				`order`.`quantity`,
				`products`.`price` * `order`.`quantity` AS `total`
		FROM
				`order`
		JOIN 	
				`products`
		WHERE
				`order`.product_id = `products`.product_id;
                
END //

DELIMITER ;


