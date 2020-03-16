        <title>Login</title>
    </head>
    <body>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="login-box bg-white box-shadow pd-30 border-radius-5">
                <img src="img/logo_transparent.png" alt="login" class="login-img">
                <h2 class="text-center mb-30">Login</h2>
                <div id="alert_validation_login" class="alert alert-danger" role="alert" style="display: none">
                    Email o password errati!
                </div>
                <div id="alert_validation_login_s" class="alert alert-success" role="alert" style="display: none">
                    Accesso eseguito
                </div>
                <form>
                    <div class="input-group custom input-group-lg">
                        <input type="email" class="form-control" placeholder="E-mail">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="input-group custom input-group-lg">
                        <input type="password" class="form-control" placeholder="**********">
                        <div class="forgot-password padding-top-10"><a href="<?php echo URL.'passworddimenticata'; ?>">Password Dimenticata?</a></div>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <a class="btn btn-primary btn-lg btn-block" onclick="login()" style="color: white">Accedi</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo URL.'registrazione'; ?>">Registrati</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/login.js"></script>