<?php

include "db_conn.php";


$sorgu = "SELECT *  FROM personel WHERE firma_id=" . $_SESSION['id'];
$sorguSonucu = mysqli_query($conn, $sorgu,);


  


while ($user = mysqli_fetch_assoc($sorguSonucu)) {
  echo '<tr>
      
      <td> <div class="card-views"><img alt="image" src="personel/' . $user['personel_resim'] . '" style=" margin:auto;display: block; width: 60px;  height: 60px;  border-radius: 5px;  object-fit: cover;  object-position: 50% 15%;"> <div class="card-view"> </td>
      <td>       
      <div class="media-title mb-0">' . $user['personel_ad'] . " " . $user['personel_soyad'] . '</div>
      <span class="text-small text-muted">' . $user['personel_pozisyon'] . '</span><br>
      <span class="text-small text-muted">' . $user['personel_email'] . '</span>
      </div></td>
      <td>       
      <form action="" method="post" >
          <input class="form-check-input" name="durum" type="checkbox"  id="flexCheckDefault"';
  if ($user['tema_durum'] == 1) {
    echo "checked='checked'";
  }
  echo 'disabled>
      </form>
      

      </div></td>
      
      <td>
      <div style="margin:auto">
      <a href="kartvizit.php?id='  . $user['personel_ui']  . '" target="_blank" class="btn btn-icon btn-sm btn-primary" title="View"> <i class="fas fa-eye"></i></a>
      <a href="firma-personel-guncelle.php?id=' . $user['id'] . '" target="_blank" class="btn btn-icon btn-sm btn-success ml-1"  title="Edit"> <i class="fas fa-pen"> </i></a>
      <a href="personel_sil.php?id=' . $user['id'] . '" class="btn btn-icon btn-sm btn-danger ml-1 delete-card" data-id="46" title="Delete"> <i class="fas fa-trash"></i></a>
     </div>
      </td>
      
    </tr>';
}
