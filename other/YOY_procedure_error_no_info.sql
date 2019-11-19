DELIMITER //

CREATE PROCEDURE PAYPAL_ERROR_NO_INFO (
				IN v_paypal_client_id 	INT(25),
                IN v_ID_USUARIO			INT(255),
                IN v_ID_PRODUCTO		INT(255),
                IN v_status				VARCHAR(100),
                IN v_checkout_url		VARCHAR(100),
                IN v_checkout_id		VARCHAR(25)
)
BEGIN
		INSERT
        INTO	`paypal_error`
				(`paypal_client_id`, `ID_USUARIO`, `ID_PRODUCTO`, `status`, `checkout_url`, `checkout_id`)
		VALUES
				(v_paypal_client_id, v_ID_USUARIO, v_ID_PRODUCTO, v_satus, v_checkout_url, v_checkout_id);
                
END //

DELIMITER ;