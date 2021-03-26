<?php 
$CI =& get_instance();
$id_product = $this->uri->segment(3);
$UserInfo = $CI->db->get_where('usuario',array('ID_USUARIO' => $CI->session->YOY_ID_USUARIO ))->row();

if(is_object($UserInfo))
{
   if(isset($CI->session->NOMBRE_USUARIO) AND isset($CI->session->APELLIDO_USUARIO))
   {
      $_NOMBRE = $CI->session->NOMBRE_USUARIO." ".$CI->session->APELLIDO_USUARIO;
      $_NAME   = $CI->session->NOMBRE_USUARIO;
      $_APE    = $CI->session->APELLIDO_USUARIO;
      $_CP     = $CI->session->CP_USUARIO;
      $_TEL    = $CI->session->TELEFONO_USUARIO;
      $_PAIS   = $CI->session->PAIS_USUARIO;
      $_ESTADO = $CI->session->ESTADO_USUARIO;
      $_CIUDAD = $CI->session->ESTADO_USUARIO;
      $_CALLE  = $CI->session->CALLE_DIRECCION;
      $_NUM    = $CI->session->NUM_DIRECCION;
      $_COLONIA= $CI->session->COLONIA_DIRECCION;
   }else{
      $_NOMBRE = $UserInfo->NOMBRE_USUARIO." ".$UserInfo->APELLIDO_USUARIO;
      $_NAME   = $UserInfo->NOMBRE_USUARIO;
      $_APE    = $UserInfo->APELLIDO_USUARIO;
      $_CP     = $UserInfo->CP_USUARIO;
      $_TEL    = $UserInfo->TELEFONO_USUARIO;
      $_PAIS   = $UserInfo->PAIS_USUARIO;
      $_ESTADO = $UserInfo->ESTADO_USUARIO;
      $_CIUDAD = $UserInfo->ESTADO_USUARIO;
      $_CALLE  = $UserInfo->CALLE_DIRECCION;
      $_NUM    = $UserInfo->NUM_DIRECCION;
      $_COLONIA= $UserInfo->COLONIA_DIRECCION;
   }
} 
   $DIRECCION = ($_CALLE != NULL) ? $_CALLE." #".$_NUM.", ".$_COLONIA : "No hay dirección registrada" ;
   $BTN_DIRECCION = ($_CALLE != NULL) ? "Ver / Editar" : "Añadir" ;
