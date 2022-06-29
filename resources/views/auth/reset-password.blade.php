<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Geeks is a fully responsive and yet modern premium bootstrap 5 template & snippets. Geek is feature-rich components and beautifully designed pages that help you create the best possible website and web application projects. Bootstrap Snippet " />
    <meta name="keywords"
        content="Geeks UI, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon"
        href="https://codescandy.com/geeks-bootstrap-5/assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/fonts/feather/feather.css" rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assetslibs/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet" />
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/@mdi/font/css/materialdesignicons.min.css"
        rel="stylesheet" />
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/magnific-popup/dist/magnific-popup.css"
        rel="stylesheet" />
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css"
        rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link
        href="https://codescandy.com/geeks-bootstrap-5/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/prismjs/themes/prism-okaidia.min.css"
        rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/nouislider/dist/nouislider.min.css"
        rel="stylesheet">
    <link href="https://codescandy.com/geeks-bootstrap-5/assets/libs/glightbox/dist/css/glightbox.min.css"
        rel="stylesheet">










    <!-- Theme CSS -->
    <link rel="stylesheet" href="https://codescandy.com/geeks-bootstrap-5/assets/css/theme.min.css">
    <title>Esqueceu a senha | Trinity Finances</title>
</head>
<!-- Page Content -->

<body>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <h1 class="mb-1 fw-bold">Resetar a sua senha</h1>
                            <p>Digite uma nova senha, por favor!</p>
                        </div>
                        <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="fw-bold text-danger mb-2">
                                Opa! Algo deu errado.
                            </div>

                            <ul class="fw-light text-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Form -->
                        <form action="{{ route('password-reset.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="token" value="{{ Request::segment(3) }}" />
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Digite sua senha" required />
                            </div>
                            <!-- Password Confirm -->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmar senha</label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                                    placeholder="Repita sua senha" required />
                            </div>
                            <!-- Button -->
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Modificar a senha
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/odometer/odometer.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/quill/dist/quill.min.js"></script>
    <script
        src="https://codescandy.com/geeks-bootstrap-5/assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/prismjs/prism.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/datatables.net/js/jquery.dataTables.min.js">
    </script>
    <script
        src="https://codescandy.com/geeks-bootstrap-5/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js">
    </script>
    <script
        src="https://codescandy.com/geeks-bootstrap-5/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="https://codescandy.com/geeks-bootstrap-5/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js">
    </script>
    <script
        src="https://codescandy.com/geeks-bootstrap-5/assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/fullcalendar/main.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/@lottiefiles/lottie-player/dist/lottie-player.js">
    </script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/nouislider/dist/nouislider.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/wnumb/wNumb.min.js"></script>
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/glightbox/dist/js/glightbox.min.js"></script>



    <!-- CDN File for moment -->
    <script src='https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js'></script>


    <!-- Theme JS -->
    <script src="https://codescandy.com/geeks-bootstrap-5/assets/js/theme.min.js"></script>
</body>
</html>
