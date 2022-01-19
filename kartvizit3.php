<?php
include "db_conn.php";
if (!empty($_GET["action"])) {
    $sas = (string)$_GET['id'];
    $sorgu = "SELECT * FROM personel INNER JOIN firma  ON personel.firma_id=firma.id   WHERE personel_ui='$sas'";
    $sorguSonucu = mysqli_query($conn, $sorgu);

    $sonuc = $sorguSonucu->fetch_assoc();

    require_once "VcardExport.php";
    $vcardExport = new VcardExport();
    $vcardExport->contactVcardExportService($sonuc);
    exit;
}
$sas = (string)$_GET['id'];
$sorgu = "SELECT * FROM personel INNER JOIN firma  ON personel.firma_id=firma.id INNER JOIN tema  ON personel.tema_id=tema.id
                                    WHERE personel_ui='$sas'";
$sorguSonucu = mysqli_query($conn, $sorgu);

$sonuc = $sorguSonucu->fetch_assoc();
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$sayfaid = $_GET['id'];






echo '

<body style="background-color: '.$sonuc['renk1'].';
   background-size: cover;">
    <div class="container" style="padding-top: 25px;padding-bottom: 25px; ">
        <div class="row" style=" background: '.$sonuc['renk2'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                                 max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">
            
            <div class="row" style=" background: '.$sonuc['renk3'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                                 max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

                <div class="row" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; ">
               

                    
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <img src="personel/'. $sonuc['personel_resim'] .  '" style="margin: auto; display: block; width: 175px;  height: 200px;  border-radius: 24px;  object-fit: cover;  object-position: 50% 15%;" class="shadow-sm">

                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8" style="margin: auto ; width:auto; padding-top:5px;">
                        <h2>'. $sonuc['personel_ad'] .' '. $sonuc['personel_soyad'] .'</h2>
                        <h5>'. $sonuc['personel_pozisyon'] .'</h5>

                    </div>
                </div>
                <div class="row" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

                    <div class="col-sm-1 col-md-81 col-lg-1" style="margin-top:auto;margin-bottom: auto ;  width:auto;">
                        <i class="fas fa-envelope"></i> <span>'. $sonuc['personel_email'] .'</span><br>
                        <i class="fas fa-envelope"></i> <span>'. $sonuc['personel_adres'] .'</span><br>
                        <i class="fas fa-envelope"></i> <span>'. $sonuc['personel_tel'] .'</span><br>
                        <i class="fas fa-envelope"></i> <span>'. $sonuc['personel_ad'] .'</span>

                    </div>


                </div>

                <div class="row" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                     max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 20px;">

                    <div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">
                    <img src="firmalogo/' . $sonuc['firma_logo'] . ' " style=" display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width:auto; height:50px
                    " class="">

                     </div>
                     <div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; text-align:center; margin-right:auto; padding-top:5px;">
                     <h4>' . $sonuc['firma_adi'] . '</h4>

                     </div>

                     <div class="col-sm-12 col-md-12 col-lg-12" style="margin: auto ; width:auto; padding-top:5px;">
                   
                    
                    <i class="fa fa-address-book"></i>
                    <span> ' . $sonuc['firma_adres'] . ' </span><br>
                    
                    <a style="text-decoration: none;color:black " href="' . $sonuc['firma_email'] . '"> <i class="fas fa-envelope"></i> ' . $sonuc['firma_email'] . ' </a> <br>

                    <a style="text-decoration: none;color:black" href="tel:+9' . $sonuc['firma_telefon'] . '"><i style="color:black" class="fas fa-phone"></i> ' . $sonuc['firma_telefon'] . ' </a><br>
                    <a style="text-decoration: none;color:black" href="http://' . $sonuc['firma_website'] . '"><i style="color:black" class="fas fa-globe"></i> ' . $sonuc['firma_website'] . ' </a>


                    </div>
                </div>
                <div class="row" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                     max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 20px;">

                     <div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">
                     <img src="https://qrtag.net/api/qr_transparent_6.svg?url=https://developers.google.com/chart/infographics/docs/qr_codes" 
                     style=" display: block;
                     margin-left: auto;
                     margin-right: auto;
                     width:auto; height:200px
                     " class="">
 
                      </div>


            </div>

            <div class="" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
            max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 20px;">

       <div class="row" style="text-align: center;font-size:20px">
                <div class="col">
                <a style="text-decoration: none;color:black " href="https://wa.me/?text='.$url.'"> <i style="color:black" class="fa fa-whatsapp"></i> Paylaş </a> <br>
               </div>
       <div class="col action ">
       <a style="text-decoration: none;color:black" href="kartvizit.php?action=export&id='.$sayfaid.'"><i style="color:black" class="fa fa-address-card-o"></i> İndir </a>

           </div>

           </div>


   </div>





            



        </div>

            




        </div>



    </div>
    

</body>
    ';

?>

<html>
<head>
    
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1b3be615e6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <title>Hello, world!</title>
</head>
</html>