<?php
echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 20px; margin-top:15px">
<div class="container-fluid" >
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="firma-home.php">Firma Bilgileri</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="firma-personel-bilgileri.php">Personel Bilgileri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="firma-kartvizit.php">Kartvizit Tema</a>
        </li>
            
        </ul>
            
        <a class="btn btn-primary" href="logout.php" role="button">Çıkış</a>
        </div>
</div>
</nav>
';
?>