?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<section class="h2-section set-bg"><br></section>
<style>
@media (min-width: 576px){ 
   .modal-dialog {
      max-width: 550px;
   }  
}
.form-group >label{
   color:#767c82;
   font-size:14px;
   font-weight:600;
   text-transform:uppercase;
   font-family: "Roboto",monospace;
}
.form-group > input{
   border-radius: 0px;
   background: none;
   border: 0px;
   transition: all 0.5s linear;
   border-bottom: 1px solid;
}
.form-control:focus {
    color: white;
    background-color: #fff0;
    border-color: #f8f8f9;
    outline: 0;
    box-shadow:unset;
}
.modal-backdrop {

  background-color: none !important;
}
</style>
<div class="container mt-container bg-black">
   <h4>¿Cómo quieres recibir tu compra? </h4><br>
   <div class="row fontRoboto">
      <div class="col-lg-8">        
      <!-- Domicilio -->
         <div class="form-group form-borderbottom">
            <span class="label-ship">Domicilio</span>
            <div class="row style-ship details-buy">
               <div class="col-lg-2 align-middle">
                  <div class="circle-dir"><i class="fas fa-map-marker-alt"></i></div>
               </div>
               <div class="col-lg-7">
                  <div>
                     <div>
                        <font class="color-yellow">
                           <?=$comodin = ($_PAIS != NULL ) ? "" : "No hay ubicación registrada" ;?>
                        </font>
                        <font class="capitalize" id="PAIS_CLIENT">
                           <i class='fas fa-flag'></i> <?=$pais = (isset($_PAIS)) ? $_PAIS : "" ;?>
                        </font>
                        <font class="capitalize" id="ESTADO_CLIENT">
                           <?=$estado = (isset($_ESTADO)) ? $_ESTADO : "" ;?>
                        </font>,
                        <font class="capitalize" id="CIUDAD_CLIENT">
                           <?=$ciudad = (isset($_CIUDAD)) ? $_CIUDAD : "" ;?>
                        </font> -
                        <font id="CP_CLIENT">
                           C.P. <?=$CP = (isset($_CP)) ? $_CP : "" ;?>
                        </font>
                     </div>
                     <div class="capitalize" id="DIR_CLIENT">
                        <?="<i class='fas fa-home'></i> ".$DIRECCION;?>
                     </div>
                     <div>
                         <i class="fa fa-user"></i> 
                        <font class="capitalize" id="NOMBRE_CLIENT"><?=$_NOMBRE?></font>  
                           <i class="fa fa-phone-square"></i> 
                        <font id="TELEFONO_CLIENT"> <?=$_TEL?></font>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 align-middle">
                  <a href="#" data-toggle="modal" data-target="#MODAL_DIRECCION"> <?=$BTN_DIRECCION?></a>
               </div>
            </div>
         </div>
      <!-- Tipo envio -->
         <div class="MainTypeShip">
            <div class="row row-borderbottom">
               <label class="label-ships" style=" background: none; border: none;">Tipo de <font class="color-yellow">envío  </font></label>
               <div id="typeShip1"class="radio-ships checked"><input type="radio" name="type_ship" value="1" checked></div> 
               <span class="label-ships" id="labelNacional">Nacional</span>
               <div id="typeShip2"class="ml-10 radio-ships" ><input type="radio" name="type_ship" value="2"></div> 
               <span class="label-ships" id="labelInteracional">Internacional</span>
            </div>
         </div>
      <!-- Opciones envio -->
         <label class="label-ship lblMargin">Opciones de envío</label>
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
                     <input type="radio" name="shipNacional" data-name="<?=$name?>" data-price="<?=$precio?>"  id="<?=$id?>">
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div>
                        <b>
                           <?=$name?>
                        </b>
                        <div>
                           <?=$tiempo?>
                        </div>
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
                     <input type="radio" name="shipInternacional" data-name="<?=$name?>" data-price="<?=$precio?>" id="<?=$id?>">
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div>
                        <b><?=$name?></b>
                        <div>
                           <?=$tiempo?>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 align-middle">
                     <h4 class="color-green normal">$ <?=$precio?></h4>
                  </div>
               </div>
            </div>
         <?php }?>
         </div>
      <!-- IDs input hidden -->
         <input type="hidden" id="ID_PRODUCT" value="<?=$product['ID_PRODUCTO'];?>">
         <input type="hidden" id="ID_SHIP">
         <input type="hidden" id="TYPE_SHIP">
      </div>
      <!-- Product description -->
      <div class="col-lg-4">
         <div class="row justify-content-center mt-20">
            <div class="col-lg-10 col-lg-offset-1 text-center form-group">
               <img class="BorderImage"src="<?= base_url($product['IMAGEN_PRODUCTO']) ?>" alt="">
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
               <h4><?=$product['NOMBRE_PRODUCTO'];?></h4>
            </div>
         </div><hr>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1 border-bottomx">
               <label class="label-ship">Producto</label> 
               <label class="label-ship float-right">$<span id="PRECIO_PRODUCTO"><?=$product['PRECIO_PRODUCTO'];?></span> x <?=$this->session->userdata('TEMP_CANT')?></label>                         
            </div>
            <div class="col-lg-10 col-lg-offset-1 border-bottomx">
               <label class="label-ship">Envío</label> 
               <label class="label-ship float-right" id="PRECIO_ENVIO">$0.00</label>                         
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1">
               <label class="label-ship color-yellow">Pagas</label> 
               <input type="hidden" id="CANT_TEMP" value="<?=$this->session->userdata('TEMP_CANT')?>">
               <label class="label-ship float-right color-yellow" id="TOTAL_FINAL">$0.00</label>                                        
            </div>
            <div class="col-lg-10 col-lg-offset-1 mt-container text-right">
               <a class="btn btn-sale ml--15" id="FIN_CHOOSE_SHIP" href="">Continuar  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="MODAL_DIRECCION" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:10%">
    <div class="modal-dialog">
        <div class="modal-content AddressModalContent">
            <div class="modal-header AddressModalHeader">
               <h4 class="modal-title">Editar Dirección</h4>
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <form id="ADDRESS_FORM">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control capitalize" value="<?=$_NAME?>" name="NOMBRE_EDIT" id="NOMBRE_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control capitalize" value="<?=$_APE?>"name="APE_EDIT" id="APE_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control" value="<?=$_TEL?>"name="TEL_EDIT" id="TEL_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Pais</label>
                        <input type="text" class="form-control capitalize" value="<?=$pais?>"name="PAIS_EDIT" id="PAIS_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Estado</label>
                        <input type="text" class="form-control capitalize" value="<?=$estado?>"name="ESTADO_EDIT" id="ESTADO_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control capitalize" value="<?=$ciudad?>"name="CIUDAD_EDIT" id="CIUDAD_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="form-group">
                        <label for="">Calle</label>
                        <input type="text" class="form-control capitalize" value="<?=$calle = ($_CALLE != NULL) ? $_CALLE : "";?>"name="CALLE_EDIT" id="CALLE_EDIT" placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">No. Exterior</label>
                        <input type="text" class="form-control" value="<?=$num_ext = ($_NUM != NULL) ? $_NUM : "";?>"name="NUM_EDIT" id="NUM_EDIT" placeholder="" autocomplete="off">
                     </div>
                  </div>
                     <div class="col-lg-8">
                     <div class="form-group">
                        <label for="">Colonia</label>
                        <input type="text" class="form-control capitalize" value="<?=$coloniax = ($_COLONIA != NULL) ? $_COLONIA : "" ;?>"name="COLONIA_EDIT" id="COLONIA_EDIT"placeholder="Escribe aquí.." autocomplete="off">
                     </div>
                  </div>
                     <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">Codigo postal</label>
                        <input type="number" class="form-control" value="<?=$cp = ($_CP != NULL) ? $_CP : "" ;?>" name="CP_EDIT" id="CP_EDIT" placeholder="" autocomplete="off">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer AddressModalFooter">
               <input type="submit" value="Guardar" class="btn btn-secondary">
            </div>
            </form>
        </div>
    </div>
</div>