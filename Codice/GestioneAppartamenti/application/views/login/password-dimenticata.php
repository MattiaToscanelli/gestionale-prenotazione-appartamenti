        <title>Password Dimenticata?</title>
    </head>
    <body>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="login-box bg-white box-shadow pd-30 border-radius-5">
                <img src="img/logo_transparent.png" alt="login" class="login-img">
                <h2 class="text-center mb-30">Password Dimanticata?</h2>
                <form method="POST" action="<?php echo URL; ?>passwordDimenticata/sendEmail" id="send_link_psw">
                    <p>Inserisci la tua email per cambiare la password</p>
                    <div class="input-group custom input-group-lg">
                        <input type="text" class="form-control" placeholder="Email" name="<?php echo EMAIL; ?>">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input class="btn btn-primary btn-lg btn-block" type="button" value="Invia" onclick="waitSend()"></input>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="forgot-password"><a href="<?php echo URL.'login'; ?>" class="btn btn-outline-primary btn-lg btn-block">Accedi</a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/changePassword.js"></script>