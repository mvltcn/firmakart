<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['admin_kullanici_adi'])) {

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
    <!------ Include the above in your HEAD tag ---------->
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

    <div class="container" >
        <?php include "admin_navbar.php"; ?>
        <div style="background:white; border-radius: 24px; margin-top: 15px;">
        <?php include "admin_firma_ekle.php"; ?>
        <div class="p-3" style="margin-bottom: 15px;overflow-x:auto;">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Firma Logo</th>
                                <th>Firma Adı</th>
                                <th>Firma Adres</th>
                                <th>Firma Email</th>
                                <th>Firma Telefon</th>
                                <th>Firma Website</th>
                                <th>Personel Sayısı</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php include "admin_firma_liste.php"; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Firma Logo</th>
                                <th>Firma Adı</th>
                                <th>Firma Adres</th>
                                <th>Firma Email</th>
                                <th>Firma Telefon</th>
                                <th>Firma Website</th>
                                <th>Personel Sayısı</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>  
    </div>
    <?php if (isset($_GET['mesaj'])) {
                include "mesaj.php";}
            ?>
    </div>
    </div>
</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>