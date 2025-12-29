<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN | AKADEMIK</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center" style="min-height:85vh;">
            <div class="card shadow-sm" style="width:380px;">
                <div class="card-body p-4">
                    <h4 class="text-center mb-3 fw-bold">Login</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>
                    <?php
                        require 'koneksi.php';
                        if(isset($_POST['email'])){
                            $email = $_POST['email'];
                            $pass = md5($_POST['password']);
                            
                            //cek login
                            $ceklogin = "SELECT * FROM pengguna WHERE email='$email' AND password='$pass'";
                            $result = $db->query($ceklogin);
                            
                            if($result->num_rows > 0){
                                //echo 'Login Berhasil';
                                session_start();
                                $_SESSION['login'] = TRUE;
                                $_SESSION['email'] = $email;
                                header("Location: index.php");
                            }else{
                                echo "Login gagal!";
                            }

                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>