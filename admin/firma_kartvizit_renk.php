<?php
include "db_conn.php";

$sas = $_SESSION['personel_ui'];
$sorgu = "SELECT * FROM personel INNER JOIN firma  ON personel.firma_id=firma.id INNER JOIN tema  ON personel.tema_id=tema.id
                                    WHERE personel_ui='$sas'";
$sorguSonucu = mysqli_query($conn, $sorgu);

$sonuc = $sorguSonucu->fetch_assoc();
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (isset($_POST['submit'])) {

  
      $r1 = $_POST['renk1'];
      $r2 = $_POST['renk2'];
      $r3 = $_POST['renk3'];
      $r4 = $_POST['renk4'];
      $r5 = $_POST['renk5'];
      $r6 = $_POST['renk6'];


      $sonuc = $conn->query(sprintf("INSERT INTO tema (renk1,renk2,renk3,renk4,renk5,renk6) 
                                       VALUES ('$r1','$r2','$r3','$r4','$r5','$r6')"));

      $son_id = $conn->insert_id;

      $guncelleSorgusu = mysqli_query(
        $conn,
        "UPDATE personel 
                          SET  tema_id='$son_id'
                          WHERE personel_ui='$sas'"
      );

 header("Location: personel-kartvizit");
    }

  
 




echo '    <div class="" style="text-align: center; background:#acc6e2; padding-top: 25px;padding-bottom: 25px;border-radius: 24px;">
            <form  method="post" enctype="multipart/form-data">
            <div class="row p-3">  
            <h6>Kartvizit  Tema</h6>
            <div class="col">    <span> Renk-1<input type="color" id="cr1" name="renk1" value="' . $sonuc['renk1'] . '">        </div>
            <div class="col">  <p>Renk-2<input type="color" id="cr2" name="renk2" value="' . $sonuc['renk2'] . '">   </div>
            <div class="col">   <p>Renk-3<input type="color" id="cr3" name="renk3" value="' . $sonuc['renk3'] . '">    </div>
            <div class="col">     <p>Renk-4<input type="color" id="cr4" name="renk4" value="' . $sonuc['renk4'] . '">    </div>          
            
            </div>

            <div class="row p-3">
            <div class="col">  <span>Yazı <input type="color" id="cr5" name="renk5" value="' . $sonuc['renk5'] . '"></div>
            <div class="col">  <span>İkon <input type="color" id="cr6" name="renk6" value="' . $sonuc['renk6'] . '"></div>

            </div>
            
            
            
            <input type="submit" name="submit" value="Tema Güncelle" >

            </form>

            </div>

         
        


'; ?>

<script>
  let color1 = document.getElementById('cr1');
  color1.addEventListener('input', function(e) {
    cr1.style.color = this.value;
    br1.style.background = this.value;
  });
  let color2 = document.getElementById('cr2');
  color2.addEventListener('input', function(e) {
    cr2.style.color = this.value;
    br2.style.background = this.value;
  });
  let color3 = document.getElementById('cr3');
  color3.addEventListener('input', function(e) {
    cr3.style.color = this.value;
    br3.style.background = this.value;
  });
  let color4 = document.getElementById('cr4');
  color4.addEventListener('input', function(e) {
    cr4.style.color = this.value;
    br4.style.background = this.value;
    br5.style.background = this.value;
    br6.style.background = this.value;
    br7.style.background = this.value;
    br8.style.background = this.value;
    br9.style.background = this.value;
  });

  let color5 = document.getElementById('cr5');
  color5.addEventListener('input', function(e) {
    isim1.style.color = this.value;
    isim2.style.color = isim1.style.color;
    yazi1.style.color = isim1.style.color;
    yazi2.style.color = isim1.style.color;
    yazi3.style.color = isim1.style.color;
    firmaisim1.style.color = isim1.style.color;
    firmayazi1.style.color = isim1.style.color;
    firmayazi2.style.color = isim1.style.color;
    firmayazi3.style.color = isim1.style.color;
    firmayazi4.style.color = isim1.style.color;
    paylas1.style.color = isim1.style.color;
    paylas2.style.color = isim1.style.color;



  });

  let color6 = document.getElementById('cr6');
  color6.addEventListener('input', function(e) {

    cr6.style.color = this.value;
    ikon1.style.color = this.value;
    ikon2.style.color = this.value;
    ikon3.style.color = this.value;
    ikon5.style.color = this.value;
    ikon6.style.color = this.value;
    ikon7.style.color = this.value;
    ikon8.style.color = this.value;
    ikon9.style.color = this.value;
    ikon10.style.color = this.value;
    ikon11.style.color = this.value;
    ikon12.style.color = this.value;
    ikon13.style.color = this.value;
    ikon14.style.color = this.value;

  });
</script>