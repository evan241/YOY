DELIMITER //

CREATE PROCEDURE addProduct(
		IN v_name VARCHAR(50), 
        IN v_price FLOAT(11),
        IN v_image VARCHAR(255)
)
BEGIN
		INSERT
        INTO	products
				(`name`, `price`, `image`)
		VALUES
				(v_name, v_price, v_image);
                
END //

DELIMITER ;