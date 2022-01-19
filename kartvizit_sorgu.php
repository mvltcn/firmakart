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
$sorgu = "SELECT * FROM personel INNER JOIN firma  ON personel.firma_id=firma.id 
                                    WHERE personel_ui='$sas'";
$sorguSonucu = mysqli_query($conn, $sorgu);

$sonuc = $sorguSonucu->fetch_assoc();
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$sayfaid = $_GET['id'];

$im = file_get_contents("personel/".$sonuc['personel_resim']);
$imdata = base64_encode($im);  

$vcard = "BEGIN:VCARD\r\nVERSION:3.0\r\n
N:" . $sonuc['personel_ad'] . ";" . $sonuc['personel_soyad'] . "\r\n
FN:" . $sonuc['personel_ad'] . " " . $sonuc['personel_soyad'] . "\r\n
ORG:" . $sonuc['firma_adi'] . "\r\n
TITLE:" . $sonuc['personel_pozisyon'] . " \r\n

TEL;TYPE=cell,voice:" . $sonuc['personel_tel'] . "\r\n
TEL;TYPE=work,voice:" . $sonuc['firma_telefon'] . "\r\n
URL;TYPE=work:" . $sonuc['firma_website'] . "\r\n
EMAIL;TYPE=internet,pref:" . $sonuc['personel_email'] . "\r\n
REV:" . date('Ymd') . "T195243Z\r\n
END:VCARD";
//$vcard="https://kartvizit.php?action=export&id=$sayfaid";


$eski = array("Ç","ç","Ğ","ğ","ı","İ","Ö","ö","Ş","ş","Ü", "ü");
$yeni = array("C","c","G","g","i","I","O","o","S","s","U", "u");

$strvcard = str_replace($eski, $yeni, $vcard);
//&chco=BB0712  rengini değiştirme



echo '

<body style="background-color: '.$sonuc['personel_temaRenk1'].'">
    <div class="container" style="padding-top: 25px;padding-bottom: 25px; ">
         <div class="row" id="br2" style=" background: '.$sonuc['personel_temaRenk2'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                     max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

             <div class="row" id="br3" style=" background: '.$sonuc['personel_temaRenk3'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
             max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

                 <div class="row" id="br4" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;  ">

                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <img src="personel/'. $sonuc['personel_resim'] .  '" style="margin: auto; display: block; width: 175px;  height: 200px;  border-radius: 24px;  object-fit: cover;  object-position: 50% 15%;" class="shadow-sm">

                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8" style="margin: auto ; width:auto; padding-top:5px;text-align: center;">
                    <h2 id="isim1" style="color:'.$sonuc['personel_temaRenk5'].'" >'. $sonuc['personel_ad'] .' '. $sonuc['personel_soyad'] .'</h2>
                    <h5 id="isim2" style="color:'.$sonuc['personel_temaRenk5'].'" >'. $sonuc['personel_pozisyon'] .'</h5>

                    </div>
                 </div>
<div class="row" id="br5" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

<div class="col-sm-1 col-md-81 col-lg-1" style="margin-top:auto;margin-bottom: auto ;  width:auto;">
<i id="ikon1" style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-address-book"></i> <span id="yazi1" style="color:'.$sonuc['personel_temaRenk5'].'">'. $sonuc['personel_adres'] .'</span><br>
<i id="ikon2" style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-phone"></i> <span id="yazi2" style="color:'.$sonuc['personel_temaRenk5'].'">'. $sonuc['personel_tel'] .'</span><br>
<i id="ikon3" style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-envelope"></i> <span id="yazi3" style="color:'.$sonuc['personel_temaRenk5'].'">'. $sonuc['personel_email'] .'</span><br>

</div>
</div>

<div class="row d-flex justify-content-center" id="br5" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

<div class="col " style=" text-align:center">
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" target="_blank" href="' . $sonuc['personel_linkedin'] . '"><i id="ikon8"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-linkedin"></i></a>
</div>
<div class="col" style="text-align:center">
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" target="_blank" href="' . $sonuc['personel_facebook'] . '"><i id="ikon8"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-facebook"></i></a>

</div>
<div class="col" style="text-align:center">
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" target="_blank" href="' . $sonuc['personel_twitter'] . '"><i id="ikon8"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-twitter"></i></a>

</div>
<div class="col" style="text-align:center">
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'"target="_blank"  href="' . $sonuc['personel_instagram'] . '"><i id="ikon8"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-instagram"></i></a>



</div>
</div>

<div class="row" id="br6" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">
<img src="firmalogo/' . $sonuc['firma_logo'] . ' " style=" display: block;
margin-left: auto;
margin-right: auto;
width:auto; height:50px
" class="">

</div>
<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; text-align:center; margin-right:auto; padding-top:5px;">
<h4 id="firmaisim1" style="color:'.$sonuc['personel_temaRenk5'].'">' . $sonuc['firma_adi'] . '</h4>

</div>

<div class="col-sm-12 col-md-12 col-lg-12" style=" width:auto; padding-top:5px;">



<a id="firmayazi1"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href=" https://www.google.com/maps/search/' . $sonuc['firma_adres'] .'"> <i id="ikon5"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fas fa-address-book"></i> ' . $sonuc['firma_adres'] .' </a> <br>

<a id="firmayazi2"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href="mailto:' . $sonuc['firma_email'] . '"> <i id="ikon6"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fas fa-envelope"></i> ' . $sonuc['firma_email'] . ' </a> <br>
<a id="firmayazi3"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href="tel:+9' . $sonuc['firma_telefon'] . '"><i id="ikon7"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fas fa-phone"></i> ' . $sonuc['firma_telefon'] . ' </a><br>
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href="' . $sonuc['firma_website'] . '"><i id="ikon8"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-globe"></i> ' . $sonuc['firma_website'] . ' </a>


</div>
</div>
<div class="row d-flex justify-content-center text-center" id="br7" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">


<a  href="https://image-charts.com/chart?&choe=UTF-8&chs=200x200&cht=qr&chl=' . urlencode($strvcard) . '" ><img src="https://image-charts.com/chart?&choe=UTF-8&chs=200x200&cht=qr&chl=' . urlencode($strvcard) . '" 
style="
width:auto; height:200px;
background-Color:white;
border-radius:24px
" class=""> </a>

</div>


</div>

<div class="" id="br8" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="row" style="text-align: center;font-size:20px">
<div class="col">
<a id="paylas1"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href="https://wa.me/?text='.$url.'"> <i id="ikon9"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fa fa-whatsapp"></i> Paylaş </a> <br>
</div>
<div class="col action ">
<a id="paylas2" style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" href="kartvizit.php?action=export&id='.$sayfaid.'"><i id="ikon10"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fa fa-address-card-o"></i> Vcard </a>



</div>

</div>












</div>






</div>

            




        </div>



    </div>
    

</body>
    ';
    //https://image-charts.com/chart?&chld=L&choe=UTF-8&chof=.png&chs=200x200&cht=qr&icqrb=ffffff00&chl=' . urlencode($strvcard) . '
?>
