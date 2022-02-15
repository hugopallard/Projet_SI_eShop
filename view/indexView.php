<?php $tittle = "MyWine"; ?>
<?php $alert = NULL; ?>

<?php ob_start(); ?>

<!-- Script -->
<div id="content">
    <div id="carouselExampleSlidesOnly" class="carousel carousel-dark slide" data-bs-ride="carousel" style="height: 100vh;">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 100vh;">
                <picture>
                    <source media="(min-width:1440px)" srcset="public/images/wineBigScreen.png">
                    <source media="(min-width:1024px)" srcset="public/images/wineLittleScreen.jpg">
                    <source media="(min-width:768px)" srcset="public/images/wineTablette.jpg">
                    <source media="(min-width:320px)" srcset="public/images/wineMobile.jpeg">
                    <img src="public/images/wineBigScreen.png">
                </picture>
                <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="color:white">
                    <h1>Discover our wines</h1>
                    <h4 class="mb-5">Picked by our experts for you</h4>
                    <div class="container"><a class="btn btn-primary" href="#productBody" role="button">Discover</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5" id="productBody">
        <div class="text-center pt-3 pb-5">
            <h2 id="productBodyTittle">Our most recent wines</h2>
        </div>
        <div class="row g-5 pb-5 justify-content-center">
            <?php
            while ($donnees = $req->fetch()) {
            ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-6">
                                <img src="public/images/wineBottle.png" class="img-fluid" alt="...">
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($donnees['Name']); ?></h5>
                                    <p class="card-text">
                                        <?= htmlspecialchars($donnees['Description']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="d-grid p-3">
                                <button class="btn btn-primary" type="button">Discover</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            $req->closeCursor();
            ?>
        </div>
    </div>
    <div class=" container-fluid" id="aboutBody">
        <div class="text-center pt-3 pb-5">
            <h2>About us</h2>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class=" text-center">
                    <h3>We are an team of expert</h3>
                    <h4 class="mb-3">Our values are:</h4>
                    <div class="container mb-5">
                        <div class="row">
                            <div class="col-12">
                                <h5>Quality</h5>
                            </div>
                            <div class="col-12">
                                <h5>Client-first</h5>
                            </div>
                            <div class="col-12">
                                <h5>Audacity</h5>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="#productBody" role="button">Know more about
                        us</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 p-0 d-flex align-items-center justify-content-end">
                <img src="public/images/wineStain.png" alt="wine art" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>