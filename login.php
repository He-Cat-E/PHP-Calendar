<?php include 'inc/header.php'; ?>
<style>
	.register{height: 350px; }
	.register-dark{margin-top: -140px;}
</style>



    <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0 effect-cls">
        <img src="../assets/images/parallax/clinic-booking.webp" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div class="text-dark">
                    <h2>Login</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URL?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->      

    <!-- section start -->
    <section>
        <div class="container">
            <div class="row log-in sign-up">                
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                    <div class="theme-card">
                        <div class="title-3 text-start">
                            <h2>Login</h2>
                        </div>
                        <form action="assets/php/login.php" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="mail"></i>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Enter email address" required name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" id="pwd-input" class="form-control" placeholder="Password" maxlength="8" required name="password">
                                    <div class="input-group-apend">
                                        <div class="input-group-text">
                                            <i id="pwd-icon" class="far fa-eye-slash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Login</button>
                                <a href="<?=URL?>register.php" class="btn btn-dashed btn-pill color-2">Create Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
<?php include 'inc/footer.php'; ?>