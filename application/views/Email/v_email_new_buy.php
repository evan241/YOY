<!DOCTYPE HTML>
    <html>
        <head>
            <style>
                .button { /* clase general */
                    border: 1px solid #dedede;
                    border-radius: 3px;
                    color: #555;
                    display: inline-block;
                    font: bold 12px/12px HelveticaNeue, Arial;
                    padding: 8px 11px;
                    text-decoration: none;
                }

                .button.white{
                    background: #f5f5f5;
                    border-color: #dedede #d8d8d8 #d3d3d3;
                    box-shadow: 0 1px 1px #eaeaea, inset 0 1px 0 #fbfbfb;
                    color: #555;
                    text-shadow: 0 1px 0 #fff;
                    background: -moz-linear-gradient(top,  #f9f9f9, #f0f0f0);
                    background: -webkit-linear-gradient(top,  #f9f9f9, #f0f0f0);
                    background: o-linear-gradient(top,  #f9f9f9, #f0f0f0);
                    background: ms-linear-gradient(top,  #f9f9f9, #f0f0f0);
                    background: linear-gradient(top,  #f9f9f9, #f0f0f0);
                    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#f0f0f0');
                }

                .button.white:hover{
                      background: #f4f4f4;
                      border-color: #c7c7c7 #c3c3c3 #bebebe;
                      box-shadow: 0 1px 1px #ebebeb, inset 0 1px 0 #f3f3f3;
                      text-shadow: 0 1px 0 #fdfdfd;
                      background: -moz-linear-gradient(top,  #efefef, #f8f8f8);
                      background: -webkit-linear-gradient(top,  #efefef, #f8f8f8);
                      background: -o-linear-gradient(top,  #efefef, #f8f8f8);
                      background: -ms-linear-gradient(top,  #efefef, #f8f8f8);
                      background: linear-gradient(top,  #efefef, #f8f8f8);
                      filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#efefef', endColorstr='#f8f8f8');
                }
            </style>
        </head>
        <body>
            <div>
                <div style=" background-color:#003399; color: white;">
                    Hola <?= $ROW_USUARIO[0]['NOMBRE_USUARIO'] . " " . $ROW_USUARIO[0]['APELLIDOS_USUARIO'] ?>,
                </div>
                <div>
                    <br>
                    Has realizado una compra de <?= $ROW_BUY['CANTIDAD'] ?> boleto(s) para el evento <?=$ROW_BUY['EVENTO']?>.
                    <br>
                    Ya solo falta hacer el deposito.<br>
                    <b>No. de Cuenta:</b> <?= $ROW_CONFIG[0]['CUENTA_CONFIG'] ?><br>
                    <b>Nombre:</b> <?= $ROW_CONFIG[0]['NOMBRE_CUENTA_CONFIG'] ?><br>
                    <b>CLABE:</b> <?= $ROW_CONFIG[0]['CLABE_CUENTA_CONFIG'] ?><br>
                    <b>Total:</b> <font color="blue">$<?= $ROW_BUY['MONTO'] ?></font><br>
                    <font color="red">Rucuerda que puedes hacer tu pago en OXXO.</font><br><br>
                    Una vez que realizes el deposito puedes confirmarlo en el enlace de abajo.<br>
                </div>
                <div style="text-align: right;">
                    <a href="http://localhost/ROLLINGO/principal/confirm_buy/<?=$ROW_BUY['ID_COMPRA']?>" class="button white">Confirmar depósito</a>
                </div>
            </div> 
        </body>
    </html>