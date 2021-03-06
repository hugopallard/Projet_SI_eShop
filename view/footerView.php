<?php ob_start(); ?>

<footer id="footer" style="background-color:black; color:white">
    <div class="text-center pt-3">
        <h4 id="contactTitleStyling">More information about MyWine !</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 text-center">
                <div class="row pt-4 pb-4 pt-md-5">
                    <div class="col-12 mb-4">
                        <p>Our story</p>
                    </div>
                    <div class="col-12 mb-4">
                        <p>Winemaking</p>
                    </div>
                    <div class="col-12 mb-4">
                        <p>Jobs</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <div class="row pt-4 pb-4 pt-md-5">
                    <div class="col-12 mb-2">
                        <p>Fontenay-aux-Roses, FAR 92260, FR</p>

                    </div>
                    <div class="col-12 mb-2">
                        <a href="mailto:hugo.pallard@epfedu.fr">contact@myWine.fr</a>
                    </div>
                    <div class="col-12 mb-2">
                        <p>+33 (0)1 02 03 04 05</p>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                © MyWine 2022
            </div>
        </div>
    </div>
</footer>
<?php $footer = ob_get_clean(); ?>

<?php require('view/template.php'); ?>