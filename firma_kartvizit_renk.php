<?php
include "db_conn.php";

$sas = $_SESSION['id'];
$sorgu = "SELECT * FROM firma INNER JOIN tema  ON firma.tema_id=tema.id
                                    WHERE firma.id='$sas'";
$sorguSonucu = mysqli_query($conn, $sorgu);

$sonuc = $sorguSonucu->fetch_assoc();

if (isset($_POST['submit'])) {

  
      $r1 = $_POST['renk1'];
      $r2 = $_POST['renk2'];
      $r3 = $_POST['renk3'];
      $r4 = $_POST['renk4'];
      $r5 = $_POST['renk5'];
      $r6 = $_POST['renk6'];
      $tid=$sonuc['tema_id'];



      $guncelleSorgusu = mysqli_query(
        $conn,
        "UPDATE tema    SET  renk1='$r1',renk2='$r2',renk3='$r3',renk4='$r4',renk5='$r5',renk6='$r6'
                          WHERE id='$tid'"
      );

 header("Location: firma-kartvizit");
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
            <div class="">    <input  type="color" id="cr1" name="renk1" value="' . $sonuc['renk1'] . '" style="border: none;width:100px;height:30px;background:none"> 
                              <input  type="color" id="cr2" name="renk2" value="' . $sonuc['renk2'] . '" style="border: none;width:100px;height:30px;background:none">  
             </div>
            <div class="">    <input  type="color" id="cr3" name="renk3" value="' . $sonuc['renk3'] . '" style="border: none;width:100px;height:30px;background:none">    
                              <input  type="color" id="cr4" name="renk4" value="' . $sonuc['renk4'] . '" style="border: none;width:100px;height:30px;background:none">    </div>          
            <hr>
                              <h5>Yazı & İkon</h5>

            <div class="">  <input  type="color" id="cr5" name="renk5" value="' . $sonuc['renk5'] . '" style="border: none;width:100px;height:30px;background:none">
                            <input  type="color" id="cr6" name="renk6" value="' . $sonuc['renk6'] . '" style="border: none;width:100px;height:30px;background:none"></div>

            </div><hr>
            
            
            
            <input type="submit" class="btn btn-primary mb-1  "name="submit" value="Tema Güncelle" >

            </form>
            </div>

            </div>
 
       
            </div>



'; ?>




