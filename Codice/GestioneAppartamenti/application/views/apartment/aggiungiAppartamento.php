        <title>Gestione Appartamento</title>
    </head>
    <body>
        <div class="padding-top-100">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px mb-80">
                    <div class="pd-20 border-radius-4 mb-30 box-shadow bg-white pers-home">
                        <div class="text-center">
                            <img src="img/logo_transparent.png" alt="login" class="login-img" width="100px">
                            <h2 class="mb-30">Appartamento</h2>
                        </div>
                        <form method="POST" action="<?php echo URL."registrazione/insert/";?>" id="registration_form">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Titolo<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></label>
                                        <input type="text" class="form-control" name="<?php echo FIRST_NAME; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Via<span class="obligatory">*</span> <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></label>
                                        <input type="text" class="form-control" name="<?php echo STREET; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>CAP<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="4-5 numeri"></i></label>
                                        <input type="text" class="form-control" name="<?php echo NAP; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Città<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, lettere, numeri e caratteri da scrittura"></i></label>
                                        <input type="text" class="form-control" name="<?php echo CITY; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Prezzo giornaliero<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Cifra in CHF da pagare per un utilizzo giornaliero"></i></label>
                                        <input type="number" min="0" class="form-control" name="<?php echo NAP; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Prezzo mensile<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Cifra in CHF da pagare per un utilizzo mensile"></i></label>
                                        <input type="number" min="0" class="form-control" name="<?php echo CITY; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Numero Locali<span class="obligatory">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Minimo 1 locale, numeri interi o mezzi (0.5)"></i></label>
                                        <input id="range"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-20">
                                <div class="col-4">
                                    <label>Posteggio</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="parky" name="park" class="custom-control-input">
                                        <label class="custom-control-label" for="parky">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="parkn" name="park" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="parkn">No</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Disponibilità</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="availabley" name="available" class="custom-control-input">
                                        <label class="custom-control-label" for="availabley">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="" name="available" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="availablen">No</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Ammobiliato</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="furnishedy" name="furnished" class="custom-control-input">
                                        <label class="custom-control-label" for="furnishedy">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="furnishedn" name="furnished" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="furnishedn">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-20">
                                <div class="col-4">
                                    <label>Fumatori</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="smokingy" name="smoking" class="custom-control-input">
                                        <label class="custom-control-label" for="smokingy">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="smokingn" name="smoking" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="smokingn">No</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Animali</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="animalsy" name="animals" class="custom-control-input">
                                        <label class="custom-control-label" for="animalsy">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="animalsn" name="animals" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="animalsn">No</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Bambini</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="childreny" name="children" class="custom-control-input">
                                        <label class="custom-control-label" for="childreny">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="childrenn" name="children" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="childrenn">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label>Commenti</label>
                                    <div class="form-group">
                                        <textarea type="text" id="text_modal_input" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-10">
                                    <label>Foto</label>
                                    <button type="button" name="add" id="add" class="btn btn-success">Aggiungi foto</button>
                                </div>
                            </div>
                            <div id="dynamic_field">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendors/scripts/script.js"></script>
        <script src="src/plugins/ion-rangeslider/js/ion.rangeSlider.js"></script>
        <script>
            $("#range").ionRangeSlider({
                min: 1,
                from: 2.5,
                max: 10,
                step: 0.5
            });
        </script>
        <script src="js/addPhoto.js"></script>
