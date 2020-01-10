<style>
   table.dataTable.no-footer {
    border-bottom: 1px solid #dee2e6;
   }
  
   table.dataTable thead th,
   table.dataTable thead td {

      border-bottom-color:#dee2e6
   }

   table.dataTable thead th,
   table.dataTable tfoot th {
      font-weight: 600;
      letter-spacing:0.5px;
      text-transform:uppercase;
      font-size:12px;
      color:#333
   }

   #dataVentas_filter input {
      outline: 0px;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 5px;
   }
   .dt-filter{margin-top:10px;padding-left: 15px;}

   #dataVentas_length{
      margin-left: 15px ;
   }
   .dataTables_length select {
      border-radius: 5px;
      padding: 5px;

   }

   .paginate_button.current {
      background: #ccc !important;
      color: white !important;
   }
  
</style>
<div class="row">
   <div class="col-lg-12">
      <div class="card card-default">
         <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>VENTAS</h2>
         </div>
         <div class="card-body">
            <div class="basic-data-table">
               <table id="dataVentas" class="table nowrap dataTable no-footer" style="font-size: 14px;" cellspacing="0"
                  width="100%">
                  <thead class="text-center">
                     <tr>
                        <th  data-orderable="false" width="5%">#</th>
                        <th width="10%">Usuario</th>
                        <th  data-orderable="false" width="10%">Producto</th>
                        <th  data-orderable="false" width="10%">Cantidad</th>
                        <th width="10%">Fecha</th>
                        <th width="10%">Estatus</th>
                        <th  data-orderable="false" width="15%">Medio de pago</th>
                        <th width="15%">Tipo de envío</th>
                        <th width="5%">Activa</th>
                        <th  data-orderable="false" width="10%">Actions</th>
                     </tr>
                  </thead>
                  <tbody class="text-center"style="font-size:12px;">
                     <?php
                     if (count($ROW_SALES)):
                        foreach ($ROW_SALES as $ROW):
                           $ACTIVA = $ROW['ACTIVA_VENTA'] == 1 ? '<i style="color:green" class="fa fa-check fa-2x" aria-hidden="true"></i>' : '<i style="color:red" class="fa fa-times fa-2x" aria-hidden="true"></i>';
                           $ESTATUS = "VALIDANDO PAGO";
                     ?>
                     <tr>
                        <td><b><?=$ROW['ID_VENTA']?></b></td>
                        <td><?=mb_strtoupper($ROW['NOMBRE_USUARIO'] . " " . $ROW['APELLIDO_USUARIO'])?></td>
                        <td><?=mb_strtoupper($ROW['NOMBRE_PRODUCTO'])?></td>
                        <td><?=$ROW['CANTIDAD_VENTA']?></td>
                        <td><?=$ROW['FECHA_VENTA'];?></td>
                        <td><?=$ESTATUS?></td>
                        <td><?=$ROW['NOMBRE_MEDIO_PAGO']?></td>
                        <td><?=$ROW['NOMBRE_TIPO_ENVIO']?></td>
                        <td><?=$ACTIVA?></td>
                        <td style="width: 15%">
                           <button id="btnViewUser" class="btn btn-primary btn-view-user "
                              data-original-title="Ver info de usuario" data-toggle="tooltip"
                              style=" padding: 2px 5px !important;" data-id-sale="<?=$ROW['ID_VENTA']?>">
                             <i class="fa fa-eye fa-1x" aria-hidden="true"></i>
                           </button>
                           <button id="btnCancelSale" class="btn btn-danger btn-cancel-sale"
                              data-original-title="Cancelar venta" data-toggle="tooltip"
                              style=" padding: 2px 5px !important;" data-id-sale="<?=$ROW['ID_VENTA']?>">
                               <i class="fa fa-times-circle fa-1x" aria-hidden="true"></i> 
                           </button>
                        </td>

                     </tr>
                     <?php
                     endforeach;
                     endif;
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modCustomer" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header header-primary" id="modalHeaderAdvice">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalTitleAdvice">Borrado de producto</h4>
         </div>
         <div class="modal-body text-center" id="modBodyCustomer">
         </div>
         <div class="clear"></div>
         <div class="modal-footer">
            <div class="btn-group ">

               <button class="btn btn-default" type="button" id="btnCancel" data-dismiss="modal">
                  <i class="fa fa-times" aria-hidden="true"></i> Cancelar
               </button>

               <button class="btn btn-primary" type="button" id="btnDelRowClient">
                  <i class="fa fa-check-circle" aria-hidden="true"></i> Si, borrar
               </button>
            </div>
         </div>
      </div>
   </div>
</div>