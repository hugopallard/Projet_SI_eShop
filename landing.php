<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href=" css/landing.css">
    <title>Hello, world!</title>
</head>

<body>
    <nav class=" navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="images/myWineIcon.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                MyWine
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo03">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Our wines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Discover</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#footer">Contact us</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-primary d-flex" type="submit">Sign in</button>
        </div>
    </nav>
    <div id="content">
        <div class="container-fluid" id="landingBody">
            <div class="row" id="landingBody">
                <div class="col-6 p-0 d-flex align-items-center">
                    <img src="images/wineArt.png" alt="wine art" class="img-fluid">
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div class=" text-center">
                        <h1>Discover our wines</h1>
                        <h4 class="mb-5">Picked by our experts for you</h4>
                        <a class="btn btn-primary" href="#productBody" role="button">Discover</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pb-5" id="productBody">
            <div class="text-center pt-3 pb-5">
                <h2 id="productBodyTittle">Our most recent wines</h2>
            </div>
            <div class="row row-cols-4 g-5 pb-5">
                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-6">
                                <img src="images/wineBottle.png" class="img-fluid" alt="...">
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This
                                        is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit
                                        longer.
                                    </p>
                                </div>
                            </div>
                            <div class="d-grid p-3">
                                <button class="btn btn-primary" type="button">Discover</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col">
                                <img src="images/wineBottle.png" class="img-fluid rounded-start h-auto" alt="...">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit
                                        longer.
                                    </p>
                                </div>
                            </div>
                            <div class="d-grid p-3">
                                <button class="btn btn-primary" type="button">Discover</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col">
                                <img src="images/wineBottle.png" class="img-fluid rounded-start h-auto" alt="...">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit
                                        longer.
                                    </p>
                                </div>
                            </div>
                            <div class="d-grid p-3">
                                <button class="btn btn-primary" type="button">Discover</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col">
                                <img src="images/wineBottle.png" class="img-fluid rounded-start h-auto" alt="...">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit
                                        longer.
                                    </p>
                                </div>
                            </div>
                            <div class="d-grid p-3">
                                <button class="btn btn-primary" type="button">Discover</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-md-center">
                <div class="col-4 d-grid ps-5 pe-5">
                    <button class="btn btn-primary" type="button">More wine !</button>
                </div>
            </div>
        </div>
    </div>
    <div class=" container-fluid" id="aboutBody">
        <div class="text-center pt-3 pb-5">
            <h2>About us</h2>
        </div>
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center">
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
                    <a class="btn btn-primary" href="#productBody" role="button">Know more about us</a>
                </div>
            </div>
            <div class="col-6 p-0 d-flex align-items-center justify-content-end">
                <img src="images/wineStain.png" alt="wine art" class="img-fluid">
            </div>
        </div>
    </div>
    <footer class="bg-dark" id="footer">
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
                            <a href="mailto:hugo.pallard@epfedu.fr">hugo.pallard@epfedu.fr</a>
                        </div>
                        <div class="col-12 mb-2">
                            <p>+33 (0)6 95 50 16 82</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    © Hugo Pallard 2022
                </div>
            </div>
        </div>
    </footer>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>