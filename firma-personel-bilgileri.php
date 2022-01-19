<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firma_kullanici_adi'])) {

?>

    <html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Anasayfa</title>
        <link href="style/bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
        <script src="https://kit.fontawesome.com/1b3be615e6.js" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>



        <script>
            $(document).ready(function() {

                $('#example').DataTable();

            });
        </script>

    </head>

    <body style="background: linear-gradient(90deg, hsla(217, 100%, 50%, 1) 0%, hsla(186, 100%, 69%, 1) 100%);">

        <div class="container">
            <?php include "firma-navbar.php"; ?>

            <div class="" style="background:white; border-radius: 24px; margin-top: 15px;">
                <form class="row" action="personel_ekle.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center ">
                            <img class="rounded-circle " width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Resim Seçiniz</label>
                                <input class="form-control" type="file" id="formFile" name="resim">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 border-right">
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Personel Ekle</h4>
                            </div>
                            <div class="row ">
                                <div class="col-md-6"><label class="labels">Adı</label><input type="text" class="form-control" name="adi"></div>
                                <div class="col-md-6"><label class="labels">Soyadı</label><input type="text" class="form-control" value="" name="soyAdi"></div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12"><label class="labels">Pozisyon</label><input type="text" class="form-control" name="pozisyon"></div>
                                <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="email"></div>
                                <div class="col-md-12"><label class="labels">Tema Düzenle</label> <input class="form-check-input" name="durum" type="checkbox" id="flexCheckDefault">
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class=" text-center">
                        <button class="btn btn-primary profile-button" name="submit" type="submit">Save Profile</button>
                    </div>

                </form>
                <div class="p-3" style="margin-bottom: 15px;overflow-x:auto;">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Personel Bilgi</th>
                                <th>Tema</th>
                                <th>İşlem</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php include "personel_liste.php"; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Resimı</th>
                                <th>Personel Bilgi</th>
                                <th>Tema</th>
                                <th>İşlem</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['mesaj'])) { 
                        include "mesaj.php";
                        ?>
                        
                    <?php } ?>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>