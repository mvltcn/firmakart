<html>

<head>
    <meta charset="utf-8" />
    <title>Giriş</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>

<body style="background-image: url('arkaplan.jpg');background-size: cover;">

    <div class="container login-container">
    
        <div class="row">
            <div class="col-md-6 login-form-1" style=" background: white;">
                <h3>Firma Giriş</h3>
                <form action="firma_giris_kontrol.php" method="post">
                    
                    <div class="form-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Kullanıcı Adı*" name="fKullaniciAdi" value="" />
                    </div>
                    <div class="form-group mb-3 ">
                        <input type="password" class="form-control" placeholder="Şifre*" name="fSifre" value="" />
                    </div>
                    <div class="form-group mb-3 ">
                        <input type="submit" class="btnSubmit" value="Giriş Yap" type="submit" />
                    </div>
                    <div class="form-group mb-3 ">
                        <a href="#" class="ForgetPwd">Şifremi Unuttum?</a>
                    </div>
                </form>
                <?php if (isset($_GET['mesaj'])) { 
                        include "mesaj.php";
                        ?>
                        
                    <?php } ?>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Kullanıcı Giriş</h3>
                <form action="personel_giris_kontrol.php" method="post">
                    <div class="form-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Email *" name="pEmail" value="" />
                    </div>
                    <div class="form-group mb-3 ">
                        <input type="password" class="form-control" placeholder="Şifre *" name="pSifre" value="" />
                    </div>
                    <div class="form-group mb-3 ">
                        <input type="submit" class="btnSubmit" value="Giriş Yap" name="submit" />
                    </div>
                    <div class="form-group mb-3 ">

                       <a href="#" class="ForgetPwd" value="Login">Şifremi Unuttum?</a>
                    </div>
                </form>
            </div>




        </div>
    </div>
</body>

</html>