<?php

include "db_conn.php";


$sorgu = "SELECT *  FROM firma LEFT JOIN (SELECT firma_id, COUNT(*) AS personel FROM personel GROUP BY firma_id ) as dd ON firma.id=dd.firma_id ";
$sorguSonucu = mysqli_query($conn, $sorgu,);





while ($user = mysqli_fetch_assoc($sorguSonucu)) {
  echo '<tr>
      
      <td> <div class="card-views"><img alt="image" src="firmalogo/' . $user['firma_logo'] . '" style=" margin:auto;display: block; width: auto;  height: 20px;   object-fit: cover;  "> <div class="card-view"> </td>
      <td><span class="">' . $user['firma_adi'] . '</span><br></td>
      <td><span class="">' . $user['firma_adres'] . '</span><br></td>
      <td><span class="">' . $user['firma_email'] . '</span><br></td>
      <td><span class="">' . $user['firma_telefon'] . '</span><br></td>
      <td><span class="">' . $user['firma_website'] . '</span><br></td>
      <td><span class="">' . $user['personel'] . '</span><br></td>


   
      
      
    </tr>';
    
}
