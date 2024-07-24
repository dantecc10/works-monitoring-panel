<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Panel de obras - BM Design</title>
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta name="description" content="Plataforma de administración de obras y construcción.">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Obras - BM Design MX",
            "url": "https://obras.bmdesign.tech"
        }
    </script>
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=39f612d0af5b74e3058ab6d89e114e6a">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/works.css?h=71109f22e86348a03b655ed3bb0d13e2">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion main-gradient p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0 text-center"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon" style="height: inherit;"><img src="assets/img/logo-nuevo.png?h=711ccbc97e4ced0154104052a5d1796c" style="height: inherit;"></div>
                    <div class="sidebar-brand-text mx-3"><span>Obras - BMD</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light text-center" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link text-center color-5 fw-bolder fs-6" href="index-old.html"><i class="fas fa-tachometer-alt" style="color: rgba(247, 92, 3, 0.7) !important;"></i><span>Panel</span></a></li>
                    <li class="nav-item"><a class="nav-link text-center color-5 fw-bolder fs-6" href="table.html"><i class="far fa-list-alt" style="color: rgba(247, 92, 3, 0.7) !important;"></i><span>Obras</span></a></li>
                    <li class="nav-item"><a class="nav-link text-center color-5 fw-bolder fs-6" href="profile.html"><i class="fas fa-user" style="color: rgba(247, 92, 3, 0.7) !important;"></i><span>Perfil</span></a></li>
                    <li class="nav-item"><a class="nav-link text-center color-5 fw-bolder fs-6" href="login.html"><i class="far fa-user-circle" style="color: rgba(247, 92, 3, 0.7) !important;"></i><span>Iniciar sesión</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars color-3"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Buscar"><button class="btn btn-primary py-0 bg-color-3 color-2" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light border-0 form-control small" type="text" placeholder="Search for ..."><button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button></div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg?h=fefb30b61c8459a66bd338b7d790c3d5">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg?h=5d142be9441885f0935b84cf739d4112">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg?h=c5166867f10a4e454b5b2ae8d63268b3">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg?h=35dc45edbcda6b3fc752dab2b0f082ea">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo ($_SESSION['icon_user']); ?> (Propietario)</span>
                                        <img class="border rounded-circle img-profile" src="<?php echo (isset($_SESSION['icon_user'])) ? ($_SESSION['icon_user']) : ("assets/img/avatars/avatar1.jpeg?h=0ecc82101fb9a10ca459432faa8c0656"); ?>">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Configuración</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Actividad</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="php-scripts/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar sesión</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4 color-5 fw-bold fs-1">Obras en construcción</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold color-3 fs-5">Consulta el avance de los proyectos y trabajos de construcción en curso</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Mostrar&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Buscar"></label></div>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col col-12 px-0">
                                    <div class="accordion" role="tablist" id="accordion-1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed bg-color-5 color-2 fw-bolder fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="false" aria-controls="accordion-1 .item-1">Construcción de Centro Comercial "3 Estrellas"</button></h2>
                                            <div class="accordion-collapse collapse item-1 bg-color-2" role="tabpanel" data-bs-parent="#accordion-1">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="m-0 fw-bolder d-flex align-middle col col-12 justify-content-center color-5 fs-3 text-center">Datos generales sobre la obra</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col align-self-center col-12 col-lg-9 col-xxl-8 align-self-center mb-2" data-bs-toggle="tooltip" data-bss-tooltip="">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-primary m-0 fw-bold d-flex align-middle col col-12 text-center justify-content-center color-6 fs-4">Descripción</p>
                                                                    <p class="description-container fs-5" style="text-align: justify !important; text-indent: 5% !important;">El proyecto del Centro Comercial "3 Estrellas" busca traer nuevos productos y tiendas a los residentes de la Ciudad de 3 Estrellas, poniendo en un sitio todo lo que necesitan para mantener su estilo de vida.</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col text-center col-12 py-2"><a class="col col-auto px-4 px-lg-5 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#">Detalle</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col align-self-center">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-primary m-0 fw-bolder color-6 d-flex align-middle col col-12 justify-content-center fs-4">Propietario</p>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col d-flex justify-content-center text-center align-items-center">
                                                                    <p class="text-center m-0 align-middle col col-12 text-center color-1 fw-bolder fs-5">Ing. Gerardo Pardo Obrador</p>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col d-flex justify-content-center text-center align-items-center px-2 py-1 col-lg-12"><a class="col-12 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">

                                                                            <path d="M13 6C13 7.65685 11.6569 9 10 9C8.34315 9 7 7.65685 7 6C7 4.34315 8.34315 3 10 3C11.6569 3 13 4.34315 13 6Z" fill="currentColor"></path>
                                                                            <path d="M18 8C18 9.10457 17.1046 10 16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8Z" fill="currentColor"></path>
                                                                            <path d="M14 15C14 12.7909 12.2091 11 10 11C7.79086 11 6 12.7909 6 15V18H14V15Z" fill="currentColor"></path>
                                                                            <path d="M6 8C6 9.10457 5.10457 10 4 10C2.89543 10 2 9.10457 2 8C2 6.89543 2.89543 6 4 6C5.10457 6 6 6.89543 6 8Z" fill="currentColor"></path>
                                                                            <path d="M16 18V15C16 13.9459 15.7282 12.9552 15.2507 12.0943C15.4902 12.0327 15.7413 12 16 12C17.6569 12 19 13.3431 19 15V18H16Z" fill="currentColor"></path>
                                                                            <path d="M4.74926 12.0943C4.27185 12.9552 4 13.9459 4 15V18H1V15C1 13.3431 2.34315 12 4 12C4.25871 12 4.50977 12.0327 4.74926 12.0943Z" fill="currentColor"></path>
                                                                        </svg>&nbsp;Ver equipos</a></div>
                                                                <div class="col d-flex justify-content-center text-center align-items-center px-2 py-1 col-lg-12"><a class="col-12 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-ui-checks">
                                                                            <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"></path>
                                                                        </svg>&nbsp;Consultar tareas</a></div>
                                                                <div class="col d-flex justify-content-center text-center align-items-center px-2 py-1 col-lg-12"><a class="col-12 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-file-invoice">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                                            <path d="M9 7l1 0"></path>
                                                                            <path d="M9 13l6 0"></path>
                                                                            <path d="M13 17l2 0"></path>
                                                                        </svg>&nbsp;Ver reportes</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion" role="tablist" id="accordion-2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed bg-color-5 color-2 fw-bolder fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-2 .item-1" aria-expanded="false" aria-controls="accordion-2 .item-1">Construcción de Centro Comercial "3 Estrellas"</button></h2>
                                            <div class="accordion-collapse collapse item-1 bg-color-2" role="tabpanel" data-bs-parent="#accordion-2">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="m-0 fw-bolder d-flex align-middle col col-12 justify-content-center color-5 fs-3 text-center">Datos generales sobre la obra</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col align-self-center col-12 col-lg-9 col-xxl-8 align-self-center mb-2" data-bs-toggle="tooltip" data-bss-tooltip="">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-primary m-0 fw-bold d-flex align-middle col col-12 text-center justify-content-center color-6 fs-4">Descripción</p>
                                                                    <p class="description-container fs-5" style="text-align: justify !important; text-indent: 5% !important;">El proyecto del Centro Comercial "3 Estrellas" busca traer nuevos productos y tiendas a los residentes de la Ciudad de 3 Estrellas, poniendo en un sitio todo lo que necesitan para mantener su estilo de vida.</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col text-center col-12 py-2"><a class="col col-auto px-4 px-lg-5 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#">Detalle</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col align-self-center">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-primary m-0 fw-bolder color-6 d-flex align-middle col col-12 justify-content-center fs-4">Propietario</p>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col d-flex justify-content-center text-center align-items-center">
                                                                    <p class="text-center m-0 align-middle col col-12 text-center color-1 fw-bolder fs-5">Ing. Gerardo Pardo Obrador</p>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col d-flex justify-content-center text-center align-items-center px-2 py-1 col-lg-12"><a class="col-12 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">

                                                                            <path d="M13 6C13 7.65685 11.6569 9 10 9C8.34315 9 7 7.65685 7 6C7 4.34315 8.34315 3 10 3C11.6569 3 13 4.34315 13 6Z" fill="currentColor"></path>
                                                                            <path d="M18 8C18 9.10457 17.1046 10 16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8Z" fill="currentColor"></path>
                                                                            <path d="M14 15C14 12.7909 12.2091 11 10 11C7.79086 11 6 12.7909 6 15V18H14V15Z" fill="currentColor"></path>
                                                                            <path d="M6 8C6 9.10457 5.10457 10 4 10C2.89543 10 2 9.10457 2 8C2 6.89543 2.89543 6 4 6C5.10457 6 6 6.89543 6 8Z" fill="currentColor"></path>
                                                                            <path d="M16 18V15C16 13.9459 15.7282 12.9552 15.2507 12.0943C15.4902 12.0327 15.7413 12 16 12C17.6569 12 19 13.3431 19 15V18H16Z" fill="currentColor"></path>
                                                                            <path d="M4.74926 12.0943C4.27185 12.9552 4 13.9459 4 15V18H1V15C1 13.3431 2.34315 12 4 12C4.25871 12 4.50977 12.0327 4.74926 12.0943Z" fill="currentColor"></path>
                                                                        </svg>&nbsp;Ver equipos</a></div>
                                                                <div class="col d-flex justify-content-center text-center align-items-center px-2 py-1 col-lg-12"><a class="col-12 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-ui-checks">
                                                                            <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"></path>
                                                                        </svg>&nbsp;Consultar tareas</a></div>
                                                                <div class="col d-flex justify-content-center text-center align-items-center px-2 py-1 col-lg-12"><a class="col-12 color-2 bg-color-3 p-2 rounded-3 text-decoration-none fw-bolder fs-5" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-file-invoice">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                                            <path d="M9 7l1 0"></path>
                                                                            <path d="M9 13l6 0"></path>
                                                                            <path d="M13 17l2 0"></path>
                                                                        </svg>&nbsp;Ver reportes</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 a 10 de 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © BM Design 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js?h=b278a97dda6459ba539fdf41c9f10430"></script>
    <script src="assets/js/theme.js?h=79f403485707cf2617c5bc5a2d386bb0"></script>
</body>

</html>