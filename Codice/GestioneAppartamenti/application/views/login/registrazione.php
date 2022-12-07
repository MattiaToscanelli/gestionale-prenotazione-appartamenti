    <title>Registrazione</title>
    </head>
    <body>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="login-box bg-white box-shadow pd-30 border-radius-5" style="max-width: 1000px;margin-bottom: 20px">
                <img src="img/logo_transparent.png" alt="login" class="login-img">
                <h2 class="text-center mb-30">Registrazione</h2>
                <div id="alert_validation" class="alert alert-danger" role="alert" style="display: none">
                    Uno o più campi della registrazione non sono validi!
                </div>
                <form method="POST" action="<?php echo URL."registrazione/insert/";?>" id="registration_form">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nome<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></label>
                                <input type="text" class="form-control" name="<?php echo FIRST_NAME; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Cognome<span class="obligatory">*</span> <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></label>
                                <input type="text" class="form-control" name="<?php echo SURNAME; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Via<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, lettere, numeri e caratteri da scrittura"></i></label>
                                <input type="text" class="form-control" name="<?php echo STREET; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>CAP<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="4-5 numeri"></i></label>
                                <input type="text" class="form-control" name="<?php echo NAP; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Città<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></label>
                                <input type="text" class="form-control" name="<?php echo CITY; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Numero telefono mobile<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="10-14 numeri"></i></label>
                                <input type="text" class="form-control" name="<?php echo MOBILE_NUMBER; ?>" onkeydown="fixNumber(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Numero telefono ufficio</label> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="10-14 numeri"></i>
                                <input type="text" class="form-control" name="<?php echo OFFICE_NUMBER; ?>" onkeydown="fixNumber(this)">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Numero telefono fisso</label> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="10-14 numeri"></i>
                                <input type="text" class="form-control" name="<?php echo LANDLINE_NUMBER; ?>" onkeydown="fixNumber(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>E-mail<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Fomato email: testo@testo.testo"></i></label>
                                <input type="email" class="form-control" name="<?php echo EMAIL; ?>">
                                <div id="alert_validation_email" class="alert alert-danger" role="alert" style="display: none; margin: 7px;">
                                    Email già esistente o dominio non valido!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Password<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="8 caratteri e numero/carattere speciale"></i></label>
                                <input type="password" class="form-control" name="<?php echo PASSWORD; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Re-Password<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Ripetere la password"></i></label>
                                <input type="password" class="form-control" name="<?php echo RE_PASSWORD; ?>">
                            </div>
                        </div>
                    </div>
                </form>
                <span class="obbligatorio"><span class="obligatory">*</span>campi da compilare</span>
                <div class="row mt-15">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <a class="btn btn-primary btn-lg btn-block" onclick="checkAll()" style="color: white">Registrati</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo URL.'login'; ?>">Accedi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/registration.js"></script>