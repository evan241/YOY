DELIMITER //

CREATE PROCEDURE updateOrder(
		IN v_product_id INT(11)
)
BEGIN
        UPDATE	`order`
        SET		`quantity` = (	SELECT	`quantity`
                                FROM	`products`
                                WHERE	`product_id` = v_product_id) + 1
		WHERE	`product_id` = v_product_id;
				
                
END //

DELIMITER ;