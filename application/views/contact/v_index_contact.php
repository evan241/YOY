<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Page info section -->
<section class="page-info-sectionII set-bg">
    <h2>Contact</h2>
</section>
<!-- Page info section end -->


<div class="container">
    <div class="row">
        <div class="">
            <form data-tooggle="validator" role="form" id="formContact" method="post" >
                <h4 class="">
                    Envíanos tu mensaje
                </h4>

                <div class="">
                    <input class="" id="nombre" type="text" required="" name="nombre" placeholder="Nombre" style="border: 2px solid #7ab751 !important; border-radius: 4px;">
                </div>

                <div class="">
                    <input class=" " id="telefono" type="text"  name="telefono" placeholder="Teléfono" style="border: 2px solid #7ab751 !important; border-radius: 4px;">
                </div>

                <div class="">
                    <input class="" type="email" name="e-mail"  id="e-mail" required="" placeholder="Email" style="border: 2px solid #7ab751 !important; border-radius: 4px;">
                </div>

                <textarea class="" required="" id="mensaje" name="mensaje" placeholder="Mensaje" style="border: 2px solid #7ab751 !important; border-radius: 4px;"></textarea>

                <div style="display: none;">
                    <input id="name" type="text" name="name" placeholder="Name">
                </div>

                <div class="">
                    <!-- Button -->
                    <button type="submit"  class="">
                        Enviar mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modAdvice" tabindex="-1" role="dialog" aria-labelledby="modAdvice" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" style="color:#FFF;" aria-label="Close"><span style="color:#FFF;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleTicket">Aviso</h4>
            </div>
            <div class="modal-body" style="text-align: center; width: 100%;">
                <div id="modBodyAdvice" style="width: 360px; display: inline-block;">
                </div>
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button class="btn" type="button"  data-dismiss="modal">
                        <i class="fa fa-undo" aria-hidden="true"></i> Aceptar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div>



