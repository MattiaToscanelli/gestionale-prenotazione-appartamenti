        <title>Cambia Password</title>
    </head>
    <body>
        <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="login-box bg-white box-shadow pd-30 border-radius-5 text-center">
                <img src="img/logo_transparent.png" alt="login" class="login-img">
                <h2 class="mb-30">Cambia Password</h2>
                <form method="POST" id="change_password_form" action="<?php echo URL.'cambiaPassword/modifyPassword';?>">
                    <p>Inserisci una nuova password, ripetila e poi premi Cambia. Dopodiché potrai utilizzare la nuova
                        password per accedere. La password deve avere almeno 8 caratteri e numero/carattere speciale.</p>
                    <div id="alert_validation" class="alert alert-danger" role="alert" style="display: none">
                        Le password non valide o non corrispondenti
                    </div>
                    <div class="input-group custom input-group-lg">
                        <input type="password" class="form-control" placeholder="Nuova Password" name="<?php echo PASSWORD; ?>">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i id="input_password" class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="input-group custom input-group-lg">
                        <input type="password" class="form-control" placeholder="Ripeti Nuova Password" name="<?php echo RE_PASSWORD; ?>">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i id="input_re_password" class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <a class="btn btn-primary btn-lg btn-block" onclick="checkAll()" style="color: white">Cambia</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/changePassword.js"></script>