<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>Log In | Inmuebles Marco - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/config.js"></script>
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block card shadow-lg rounded my-5 overflow-hidden">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                                            <a href="index.html" class="logo-dark">
                                                <span><img src="assets/images/logo-dark.png" alt="" height="32"></span>
                                            </a>

                                            <a href="index.html" class="logo-light">
                                                <span><img src="assets/images/logo-light.png" alt="" height="32"></span>
                                            </a>
                                        </div>


                                        <h1 class="h5 mb-1">Bienvenido!</h1>

                                        <p class="text-muted mb-4">Enter your email address and password to access admin
                                            panel.</p>

                                        <form action="#">

                                            <div class="form-group mb-3">
                                                <label class="form-label" for="usuario">Usuario</label>
                                                <input class="form-control" type="text" id="usuario" required="" name="usuario"
                                                    placeholder="Enter your usuario">
                                            </div>

                                            <div class="form-group mb-3">
                                                <a href="pages-recoverpw.html"
                                                    class="text-muted float-end"><small></small></a>
                                                <label class="form-label" for="pass">Password</label>
                                                <input class="form-control" type="password" required="" id="password" name="password"
                                                    placeholder="Enter your password">
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-signin"
                                                        checked>
                                                    <label class="form-check-label ms-2" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary w-100" type="button" id="btnValidar"> Log In </button>
                                            </div>
                                        </form>


                                        <div class="text-center mt-4">
                                            <h5 class="text-muted font-size-16">Sign in using</h5>

                                            <ul class="list-inline mt-3 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-primary text-primary"><i
                                                            class="mdi mdi-facebook"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-danger text-danger"><i
                                                            class="mdi mdi-google"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-info text-info"><i
                                                            class="mdi mdi-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-secondary text-secondary"><i
                                                            class="mdi mdi-github"></i></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-2">
                                                    <a class="text-muted font-weight-medium ms-1"
                                                        href='pages-recoverpw.html'>Forgot your password?</a>
                                                </p>
                                                <p class="text-muted mb-0">Don't have an account?
                                                    <a class="text-muted font-weight-medium ms-1"
                                                        href='pages-register.html'><b>Sign Up</b></a>
                                                </p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
<script>
$( document ).ready(function() {
    $("#btnValidar").click(function(){
           let usuario=$("#usuario").val();  
           let pass=$("#password").val();
            let error=0;
          
           if(usuario==""){
               
               error=1;
               $("#usuario_error").html("Debe introducir un nombre de usuario");
                $("#usuario").addClass("borderError");
           }
        
           if(pass==""){
               
               error=1;
               $("#password_error").html("Debe introducir una contraseña");
               $("#password").addClass("borderError");
           }
        if(error==0){
            //$("#form1").submit();
             $.ajax({
                 data:{usuario:usuario,pass:password},
                 method:"POST",
                 url: "verificar.php", 
                 success: function(result){
                    
                     if(result==0){
                        $("#errorV").html("usuario o contraseña incorrectos");
                        $("#usuario").val(''); 
                         $("#pass").val(''); 
                     }else{
                         location.href="index.php";
                     }
                }
             });
        }
         
    });
    
   
     $("#usuario").on('keyup', function(){
         $("#errorV").html("");
        var value = $(this).val().length;
        if(value>0){
            $("#usuario_error").html("");
            $("#usuario").removeClass("borderError");
        }else{
           $("#usuario_error").html("Debe introducir un nombre de usuario");
           $("#usuario").addClass("borderError"); 
        }
    })
    
    $("#password").on('keyup', function(){
        $("#errorV").html("");
        var value = $(this).val().length;
        if(value>0){
            $("#password_error").html("");
            $("#password").removeClass("borderError");
        }else{
           $("#password_error").html("Debe introducir una password");
           $("#password").addClass("borderError"); 
        }
    })
    
});      
      
</script>
</body>

</html>