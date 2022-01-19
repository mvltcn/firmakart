<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['personel_email'])) {

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!------ Include the above in your HEAD tag ---------->

    </head>

    <body style="background: linear-gradient(90deg, hsla(217, 100%, 50%, 1) 0%, hsla(186, 100%, 69%, 1) 100%);">

        <div class="container">

            <?php
            include "personel_navbar.php";
            ?>

            <div class="row" style="margin-top:15px;margin-bottom:15px">


            <?php
            include "personel_bilgileri.php";
            ?>
            </div>

            <?php if (isset($_GET['mesaj'])) {
                include "mesaj.php";
            ?>

            <?php } ?>









        </div>


    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>