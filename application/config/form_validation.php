<?php

$config = array(

    'registro' => array(

        array(
                'field' => 'C_NOMBRE_USUARIO',
                'label' => 'Nombres',
                'rules' => 'trim|required|onlyAlphaSpaces'
        ),
        
        array(
                'field' => 'C_APELLIDOS_USUARIO',
                'label' => 'Apellidos',
                'rules' => 'trim|required|onlyAlphaSpaces'
        ),
        
        array(
                'field' => 'C_PASSWORD_USUARIO',
                'label' => 'Password',
                'rules' => 'trim|required'
        ),
        
        )
);