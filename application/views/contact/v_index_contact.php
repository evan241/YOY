<style>
    a{text-decoration:none;}
    .txt-rt{text-align:right;}/* text align right */
    .txt-lt{text-align:left;}/* text align left */
    .txt-center{text-align:center;}/* text align center */
    .float-rt{float:right;}/* float right */
    .float-lt{float:left;}/* float left */
    .clear{clear:both;}/* clear float */
    .pos-relative{position:relative;}/* Position Relative */
    .pos-absolute{position:absolute;}/* Position Absolute */
    .vertical-base{	vertical-align:baseline;}/* vertical align baseline */
    .vertical-top{	vertical-align:top;}/* vertical align top */
    .wrap {
        width: 80%;
        margin: 2em auto 0;
    }

    /*--profile start here--*/
  
    /*-- contact --*/ 
    .contact{
        background: #03a9f4;
    }
    .contact-grid {
        background: #ffffff;
        padding: 2em 2em;
    }
    .contact-w3lsleft {
        float: left;
        width: 55%;
    }
    .contact-w3lsright{
        float:left;
        width:45%;
    }
    .agileits-contact-right{
        padding: 3.5em 2em 0;
    }
    .contact-grid h4 {
        font-size: 1.2em;
        color: #000;
        margin: 0 0 1em 0;
        font-weight: 600;
        letter-spacing: 2px;
    }
    .contact input[type="text"], .contact input[type="email"], .contact textarea {
        width: 90%;
        color: #999999;
        background: #fff;
        outline: none;
        font-size: .9em;
        padding: .8em 1em;
        margin-bottom: 1.5em;
        border: solid 1px #b2b2b2;
        -webkit-appearance: none;
    }
    .contact textarea {
        resize: none;
        min-height: 6em;
        font-family: 'Roboto', sans-serif;
    }
    .contact input[type="submit"] { 
        outline: none;
        color: #fff;
        padding: .8em 3em;
        font-size: .9em;
        -webkit-appearance: none;
        cursor: pointer;
        background: #000000;
        border: solid 1px #000000;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -o-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -ms-transition: 0.5s all;
    }
    .contact input[type="submit"]:hover{
        background: none; 
        border-color:#000000;
        color:#000000;
    }
    .contact ::-webkit-input-placeholder{
        color:#555 !important;
    }
    .address-row {
        margin-top: 2em;
    }
    .contact-w3lsright h2 {
        font-size: 1em;
        color: #000000;
        font-weight: 800;
        line-height: 1.8em;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .address-left {
        padding: 0;
        text-align: center;
        float: left;
        width: 20%;
    }
    .address-row i.fa {
        font-size: 1.2em;
        border: 1px solid #000000;
        padding: .5em;
        color: #000000;
        transition: .5s all;
        background: white;
        border-radius: 20px;
    }
    .address-right {
        float: left;
    }
    .set-bgx{background:#ff1493}
    
    .address-right p{
        color: #ffffff;
        font-size: .9em;
        margin: 0 0 0 15px;
        letter-spacing:0.5px
    }
    .address-row h5 {
        font-size: 17px;
        color: #000000;
        margin: 0 0 0 15px;
        font-weight: 600;
        letter-spacing:1px
    }
    .address-row p a {
        color: #ffffff;
        margin: 1em 0 0 0;
        text-decoration: none;
    }
    .address-row p a:hover{
        color: #000000;
    }
    .address h4 {
        font-size: 1.8em;
        color: #bb3756;
        margin-bottom: 0.6em;
        text-transform: uppercase;
    }
   
    /*-- //contact --*/
    /*-- responsive --*/
    @media(max-width:1366px){
        .address-right {
            width: 76%;
        }
        .address-right p {
            font-size: .9em;
        }
    }
    @media(max-width:1280px){
        .wrap {
            width: 60%;
        }
    }
    @media(max-width:1080px){
        .wrap {
            width: 70%;
        }
    }
    @media(max-width:900px){
        .wrap {
            width: 80%;
        }
    }
    @media(max-width:800px){
        .wrap {
            width: 90%;
        }
    }
    @media(max-width:800px){
        .address-right {
            width: 70%;
            margin-left: 1em;
        }
    }
    @media(max-width:600px){
        .contact-w3lsleft {
            float: none;
            width: 100%;
        }
        .contact-w3lsright {
            float: none;
            width: 100%;
        }
        .agileits-contact-right {
            padding: 4em 2em;
        }
        .address-left {
            text-align:left;
            width: 10%;
        }
       
    }
 
    @media(max-width:414px){
     
        .contact input[type="text"], .contact input[type="email"], .contact textarea {
            width: 88%;
        }
        .contact-grid {
            padding: 2em;
        }
    }
    @media(max-width:384px){
        h1 {
            font-size: 1.5em;
        }
        .address-left {
            width: 15%;
        }
    }
    @media(max-width:320px){
        .contact textarea {
            min-height: 7em;
        }
        .agileits-contact-right {
            padding: 3em 2em;
        }
        .address-left {
            width: 17%;
        }
        .contact input[type="submit"] {
            padding: .8em 2em;
        }
    }
    /*-- //responsive --*/
</style>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<div class="container mt-section">
 
    
    <div class="wrap">
        <!-- contact -->
        <div class="contact">
            <div class="contact-row agileits-w3layouts set-bgx">  
                <div class="contact-w3lsleft">
                    <div class="contact-grid agileits">
                        <h4>DROP US A LINE </h4>
                        <form data-tooggle="validator" role="form" id="formContact" method="post" > 
                            <input type="hidden" id="name"  name="name" placeholder="Name">
                            <input type="text" id="nombre" name="nombre" placeholder="Name" required="">
                            <input type="email" id="e-mail" name="e-mail" placeholder="Email" required=""> 
                            <input type="text" id="telefono" name="telefono" placeholder="Phone Number" required="">
                            <textarea id="mensaje" name="mensaje" placeholder="Message..."  rows="2" required=""></textarea>
                            <input type="submit" value="Submit" >
                        </form> 
                    </div>
                </div>
                <div class="contact-w3lsright">
                    <div class="agileits-contact-right">
                        <h2>Our Contacts</h2>
                        <div class="address-row">
                            <div class="address-left">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="address-right">
                                <h5>Visit Us</h5>
                                <p>Guadalajara , Jalisco</p>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="address-row w3-agileits">
                            <div class="address-left">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="address-right">
                                <h5>Mail Us</h5>
                                <p><a href="mailto:yoy@example.com"> yoy@example.com</a></p>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="address-row">
                            <div class="address-left">
                                <i class="fa fa-volume-control-phone" aria-hidden="true" style="padding: 8px 10px;"></i>
                            </div>
                            <div class="address-right">
                                <h5>Call Us</h5>
                                <p>+01 222 333 4444</p>
                            </div>
                            <div class="clear"> </div>
                        </div> 
                    </div>
                </div>
                <div class="clear"> </div>
            </div>	
        </div>
        <!-- //contact --> 
    </div>
</div>

<div class="modal fade" id="modAdvice" tabindex="-1">
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



