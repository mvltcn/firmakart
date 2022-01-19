<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['personel_ui'])) {
    if ($_SESSION['tema_durum'] == true) {
        # code...


?>

        <html>

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Anasayfa</title>
            <link href="style/bootstrap.min.css" rel="stylesheet">
            <link href="style.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://kit.fontawesome.com/1b3be615e6.js" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <!------ Include the above in your HEAD tag ---------->
        </head>

        <body style="background: linear-gradient(90deg, hsla(217, 100%, 50%, 1) 0%, hsla(186, 100%, 69%, 1) 100%);">

            <div class="container">

                <div class="renkkatman" style="margin-top:15px;margin-bottom: 15px;">

                    <div class="row ">
                        <div class="col-xs-4 col-sm-4 col-sm-4" style="    padding-bottom: 15px;">
                            <?php
                            include "db_conn.php";

                            $sas = $_SESSION['id'];
                            $sorgu = "SELECT * FROM personel WHERE id='$sas'";
                            $sorguSonucu = mysqli_query($conn, $sorgu);

                            $sonuc = $sorguSonucu->fetch_assoc();

                            if (isset($_POST['submit'])) {


                                $r1 = $_POST['renk1'];
                                $r2 = $_POST['renk2'];
                                $r3 = $_POST['renk3'];
                                $r4 = $_POST['renk4'];
                                $r5 = $_POST['renk5'];
                                $r6 = $_POST['renk6'];
                                



                                $guncelleSorgusu = mysqli_query(
                                    $conn,
                                    "UPDATE personel    SET  personel_temaRenk1='$r1',personel_temaRenk2='$r2',personel_temaRenk3='$r3',personel_temaRenk4='$r4',personel_temaRenk5='$r5',personel_temaRenk6='$r6'
                                                  WHERE id='$sas'"
                                );

                                header("Location: tema-duzenle");
                            }






                            echo '    <div class="" style="text-align: center; background:#a8dadc; width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">
              
                  


            <div class=" " style="background:#f1f4ee; width: auto ;height:auto;margin-left: auto;  width: 100%;
            max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">
            <h3>Kartvizit  Tema Ayarları</h3><hr>
            <h5>Örnek Tema</h5>
                     <div class="py-2" onclick="myFunction()" >
                        <span id="tm1" style="background: #1D3557;height:20px;width:40px; display:inline-block;">                            
                        </span>
                        <span id="tm2" style="background: #457B9D;height:20px;width:40px; display:inline-block;">     
                        </span>
                        <span id="tm3" style="background: #A8DADC;height:20px;width:40px; display:inline-block;">                             
                        </span>
                        <span id="tm4" style="background: #F1FAEE;height:20px;width:40px; display:inline-block;"> 
                        </span>
                        <span id="tm5" style="background: #204546;height:20px;width:40px; display:inline-block;"> 
                        </span>
                        <span id="tm6" style="background: #1D3557;height:20px;width:40px; display:inline-block;">  
                        </span>
                    </div>
                    <div class="py-2" onclick="myFunction2()"> 
                        <span id="tm7" style="background: #14213D;height:20px;width:40px; display:inline-block;">                         
                        </span>
                        <span id="tm8" style="background: #FCA311;height:20px;width:40px; display:inline-block;">    
                        </span>
                        <span id="tm9" style="background: #E5E5E5;height:20px;width:40px; display:inline-block;">                              
                        </span>
                        <span id="tm10" style="background: #FFFFFF;height:20px;width:40px; display:inline-block;"> 
                        </span>
                        <span id="tm11" style="background: #204546;height:20px;width:40px; display:inline-block;">
                        </span>
                        <span id="tm12" style="background: #1D3557;height:20px;width:40px; display:inline-block;"> 
                        </span>
                    </div>
                    <div class="py-2" onclick="myFunction3()" "> 
                        <span id="tm13" style="background: #2B2D42;height:20px;width:40px; display:inline-block;">                            
                        </span>
                        <span id="tm14" style="background: #EF233C;height:20px;width:40px; display:inline-block;">    
                        </span>
                        <span id="tm15" style="background: #8D99AE;height:20px;width:40px; display:inline-block;">                             
                        </span>
                        <span id="tm16" style="background: #EDF2F4;height:20px;width:40px; display:inline-block;"> 
                        </span>
                        <span id="tm17" style="background: #204546;height:20px;width:40px; display:inline-block;"> 
                        </span>
                        <span id="tm18" style="background: #1D3557;height:20px;width:40px; display:inline-block;"> 
                        </span>
                    </div>
                    

                    <div class="py-2" id="colorWrapper" onclick="myFunction4()"> 
                    <span id="tm19" style="background: #16697a;height:20px;width:40px; display:inline-block;">                          
                    </span>
                    <span id="tm20" style="background: #489fb5;height:20px;width:40px; display:inline-block;">    
                    </span>
                    <span id="tm21" style="background: #82c0cc;height:20px;width:40px;display:inline-block;">                             
                    </span>
                    <span id="tm22" style="background: #ede7e3;height:20px;width:40px;display:inline-block;"> 
                    </span>
                    <span id="tm23" style="background: #204546;height:20px;width:40px;display:inline-block;"> 
                    </span>
                    <span id="tm24" style="background: #1D3557;height:20px;width:40px;display:inline-block;"> 
                    </span>
                    </div>

             <div class="d-flex justify-content-center">  
       

            <form  method="post" enctype="multipart/form-data">
            <div class=" p-2">  <hr>
            <h5>Arkaplan</h5>
            <div class="">    <input  type="color" id="cr1" name="renk1" value="' . $sonuc['personel_temaRenk1'] . '" style="border: none;width:100px;height:30px;background:none"> 
                              <input  type="color" id="cr2" name="renk2" value="' . $sonuc['personel_temaRenk2'] . '" style="border: none;width:100px;height:30px;background:none">  
             </div>
            <div class="">    <input  type="color" id="cr3" name="renk3" value="' . $sonuc['personel_temaRenk3'] . '" style="border: none;width:100px;height:30px;background:none">    
                              <input  type="color" id="cr4" name="renk4" value="' . $sonuc['personel_temaRenk4'] . '" style="border: none;width:100px;height:30px;background:none">    </div>          
            <hr>
                              <h5>Yazı & İkon</h5>

            <div class="">  <input  type="color" id="cr5" name="renk5" value="' . $sonuc['personel_temaRenk5'] . '" style="border: none;width:100px;height:30px;background:none">
                            <input  type="color" id="cr6" name="renk6" value="' . $sonuc['personel_temaRenk6'] . '" style="border: none;width:100px;height:30px;background:none"></div>

            </div><hr>
            
            
            
            <input type="submit" class="btn btn-primary mb-1  "name="submit" value="Tema Güncelle" >

            </form>
            </div>

            </div>
 
       
            </div>



'; 
?>




                        </div>
                        <div class="col-xs-8 col-sm-8 col-sm-8 ">

                        <?php
include "db_conn.php";

$sas = $_SESSION['id'];
$sorgu = "SELECT * FROM personel INNER JOIN firma on personel.firma_id=firma.id WHERE personel.id='$sas'";
$sorguSonucu = mysqli_query($conn, $sorgu);

$sonuc = $sorguSonucu->fetch_assoc();



echo '

<div id="br1" style="background-color: '.$sonuc['personel_temaRenk1'].'; border-radius:24px;">
    <div class="" style="padding-top: 25px;padding-bottom: 25px; ">
         <div class="row" id="br2" style=" background: '.$sonuc['personel_temaRenk2'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
                     max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

             <div class="row" id="br3" style=" background: '.$sonuc['personel_temaRenk3'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
             max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;">

                 <div class="row" id="br4" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;  ">

                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <img src="personel/presim.jpg" style="margin: auto; display: block; width: 175px;  height: 200px;  border-radius: 24px;  object-fit: cover;  object-position: 50% 15%;" class="shadow-sm">

                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8" style="margin: auto ; width:auto; padding-top:5px;text-align: center;">
                    <h2 id="isim1" style="color:'.$sonuc['personel_temaRenk5'].'" >'.$sonuc['personel_ad'].' '.$sonuc['personel_soyad'].'</h2>
                    <h5 id="isim2" style="color:'.$sonuc['personel_temaRenk5'].'" >'.$sonuc['personel_pozisyon'].'</h5>

                    </div>
                 </div>
<div class="row" id="br5" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

<div class="col-sm-1 col-md-81 col-lg-1" style="margin-top:auto;margin-bottom: auto ;  width:auto;">
<i id="ikon1" style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-envelope"></i> <span id="yazi1" style="color:'.$sonuc['personel_temaRenk5'].'">'.$sonuc['personel_email'].'</span><br>
<i id="ikon2" style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-envelope"></i> <span id="yazi2" style="color:'.$sonuc['personel_temaRenk5'].'">'.$sonuc['personel_tel'].'</span><br>
<i id="ikon3" style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-envelope"></i> <span id="yazi3" style="color:'.$sonuc['personel_temaRenk5'].'">'.$sonuc['personel_adres'].'</span><br>

</div>
</div>

<div class="row d-flex justify-content-center" id="br9" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px; margin-top: 10px;">

<div class="col " style=" text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" target="_blank" href=""><i id="ikon11"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-linkedin"></i></a>
</div>
<div class="col" style="text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" target="_blank" href=""><i id="ikon12"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-facebook"></i></a>

</div>
<div class="col" style="text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" target="_blank" href=""><i id="ikon13"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-twitter"></i></a>

</div>
<div class="col" style="text-align:center">
<a id=""  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'"target="_blank"  href=""><i id="ikon14"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fa fa-2x fa-instagram"></i></a>



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

<div class="col-sm-12 col-md-12 col-lg-12" style="margin: auto ; width:auto; padding-top:5px;">


<i id="ikon5"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fa fa-address-book"></i>
<span id="firmayazi1" style="color:'.$sonuc['personel_temaRenk5'].'"> ' . $sonuc['firma_adres'] . ' </span><br>

<a id="firmayazi2" style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href="' . $sonuc['firma_email'] . '"> <i id="ikon6"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fas fa-envelope"></i> ' . $sonuc['firma_email'] . ' </a> <br>

<a id="firmayazi3"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" href="tel:+9' . $sonuc['firma_telefon'] . '"><i id="ikon7"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fas fa-phone"></i> ' . $sonuc['firma_telefon'] . ' </a><br>
<a id="firmayazi4"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" href="http://' . $sonuc['firma_website'] . '"><i id="ikon8"  style="color:'.$sonuc['personel_temaRenk6'].'" class="fas fa-globe"></i> ' . $sonuc['firma_website'] . ' </a>


</div>
</div>
<div class="row" id="br7" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="col-sm-6 col-md-6 col-lg-6 " style="margin-left: auto; margin-right:auto; ">
<img src="https://qrtag.net/api/qr_transparent_6.svg?url=https://developers.google.com/chart/infographics/docs/qr_codes" style=" display: block;
margin-left: auto;
margin-right: auto;
width:auto; height:130px
" class="">

</div>


</div>

<div class="" id="br8" style=" background: '.$sonuc['personel_temaRenk4'].';  width: auto ;height:auto;margin-left: auto;  width: 100%;
max-width: 650px;margin-right: auto; border-radius: 24px;padding:15px;margin-top: 10px;">

<div class="row" style="text-align: center;font-size:20px">
<div class="col">
<a id="paylas1"  style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].' " href=""> <i id="ikon9"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fa fa-whatsapp"></i> Paylaş </a> <br>
</div>
<div class="col action ">
<a id="paylas2" style="text-decoration: none;color:'.$sonuc['personel_temaRenk5'].'" href=""><i id="ikon10"  style="color:'.$sonuc['personel_temaRenk6'].'"  class="fa fa-address-card-o"></i> Vcard </a>



</div>

</div>












</div>






</div>

            




        </div>



    </div>
    

</div>
    

    ';

?>

                        </div>





                    </div>

                </div>
            </div>
            <?php if (isset($_GET['mesaj'])) {
                include "mesaj.php";
            ?>

            <?php } ?>

















            <script type="text/javascript" src="temarenk.js"></script>


        </body>



        </html>
<?php
    }
} else {
    header("Location: index.php");
    exit();
}
?>