        <title>Pannello Admin</title>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo URL; ?>">
                <img src="../../../img/logo_transparent.png" width="30" height="30" class="d-inline-block align-top">
                FastRent
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo URL; ?>">Pannello Admin<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ricerca Appartamenti</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="padding-top-100 mb-80">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30 pers-home">
                        <div class="text-center">
                            <img src="../../../img/logo_transparent.png" alt="login" class="login-img" width="100px">
                            <h2 class="text-center mb-30">Pannello Admin</h2>
                        </div>
                        <h4 class="mb-30">Gestione utenti</h4>
                        <div class="table-responsive module" style="max-height: 300px">
                            <table class="table text-center">
                                <thead class="dark">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Cognome</th>
                                        <th>Email</th>
                                        <th colspan="3">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $user[DB_USER_NAME]; ?></td>
                                        <td class="align-middle"><?php echo $user[DB_USER_SURNAME]; ?></td>
                                        <td class="align-middle"><?php echo $user[DB_USER_EMAIL]; ?></td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-primary btn-fix-panel-control" data-toggle="modal" data-target="#infoModal" onclick="getInfoUser('<?php echo $user[DB_USER_EMAIL]; ?>')">Info <i class="fa fa-info-circle"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-warning btn-fix-panel-control" data-toggle="modal" data-target="#modifyModal" onclick="getDataModifyUser('<?php echo $user[DB_USER_EMAIL]; ?>')">Modifica <i class="fa fa-pencil-square-o"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-danger btn-fix-panel-control" data-toggle="modal" data-target="#deleteModal" onclick="getInfoUser('<?php echo $user[DB_USER_EMAIL]; ?>')">Elimina <i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Modal Info-->
                            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Dati</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body font-18">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Nome</th>
                                                    <td><span id="name_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Cognome</th>
                                                    <td><span id="surname_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><span id="email_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Via</th>
                                                    <td><span id="street_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Città</th>
                                                    <td><span id="city_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>CAP</th>
                                                    <td><span id="nap_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <td><span id="type_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Numero telefono mobile</th>
                                                    <td><span id="mobile_number_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Numero telefono fisso</th>
                                                    <td><span id="landline_number_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Numero telefono ufficio</th>
                                                    <td><span id="office_number_modal"></span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Modify-->
                            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifica</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body font-18">
                                            <div id="alert_validation" class="alert alert-danger" role="alert" style="display: none">
                                                Uno o più campi della non sono validi!
                                            </div>
                                            <div id="alert_validation_s" class="alert alert-success" role="alert" style="display: none">
                                                Dati modificati!
                                            </div>
                                            <form id="form_admin_panel">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nome <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></th>
                                                            <td><input type="text" id="name_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Cognome <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></th>
                                                            <td><input type="text" id="surname_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Via <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, lettere, numeri e caratteri da scrittura"></i></th>
                                                            <td><input type="text" id="street_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Città <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-50 caratteri, solo lettere e caratteri da scrittura"></i></th>
                                                            <td><input type="text" id="city_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>CAP <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="4-5 numeri"></i></th>
                                                            <td><input type="text" id="nap_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tipo <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Utente registrato (utente che puo effetturare riservazioni), Utente verificato (utente che può essere anche un proprietario) e Admin (utente che gestisce la pagina)"></i></th>
                                                            <td>
                                                                <select class="form-control" id="type_modal_input">
                                                                    <option value="1">Utente registrato</option>
                                                                    <option value="3">Utente verificato</option>
                                                                    <option value="7">Admin</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Numero telefono mobile <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="10-14 numeri"></i></th>
                                                            <td><input type="text" id="mobile_number_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Numero telefono fisso <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="10-14 numeri"></i></th>
                                                            <td><input type="text" id="landline_number_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Numero telefono ufficio <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="10-14 numeri"></i></th>
                                                            <td><input type="text" id="office_number_modal_input" class="form-control"></td>
                                                        </tr>
                                                        <input type="hidden" id="email_modal_input" disabled>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="saveDataUser()">Salva</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal Delete-->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Elimina</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body font-18">
                                            <div id="alert_del" class="alert alert-success" role="alert" style="display: none">
                                                Utente eliminato!
                                            </div>
                                            <div class="text-center">
                                                <img src="../../../img/warning.png" height="100px" width="100px">
                                                <p>Sei sicuro di voler eliminare questo utente?</p>
                                            </div>
                                        </div>
                                        <input type="hidden" id="email_modal_input_del" disabled>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" onclick="deleteUser()">Elimina</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <link rel="stylesheet" type="text/css" href="../../../src/plugins/dropzone/src/dropzone.css">
                        <h4 class="mb-30 mt-80">Gestione Pagina Principale</h4>
                        <h5 class="mb-10">Foto</h5>
                        <div class="col-lg-12 col-sm-12 col-md-12 pd-0">
                            <div class="col-lg-4 col-sm-6 pd-0">
                                <div class="input-group pd-0">
                                    <a class="btn btn-link mb-10 pd-0" href="#" data-toggle="modal" data-target="#addFotoModal" onclick="clearModalFoto()">Aggiungi Foto</a>
                                </div>
                            </div>
                        </div>
                        <div id="news" class="table-responsive module mb-30" style="max-height: 300px">
                            <table class="table text-center">
                                <thead class="dark">
                                <tr>
                                    <th>Immagine</th>
                                    <th colspan="3">Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($photos as $p): ?>
                                    <tr>
                                        <td class="align-middle"><img src="<?php echo $p[DB_PATH_PHOTO]; ?>" width=150px></td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-danger btn-fix-panel-control" data-toggle="modal" data-target="#deletePhotoModal" onclick="getInfoPhoto('<?php echo $p[DB_ID_PHOTO]; ?>')">Elimina <i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal Add-->
                        <div class="modal fade" id="addFotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aggiungi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body font-18">
                                        <div id="alert_validation_photo_add_file" class="alert alert-danger" role="alert" style="display: none">
                                            Aggiungi una foto attraverso la voce "Scegli file"
                                        </div>
                                        <div id="alert_validation_photo_add_os" class="alert alert-danger" role="alert" style="display: none">
                                            Il sistema operativo dove gira il servizio non supporta l'aggiunta di foto!
                                        </div>
                                        <div id="alert_validation_photo_add_specific" class="alert alert-danger" role="alert" style="display: none">
                                            L'immagine inserita non è valida!
                                        </div>
                                        <div id="alert_validation_photo_add_ok" class="alert alert-success" role="alert" style="display: none">
                                            Foto aggiunta!
                                        </div>
                                        <form id="form_admin_panel_photo_add">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Seleziona foto <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Estensioni supportate: .png .jpg .jpeg .gif (Max 5MB) Formato consigliato 16:9"></i></th>
                                                    <td><input type="file" id="files" accept=".png, .jpg, .jpeg .gif"></td>
                                                </tr>
                                                <tr>
                                                    <th>Preview </th>
                                                    <td class="w-100">
                                                        <div class="image-wrapper">
                                                            <img id="image"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="addDataPhoto()">Aggiungi</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deletePhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Elimina</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body font-18">
                                        <div id="alert_del_photo" class="alert alert-success" role="alert" style="display: none">
                                            Foto eliminata!
                                        </div>
                                        <div class="text-center">
                                            <img src="../../../img/warning.png" height="100px" width="100px">
                                            <p>Sei sicuro di voler eliminare questa Foto?</p>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id_modal_input_del_foto" disabled>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" onclick="deletePhoto()">Elimina</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="clearfix"></span>
                        <h5 class="mb-10">Notizie</h5>
                        <div class="col-lg-12 col-sm-12 col-md-12 pd-0">
                            <div class="col-lg-4 col-sm-6 pd-0">
                                <div class="input-group pd-0">
                                    <a class="btn btn-link mb-10 pd-0" href="#" data-toggle="modal" data-target="#addNewsModal" onclick="clearModal()">Aggiungi Notizia</a>
                                </div>
                            </div>
                        </div>
                        <div id="news" class="table-responsive module" style="max-height: 300px">
                            <table class="table text-center">
                                <thead class="dark">
                                <tr>
                                    <th>Data inserimento</th>
                                    <th>Titolo</th>
                                    <th colspan="3">Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($news as $n): ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $n[DB_NEWS_DATE]; ?></td>
                                        <td class="align-middle"><?php echo $n[DB_NEWS_TITLE]; ?></td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-primary btn-fix-panel-control" data-toggle="modal" data-target="#infoNewsModal" onclick="getInfoNews('<?php echo $n[DB_NEWS_ID]; ?>')">Info <i class="fa fa-info-circle"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-warning btn-fix-panel-control" data-toggle="modal" data-target="#modifyNewsModal" onclick="getDataModifyNews('<?php echo $n[DB_NEWS_ID]; ?>')">Modifica <i class="fa fa-pencil-square-o"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="align-middle">
                                                <button style="width: 130px" type="button" class="btn btn-outline-danger btn-fix-panel-control" data-toggle="modal" data-target="#deleteInfoModal" onclick="getInfoNews('<?php echo $n[DB_NEWS_ID]; ?>')">Elimina <i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal Add-->
                        <div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aggiungi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body font-18">
                                        <div id="alert_validation_news_add" class="alert alert-danger" role="alert" style="display: none">
                                            Uno o più campi della non sono validi!
                                        </div>
                                        <div id="alert_validation_s_news_add" class="alert alert-success" role="alert" style="display: none">
                                            Notizia aggiunta!
                                        </div>
                                        <form id="form_admin_panel_news_add">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Titolo <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-100 caratteri, lettere, numeri e caratteri da scrittura"></i></th>
                                                        <td><input type="text" id="title_modal_input_add" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Descrizione <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo lettere, numeri e caratteri da scrittura"></i></th>
                                                        <td><textarea type="text" id="text_modal_input_add" class="form-control"></textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="addDataNews()">Aggiungi</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Info-->
                        <div class="modal fade" id="infoNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Dati</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body font-18">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Data Pubblicazione</th>
                                                    <td><span id="date_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Titolo</th>
                                                    <td><span id="title_modal"></span></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Descrizione</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><span id="text_modal"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Modify-->
                        <div class="modal fade" id="modifyNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifica</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body font-18">
                                        <div id="alert_validation_news" class="alert alert-danger" role="alert" style="display: none">
                                            Uno o più campi della non sono validi!
                                        </div>
                                        <div id="alert_validation_s_news" class="alert alert-success" role="alert" style="display: none">
                                            Notizia modificata!
                                        </div>
                                        <form id="form_admin_panel_news">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Titolo <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="3-100 caratteri, lettere, numeri e caratteri da scrittura"></i></th>
                                                        <td><input type="text" id="title_modal_input" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Descrizione <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo lettere, numeri e caratteri da scrittura"></i></th>
                                                        <td><textarea type="text" id="text_modal_input" class="form-control"></textarea></td>
                                                    </tr>
                                                    <input type="hidden" id="id_modal_input" disabled>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="saveDataNews()">Salva</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete-->
                        <div class="modal fade" id="deleteInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Elimina</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body font-18">
                                        <div id="alert_del_news" class="alert alert-success" role="alert" style="display: none">
                                            Notizia eliminata!
                                        </div>
                                        <div class="text-center">
                                            <img src="../../../img/warning.png" height="100px" width="100px">
                                            <p>Sei sicuro di voler eliminare questa Notizia?</p>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id_modal_input_del" disabled>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" onclick="deleteNews()">Elimina</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../vendors/scripts/script.js"></script>
        <script src="../../../js/manageUser.js"></script>
        <script src="../../../js/managePhoto.js"></script>
        <script src="../../../js/manageNews.js"></script>
        <script src="../../../js/adminPanel.js"></script>

