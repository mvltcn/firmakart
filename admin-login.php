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

<body >

    <div class="container login-container">
    
        <div class="row justify-content-center">
            <div class="col-md-6 login-form-1">
                <h3>Admin Giriş</h3>
                <form action="admin_giris_kontrol.php" method="post">

                    
                    
                    <div class="form-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Your Email *" name="aKullaniciAdi" value="" />
                    </div>
                    <div class="form-group mb-3 ">
                        <input type="password" class="form-control" placeholder="Your Password *" name="aSifre" value="" />
                    </div>
                    <div class="form-group mb-3 ">
                        <input type="submit" class="btnSubmit" value="Login" type="submit" />
                    </div>
                    <div class="form-group mb-3 ">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div>
                </form>
                <?php if (isset($_GET['mesaj'])) { 
                        include "mesaj.php";
                        ?>
                        
                    <?php } ?>
            </div>
            




        </div>
    </div>
</body>

</html>