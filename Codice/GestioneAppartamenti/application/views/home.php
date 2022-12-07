        <title>Home</title>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="img/logo_transparent.png" width="30" height="30" class="d-inline-block align-top">
                FastRent
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ricerca Appartamenti</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="padding-top-100">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="pd-20 border-radius-4 mb-30 text-center box-shadow bg-white pers-home">
                        <img src="img/logo_transparent.png" alt="login" class="login-img" width="100px">
                        <h2 class="text-center mb-30">Home</h2>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for($i = 0; $i < count($pictures); $i++): ?>
                                    <?php if($i == 0): ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <?php else: ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php for($i = 0; $i < count($pictures); $i++): ?>
                                    <?php if($i == 0): ?>
                                        <div class="carousel-item active" style="background-image: url(<?php echo $pictures[$i][DB_PATH_PHOTO]; ?>); background-color: grey"></div>
                                    <?php else: ?>
                                        <div class="carousel-item" style="background-image: url(<?php echo $pictures[$i][DB_PATH_PHOTO]; ?>);background-color: grey"></div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-wrap m-news">
                        <div class="container pd-0">
                            <div class="row">
                                <div class="pers-home">
                                    <div class="blog-list">
                                        <ul>
                                            <?php for($i = 0; $i < count($news); $i++): ?>
                                                <li>
                                                    <div class="row no-gutters box-shadow ">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="blog-caption">
                                                                <h4><?php echo date("d-m-Y", strtotime($news[$i][DB_NEWS_DATE])).", ".$news[$i][DB_NEWS_TITLE]; ?></h4>
                                                                <div class="blog-by">
                                                                    <p><?php echo $news[$i][DB_NEWS_TEXT]; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
