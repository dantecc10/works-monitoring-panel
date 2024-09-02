<?php
//if(!isset($_GET['id']) || !isset($_SESSION['id_user'])){
//    header("Location: login.php");
//} else{}
include "php-scripts/connection.php";
include "php-scripts/functions.php";
include "php-scripts/configs.php";

$project_data = data_fetcher($connection, $_GET['id'], "project");
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Detalle de obra - <?php echo ($project_data['name_project']); ?> - BM Design</title>
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta name="description" content="Plataforma de administración de obras y construcción.">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png">
    <link rel="icon" type="image/png" sizes="1024x1024" href="assets/img/logo-nuevo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/works.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion main-gradient p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0 text-center"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon" style="height: inherit;"><img src="assets/img/logo-nuevo.png" style="height: inherit;"></div>
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
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Dante (Propietario)</span><img class="border rounded-circle img-profile" src="assets/img/avatars/default-avatar.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Configuración</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Actividad</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar sesión</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <section>
                    <div class="container-fluid">
                        <h3 class="text-dark mb-2 color-5 fw-bold fs-1 text-center"><?php echo ($project_data['name_project']); ?></h3>
                        <div class="card shadow mb-3">
                            <div class="card-header py-3 bg-color-3">
                                <p class="text-primary m-0 fw-bold color-5 fs-5">Lea aquí los detalles de el proyecto.</p>
                            </div>
                            <div class="card-body bg-color-2">
                                <div class="row">
                                    <div class="col col-12 col-md-7 col-xl-8 align-self-center">
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-primary m-0 fw-bold d-flex align-middle col col-12 text-center justify-content-center color-6 fs-4">Descripción</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="description-container fs-5" style="text-align: justify !important; text-indent: 5% !important;"><?php echo ($project_data['description_project']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center">
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-primary m-0 fw-bold d-flex align-middle col col-12 text-center justify-content-center color-6 fs-4">Propietario</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center"><img class="col col-12 col-sm-6 col-md-8 col-xl-5 rounded-circle" src="https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-primary m-0 fw-bold d-flex align-middle col col-12 text-center justify-content-center color-6 fs-">Ing. Gerardo Pardo Obrador</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="gallery">
                    <div class="container-fluid">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3 bg-color-3">
                                <p class="text-primary m-0 fw-bold color-5 fs-5">Evidencia gráfica</p>
                            </div>
                            <div class="card-body bg-color-2">
                                <div class="row">
                                    <div class="col">
                                        <p class="fs-5 mb-2" style="text-align: justify !important; text-indent: 5% !important;">Observa la galería de imágenes que documentan el avance de la obra.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="carousel slide" data-bs-ride="false" id="carousel-1">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active"><img class="w-100 d-block" src="https://e00-marca.uecdn.es/assets/multimedia/imagenes/2024/06/11/17180958027686.jpg" alt="Slide Image"></div>
                                                <div class="carousel-item"><img class="w-100 d-block" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkseP-1vFhKGGHLiHgbzK8iVcqzRgJ027CFl3R5WYH0n0a3bzGQW4C85Jl1mQJiIYukMk&amp;usqp=CAU" alt="Slide Image"></div>
                                                <div class="carousel-item"><img class="w-100 d-block" src="https://img.fcbayern.com/image/upload/t_cms-2x1/f_auto/w_1600%2Cc_fill/q_auto/v1688540333/cms/public/images/fcbayern-com/homepage/stadien/allianz-arena/230419-allianz-arena-get.jpg" alt="Slide Image"></div>
                                            </div>
                                            <div>
                                                <!-- Start: Previous --><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><!-- End: Previous -->
                                                <!-- Start: Next --><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a><!-- End: Next -->
                                            </div>
                                            <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dynamic Teams Displaying -->
                <?php
                echo detail_build_teams($_GET['id']);
                ?>
                <section id="tasks">
                    <div class="container-fluid">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3 bg-color-3">
                                <p class="text-primary m-0 fw-bold color-5 fs-5">Registro de actividades</p>
                            </div>
                            <div class="card-body bg-color-2">
                                <div class="row">
                                    <div class="col">
                                        <p class="fs-5 mb-2" style="text-align: justify !important; text-indent: 5% !important;">Revisa y analiza cada actividad realizada por los equipos que trabajan en esta obra.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="overflow-y: auto;">
                                        <div class="row rounded-4 mb-2" style="background-color: var(--color-6);">
                                            <div class="col align-self-center text-center col-12 bg-color-3 rounded-4"><span class="fs-4 fw-bolder text-black-50 color-2">Estudio de suelo</span>
                                                <hr class="m-0"><span class="small fw-bolder text-black-50 color-2"><strong>2024-09-02 01:02:35</strong></span>
                                            </div>
                                            <div class="col align-self-center text-center col-12 col-md-9 col-xl-10"><span class="fw-bold color-2">Equipo</span>
                                                <p class="align-self-center fw-bold">Actividad realizada por: <a href="#teams"><em>Führer Industries</em></a>&nbsp;(Plomería)</p>
                                                <p class="align-self-center fw-bold rounded-4">Responsable: Dante Castelán Carpinteyro</p>
                                            </div>
                                            <div class="col text-center align-self-center"><img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUhkp0j27SHSdJ-xqXXxVb1O8pxGRZV2bfYg&amp;s" height="60em"></div>
                                            <div class="col align-self-center text-center col-12 col-lg-6"><span class="fw-bold color-2">Descripción</span>
                                                <p class="align-self-center fw-bold">Estudio y análisis técnico de las características de la obra para iniciar excavación.</p>
                                            </div>
                                            <div class="col align-self-center text-center col-12 col-lg-6"><span class="fw-bold color-2">Comentarios</span>
                                                <p class="align-self-center fw-bold">No hubo ningún percance o contratiempo.</p>
                                            </div>
                                            <div class="col col-12 text-center rounded-4 bg-color-5"><button class="btn fw-bolder fs-4" data-bs-toggle="modal" data-bs-target="#modal-graphical-evidence" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-photo-share">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M15 8h.01"></path>
                                                        <path d="M12 21h-6a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7"></path>
                                                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0"></path>
                                                        <path d="M16 22l5 -5"></path>
                                                        <path d="M21 21.5v-4.5h-4.5"></path>
                                                    </svg>&nbsp;Ver galería</button></div>
                                        </div>
                                        <div class="row rounded-4 mb-2" style="background-color: var(--color-6);">
                                            <div class="col align-self-center text-center col-12 bg-color-3 rounded-4"><span class="fs-4 fw-bolder text-black-50 color-2">Estudio de suelo</span>
                                                <hr class="m-0"><span class="small fw-bolder text-black-50 color-2"><strong>2024-09-02 01:02:35</strong></span>
                                            </div>
                                            <div class="col align-self-center text-center col-12 col-md-9 col-xl-10"><span class="fw-bold color-2">Equipo</span>
                                                <p class="align-self-center fw-bold">Actividad realizada por: <a href="#teams"><em>Führer Industries</em></a>&nbsp;(Plomería)</p>
                                                <p class="align-self-center fw-bold rounded-4">Responsable: Dante Castelán Carpinteyro</p>
                                            </div>
                                            <div class="col text-center align-self-center"><img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUhkp0j27SHSdJ-xqXXxVb1O8pxGRZV2bfYg&amp;s" height="60em"></div>
                                            <div class="col align-self-center text-center col-12 col-lg-6"><span class="fw-bold color-2">Descripción</span>
                                                <p class="align-self-center fw-bold">Estudio y análisis técnico de las características de la obra para iniciar excavación.</p>
                                            </div>
                                            <div class="col align-self-center text-center col-12 col-lg-6"><span class="fw-bold color-2">Comentarios</span>
                                                <p class="align-self-center fw-bold">No hubo ningún percance o contratiempo.</p>
                                            </div>
                                            <div class="col col-12 text-center rounded-4 bg-color-5"><button class="btn fw-bolder fs-4" data-bs-toggle="modal" data-bs-target="#modal-graphical-evidence" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-photo-share">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M15 8h.01"></path>
                                                        <path d="M12 21h-6a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7"></path>
                                                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0"></path>
                                                        <path d="M16 22l5 -5"></path>
                                                        <path d="M21 21.5v-4.5h-4.5"></path>
                                                    </svg>&nbsp;Ver galería</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="modal fade modal-xl" role="dialog" tabindex="-1" id="modal-graphical-evidence" aria-labelledby="modal-graphical-evidence">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Evidencia gráfica de la actividad</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Estas son las imágenes para mostrar sobre la tarea seleccionada.</p>
                                <div class="row">
                                    <div class="col" style="max-height: 52vh !important;">
                                        <div class="carousel slide" data-bs-ride="false" id="carousel-2" style="max-height: inherit;">
                                            <div class="carousel-inner" style="max-height: inherit;">
                                                <div class="carousel-item active text-center" style="max-height: inherit;"><img class="w-100 d-block" src="assets/img/logo.png" alt="Slide Image" style="max-height: inherit; width: auto !important; display: inline-flex !important;"></div>
                                                <div class="carousel-item text-center" style="max-height: inherit;"><img class="w-100 d-block" src="https://images8.alphacoders.com/456/456424.jpg" alt="Slide Image" style="max-height: inherit; width: auto !important; display: inline-flex !important;"></div>
                                                <div class="carousel-item text-center" style="max-height: inherit;"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image" style="max-height: inherit; width: auto !important; display: inline-flex !important;"></div>
                                            </div>
                                            <div>
                                                <!-- Start: Previous --><a class="carousel-control-prev" href="#carousel-2" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><!-- End: Previous -->
                                                <!-- Start: Next --><a class="carousel-control-next" href="#carousel-2" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a><!-- End: Next -->
                                            </div>
                                            <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-2" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-2" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-2" data-bs-slide-to="2"></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cerrar</button><button class="btn btn-primary visually-hidden" type="button">Añadir</button></div>
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
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>