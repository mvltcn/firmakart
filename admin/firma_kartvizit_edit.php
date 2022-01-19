<?php
include "db_conn.php";

$sas = $_SESSION['id'];
$sorgu = "SELECT * FROM firma INNER JOIN tema  ON firma.tema_id=tema.id
                                    WHERE id='$sas'";
$sorguSonucu = mysqli_query($conn, $sorgu);

$sonuc = $sorguSonucu->fetch_assoc();
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];







echo '

<div id="br1" style="background-color: '.$sonuc['renk1'].'; border-radius:24px;">
    <div class="container" style="padding-top: 25px;padding-bottom: 25px; ">
         <div class="row" id="br2" style=" background: '.$sonuc['renk2'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                     max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

             <div class="row" id="br3" style=" background: '.$sonuc['renk3'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
             max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

                 <div class="row" id="br4" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;  ">

                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <img src="personel/'. $sonuc['personel_resim'] .  '" style="margin: auto; display: block; width: 175px;  height: 200px;  border-radius: 24px;  object-fit: cover;  object-position: 50% 15%;" class="shadow-sm">

                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8" style="margin: auto ; width:auto; padding-top:5px;text-align: center;">
                    <h2 id="isim1" style="color:'.$sonuc['renk5'].'" >'. $sonuc['personel_ad'] .' '. $sonuc['personel_soyad'] .'</h2>
                    <h5 id="isim2" style="color:'.$sonuc['renk5'].'" >'. $sonuc['personel_pozisyon'] .'</h5>

                    </div>
                 </div>
<div class="row" id="br5" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

<div class="col-sm-1 col-md-81 col-lg-1" style="margin-top:auto;margin-bottom: auto ;  width:auto;">
<i id="ikon1" style="color:'.$sonuc['renk6'].'" class="fas fa-envelope"></i> <span id="yazi1" style="color:'.$sonuc['renk5'].'">'. $sonuc['personel_email'] .'</span><br>
<i id="ikon2" style="color:'.$sonuc['renk6'].'" class="fas fa-envelope"></i> <span id="yazi2" style="color:'.$sonuc['renk5'].'">'. $sonuc['personel_adres'] .'</span><br>
<i id="ikon3" style="color:'.$sonuc['renk6'].'" class="fas fa-envelope"></i> <span id="yazi3" style="color:'.$sonuc['renk5'].'">'. $sonuc['personel_tel'] .'</span><br>

</div>
</div>

<div class="row d-flex justify-content-center" id="br9" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

<div class="col " style=" text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['renk5'].'" target="_blank" href="' . $sonuc['personel_linkedin'] . '"><i id="ikon11"  style="color:'.$sonuc['renk6'].'" class="fa fa-2x fa-linkedin"></i></a>
</div>
<div class="col" style="text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['renk5'].'" target="_blank" href="' . $sonuc['personel_facebook'] . '"><i id="ikon12"  style="color:'.$sonuc['renk6'].'" class="fa fa-2x fa-facebook"></i></a>

</div>
<div class="col" style="text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['renk5'].'" target="_blank" href="' . $sonuc['personel_twitter'] . '"><i id="ikon13"  style="color:'.$sonuc['renk6'].'" class="fa fa-2x fa-twitter"></i></a>

</div>
<div class="col" style="text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['renk5'].'"target="_blank"  href="' . $sonuc['personel_instagram'] . '"><i id="ikon14"  style="color:'.$sonuc['renk6'].'" class="fa fa-2x fa-instagram"></i></a>



</div>
</div>

<div class="row" id="br6" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">
<img src="firmalogo/' . $sonuc['firma_logo'] . ' " style=" display: block;
margin-left: auto;
margin-right: auto;
width:auto; height:50px
" class="">

</div>
<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; text-align:center; margin-right:auto; padding-top:5px;">
<h4 id="firmaisim1" style="color:'.$sonuc['renk5'].'">' . $sonuc['firma_adi'] . '</h4>

</div>

<div class="col-sm-12 col-md-12 col-lg-12" style="margin: auto ; width:auto; padding-top:5px;">


<i id="ikon5"  style="color:'.$sonuc['renk6'].'"  class="fa fa-address-book"></i>
<span id="firmayazi1" style="color:'.$sonuc['renk5'].'"> ' . $sonuc['firma_adres'] . ' </span><br>

<a id="firmayazi2" style="text-decoration: none;color:'.$sonuc['renk5'].' " href="' . $sonuc['firma_email'] . '"> <i id="ikon6"  style="color:'.$sonuc['renk6'].'"  class="fas fa-envelope"></i> ' . $sonuc['firma_email'] . ' </a> <br>

<a id="firmayazi3"  style="text-decoration: none;color:'.$sonuc['renk5'].'" href="tel:+9' . $sonuc['firma_telefon'] . '"><i id="ikon7"  style="color:'.$sonuc['renk6'].'"  class="fas fa-phone"></i> ' . $sonuc['firma_telefon'] . ' </a><br>
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['renk5'].'" href="http://' . $sonuc['firma_website'] . '"><i id="ikon8"  style="color:'.$sonuc['renk6'].'" class="fas fa-globe"></i> ' . $sonuc['firma_website'] . ' </a>


</div>
</div>
<div class="row" id="br7" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">
<img src="https://qrtag.net/api/qr_transparent_6.svg?url=https://developers.google.com/chart/infographics/docs/qr_codes" style=" display: block;
margin-left: auto;
margin-right: auto;
width:auto; height:130px
" class="">

</div>


</div>

<div class="" id="br8" style=" background: '.$sonuc['renk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="row" style="text-align: center;font-size:20px">
<div class="col">
<a id="paylas1"  style="text-decoration: none;color:'.$sonuc['renk5'].' " href="https://wa.me/?text='.$url.'"> <i id="ikon9"  style="color:'.$sonuc['renk6'].'"  class="fa fa-whatsapp"></i> Paylaş </a> <br>
</div>
<div class="col action ">
<a id="paylas2" style="text-decoration: none;color:'.$sonuc['renk5'].'" href="kartvizit.php?action=export&id="><i id="ikon10"  style="color:'.$sonuc['renk6'].'"  class="fa fa-address-card-o"></i> Vcard </a>



</div>

</div>












</div>






</div>

            




        </div>



    </div>
    

</div>
    

    ';
