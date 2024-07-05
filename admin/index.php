<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <style>
            body {
                overflow-x: hidden;
            }

            .gradient-custom-2 {
                /* fallback for old browsers */
                background: #fccb90;
                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(109.6deg, rgb(51, 236, 236) 11.2%, rgb(24, 39, 231) 91.1%);
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(109.6deg, rgb(51, 236, 236) 11.2%, rgb(24, 39, 231) 91.1%);
            }

            @media (min-width: 768px) {
                .gradient-form {
                    height: 100vh !important;
                }
            }

            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }
        </style>
    </head>
    <body>
        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">
                                        <div class="text-center">
                                            <img src="/img/login_image.png" style="width: 200px;" alt="logo">
                                            <h1 class="mt-1 mb-3 pb-1">Computer Laboratory <br>Management System </h1>
                                        </div>
                                        <form action="login.php" method="post">
                                            <p>Please login to your account.<span class="badge bg-secondary ms-3">Admin</span></p>
                                            <?php if (isset($_GET['error'])) { ?> <p class="error"> <?php echo $_GET['error']; ?> </p> <?php } ?> <div data-mdb-input-init class="form-outline mb-3">
                                                <input type="text" name="username" id="form2Example11" class="form-control" placeholder="Username" />
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-3">
                                                <input type="password" name="password" id="form2Example22" class="form-control" placeholder="Password" />
                                            </div>
                                            <div class="text-center pt-1 d-grid">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                                                <button class="btn btn-secondary btn-block mb-3" type="submit"><a href="/index.php" class="text-white text-decoration-none">Back to Home</a></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                        <h2 class="mb-4">&#8220;Innovating our daily lives with technology while shaping the future of the Next Generation.&#8221;</h2>
                                        <p class="mb-0">Empowering our students to fulfill their academic and professional passions in a University that is diverse, welcoming, and inclusive for all students, faculty, and staff. Creating innovative connections among education, humanities, music, the social sciences, science, engineering, and health science.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>