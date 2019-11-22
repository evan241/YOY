DELIMITER //

CREATE PROCEDURE PAYPAL_ERROR_NO_INFO (
		IN v_checkout_url VARCHAR(100)
)
BEGIN
		INSERT
        INTO	`paypal_error`
				(`paypal_client_id`, `ID_USUARIO`, `ID_PRODUCTO`, `status`, `checkout_url`, `checkout_id`)
		VALUES
				(v_product_id, 1);
                
END //

DELIMITER ;