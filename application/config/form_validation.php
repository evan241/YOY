<?php

$config = array(

    'registro' => array(

        array(
                'field' => 'C_NOMBRE_USUARIO',
                'label' => 'Nombres',
                'rules' => 'trim|required|onlyAlphaSpaces|min_length[3]|max_length[25]'
        ),
        
        array(
                'field' => 'C_APELLIDOS_USUARIO',
                'label' => 'Apellidos',
                'rules' => 'trim|required|onlyAlphaSpaces|min_length[3]|max_length[25]'
        ),
        
        array(
                'field' => 'C_PASSWORD_USUARIO',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[8]|max_length[25]'
        ),
        
        array(
                'field' => 'C_TELEFONO_USUARIO',
                'label' => 'Telefono',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[20]|'
        ),

        array(
                'field' => 'C_EMAIL_USUARIO',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|min_length[5]'
        ),
        )
);