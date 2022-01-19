<?php

include "db_conn.php";


$sorgu = "SELECT personel.*,firma.firma_adi  FROM personel INNER JOIN firma on personel.firma_id=firma.id";
$sorguSonucu = mysqli_query($conn, $sorgu,);


  


while ($user = mysqli_fetch_assoc($sorguSonucu)) {
  echo '<tr>
      <td>      <div class="media-title mb-0">' . $user['firma_adi']  . '</div> </td>
      <td> <div class="card-views"><img alt="image" src="personel/' . $user['personel_resim'] . '" style=" margin:auto;display: block; width: 40px;  height: 40px;  border-radius: 5px;  object-fit: cover;  object-position: 50% 15%;"> <div class="card-view"> </td>
      <td>       
      <div class="media-title mb-0">' . $user['personel_ad'] . " " . $user['personel_soyad'] . '</div> </td>
      <td>      <div class="media-title mb-0">' . $user['personel_pozisyon']  . '</div> </td>
      <td>      <div class="media-title mb-0">' . $user['personel_email']  . '</div> </td>

       <td>
      <div style="margin:auto">
      <a href="kartvizit.php?id='  . $user['personel_ui']  . '" target="_blank" class="btn btn-icon btn-sm btn-primary" title="View"> <i class="fas fa-eye"></i></a>
      <a href="personel_sil.php?id=' . $user['id'] . '" class="btn btn-icon btn-sm btn-danger ml-1 delete-card" data-id="46" title="Delete"> <i class="fas fa-trash"></i></a>
     </div>
      </td>
      
    </tr>';
}
//    <a href="firma-personel-guncelle.php?id=' . $user['id'] . '" target="_blank" class="btn btn-icon btn-sm btn-success ml-1"  title="Edit"> <i class="fas fa-pen"> </i></a>
