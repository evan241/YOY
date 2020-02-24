<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Email</title>
   <style type="text/css">
      body {
         margin: 0;
         padding: 0;
         min-width: 100% !important;
      }

      img {
         height: auto;
      }

      .content {
         width: 100%;
         max-width: 600px;
      }

      .header {
         padding: 20px 20px 0px 44px;
         background: #03A9F4;
         color:white !important;
      }

      .innerpadding {
         padding: 30px 30px 30px 30px;
      }

      .borderbottom {
         border-bottom: 1px solid #f2eeed;
      }

      .subhead {
         font-size: 15px;
         color: #ffffff;
         font-family: sans-serif;
         letter-spacing: 10px;
      }
      .hx{
         color:white;
         font-family: sans-serif;
         font-size: 33px;
         line-height: 38px;
         font-weight: bold;
      }
      .h1,
      .h2,
      .bodycopy {
         color: #153643;
         font-family: sans-serif;
      }

      .h1 {
         font-size: 33px;
         line-height: 38px;
         font-weight: bold;
      }

      .h2 {
         padding: 0 0 15px 0;
         font-size: 24px;
         line-height: 28px;
         font-weight: bold;
      }

      .bodycopy {
         font-size: 16px;
         line-height: 22px;
      }
      .xd{   
         position: absolute;
         top: 14.5em;
         left: 16.5em;
      }
      .msj {
         background: #e5e5e5;
         border-radius: 5px;
         font-size: 16px;
         line-height: 22px;
         width: 100%;
         min-height: 100px;
         padding: 15px;
         margin-top: 10px;
      }

      .button {
         text-align: center;
         font-size: 18px;
         font-family: sans-serif;
         font-weight: bold;
         padding: 0 30px 0 30px;
      }

      .button a {
         color: #ffffff;
         text-decoration: none;
      }

      .footer {
         padding: 20px 30px 15px 30px;
      }

      .footercopy {
         font-family: sans-serif;
         font-size: 14px;
         color: #ffffff;
      }

      .footercopy a {
         color: #ffffff;
         text-decoration: underline;
      }

      @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
      body[yahoo] .hide {display: none!important;}
      body[yahoo] .buttonwrapper {background-color: transparent!important;}
      body[yahoo] .button {padding: 0px!important;}
      body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
      body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
      }

      /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
    .col425 {width: 425px!important;}
    .col380 {width: 380px!important;}
    }*/
   </style>
</head>

<body bgcolor="#f6f8f1">
   <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                     <tr>
                        <td bgcolor="#c7d8a7" class="header">
                           <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                 <tr>
                                    <td height="70" style="padding: 0 20px 20px 0;">
                                       <img class="fix" src="https://pngimage.net/wp-content/uploads/2018/06/new-message-png-3.png" width="70" height="70" border="0" alt="">
                                    </td>
                                 </tr>
                              </tbody>
                           </table>

                           <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0"
                              style="width: 100%; max-width: 425px;">
                              <tbody>
                                 <tr>
                                    <td height="70">
                                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            
                                             <tr>
                                                <td class="hx" style="padding: 5px 0 0 0;">
                                                   Tienes un mensaje nuevo
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
              
                        </td>
                     </tr>
                     <tr>
                        <td class="innerpadding borderbottom">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                                 <tr>
                                    <td class="h2">
                                       <?= $Nombre ?>
                                    </td>
                                    <td>
                                       Telefono: <?= $Telefono?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom"></td>
                                 </tr>
                                 <tr>
                                    <td class="bodycopy xd">
                                      <?=$Email?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                        
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="msj">
                                       <?=$Mensaje?>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>

   <!--analytics-->
   <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <script src="http://tutsplus.github.io/github-analytics/ga-tracking.min.js"></script>

</body>

</html>