<?php 
$CI =& get_instance();
$Usuario_id = $CI->session->userdata('YOY_ID_USUARIO');
$Usuario_info = $CI->db->get_where('usuario',array('ID_USUARIO' => $Usuario_id ))->row();

if(count($Usuario_info))
{
   $CP = $Usuario_info->CP_USUARIO;
   $dir = $Usuario_info->DIRECCION_USUARIO;
   $name = $Usuario_info->NOMBRE_USUARIO;
   $phone = $Usuario_info->TELEFONO_USUARIO;
}

?>
   

<section class="page-info-sectionII set-bg"></section>

<div class="container mt-container">
   <div class="row">
      <div class="col-lg-8">
         <h3>¿Cómo quieres recibir tu compra? </h3>
         <!-- Tipo envio -->
         <div class="form-group row">
            <label class="label-ship">Tipo de envío</label>
            <select name="" id="SELECT_TIPO_ENVIO" class="form-control">
               <option value="1">Nacional</option>
               <option value="2">Internacional</option>
            </select>
         </div>
         <!-- Domicilio -->
         <div class="form-group">
            <label class="label-ship">Domicilio</label>
            <div class="row style-ship details-buy">
               <div class="col-lg-2 align-middle">
                  <div class="circle-dir"><i class="fas fa-map-marker-alt"></i></div>
               </div>
               <div class="col-lg-7">
                  <div>
                     <div id="cp">C.P. <?=$CP = (isset($CP)) ? $CP : "No registrado" ;?></div>
                     <div id="dir"><?=$dir = (isset($dir)) ? $dir : "No registrado" ;?></div>
                     <div id="nombre"><?=$name?> - <?=$phone?></div>
                  </div>
               </div>
               <div class="col-lg-3 align-middle">
                  <a href="#"> Añadir o elegir otro</a>
               </div>
            </div>
         </div>
         
         <label class="label-ship">Opciones de envío</label>
         <!-- Nacional -->
         <div id="Nacional">
         <?php 
            $CI =& get_instance();
            $shipNacional = $this->db->get_where('tipo_envio',array('TIPO_ENVIO'=>'Nacional'))->result_array();
            foreach ($shipNacional as $key => $row) {
            $id = $row['ID_TIPO_ENVIO'];
            $name = $row['NOMBRE_TIPO_ENVIO'];
            $tiempo = $row['TIEMPO_TIPO_ENVIO'];
            $precio = $row['PRECIO_TIPO_ENVIO'];
            ?>
            <div class="form-group">            
               <div class="row style-ship details-buy pointer" id="divNacional<?=$key?>">
                  <div class="col-lg-2 align-middle">
                     <div class="circle-opt">
                     <input type="radio" name="shipNacional" data-name="<?=$name?>" id="<?=$id?>">
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div>
                        <b><?=$name?></b>
                        <div id="desc_ship"><?=$tiempo?></div>
                     </div>
                  </div>
                  <div class="col-lg-3 align-middle">
                     <h4 class="color-green normal">$ <?=$precio?></h4>
                  </div>
               </div>
            </div>
         <?php } ?>
         </div>
         <!-- Internacional -->
         <div class="hide" id="Internacional">
         <?php
            $shipInter = $this->db->get_where('tipo_envio', array('TIPO_ENVIO' => 'Internacional'))->result_array();
            foreach ($shipInter as $key => $row) {
            $id = $row['ID_TIPO_ENVIO'];
            $name = $row['NOMBRE_TIPO_ENVIO'];
            $tiempo = $row['TIEMPO_TIPO_ENVIO'];
            $precio = $row['PRECIO_TIPO_ENVIO'];
            ?>
            <div class="form-group">
               <div class="row style-ship details-buy pointer" id="divInternacional<?=$key?>">
                  <div class="col-lg-2 align-middle"> 
                     <div class="circle-opt">
                     <input type="radio" name="shipInternacional" data-name="<?=$name?>" id="<?=$id?>">
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div>
                        <b><?=$name?></b>
                        <div id="desc_ship"><?=$tiempo?></div>
                     </div>
                  </div>
                  <div class="col-lg-3 align-middle">
                     <h4 class="color-green normal">$ <?=$precio?></h4>
                  </div>
               </div>
            </div>
         <?php }?>
         </div>
         <!-- <button type="button" id="nextStep" class="btn btn-primary">Continuar</button> -->
         <?php 
            $id_product = $this->uri->segment(3);
         ?>
         <a class="btn btn-primary"href="<?= base_url('Store/proccess_payment/'.$id_product)?>">Continuar</a>
      </div>
      <div class="col-lg-4">
         <div class="row justify-content-center mt-100">
            <div class="col-lg-10 col-lg-offset-1 text-center form-group">
               <img src="<?= base_url($product['IMAGEN_PRODUCTO']) ?>" alt="">
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
               <h4><?=$product['NOMBRE_PRODUCTO'];?></h4>
            </div>
         </div><hr>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1 border-bottomx">
               <label class="label-ship">Producto</label> 
               <label class="label-ship float-right">$900.00</label> 
                        
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1">
               <label class="label-ship">Pagas</label> 
               <label class="label-ship float-right">$900.00</label>                         
            </div>
         </div>
      </div>
   </div>
</div>