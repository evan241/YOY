DELIMITER //

CREATE PROCEDURE addOrder(
		IN v_product_id INT(11)
)
BEGIN
		INSERT
        INTO	`order`
				(`product_id`, `quantity`)
		VALUES
				(v_product_id, 1);
                
END //

DELIMITER ;