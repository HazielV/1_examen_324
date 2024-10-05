<php
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>HAM-LP - Honorable Alcaldía Municipal de La Paz</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet" />
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            rel="stylesheet" />
        <style>
            :root {
                --color-primary: #004a87;
                --color-secondary: #f39c12;
                --color-tertiary: #2ecc71;
                --color-quaternary: #e74c3c;
                --color-quinary: #9b59b6;
            }

            .bg-ham-lp {
                background-color: var(--color-primary);
            }

            .bg-ham-lp-secondary {
                background-color: var(--color-secondary);
            }

            .bg-ham-lp-tertiary {
                background-color: var(--color-tertiary);
            }

            .bg-ham-lp-quaternary {
                background-color: var(--color-quaternary);
            }

            .bg-ham-lp-quinary {
                background-color: var(--color-quinary);
            }

            .text-ham-lp {
                color: var(--color-primary);
            }

            .text-ham-lp-secondary {
                color: var(--color-secondary);
            }

            .text-ham-lp-tertiary {
                color: var(--color-tertiary);
            }

            .text-ham-lp-quaternary {
                color: var(--color-quaternary);
            }

            .text-ham-lp-quinary {
                color: var(--color-quinary);
            }

            .btn-ham-lp {
                background-color: var(--color-primary);
                color: white;
            }

            .btn-ham-lp:hover {
                background-color: #003366;
                color: white;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-ham-lp">
            <div class="container">
                <a class="navbar-brand" href="#">HAM-LP</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tramites">Trámites</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <h1 class="display-4 fw-bold">
                            Bienvenido a la Alcaldía Municipal de La Paz
                        </h1>
                        <p class="lead">
                            Descubre nuestros servicios y realiza tus trámites de manera fácil
                            y rápida.
                        </p>
                        <a href="#tramites" class="btn btn-ham-lp btn-lg">Ver Trámites</a>
                    </div>
                </div>
            </div>
        </header>

        <section id="servicios" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 text-ham-lp">Nuestros Servicios</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 bg-ham-lp-tertiary text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                                <h5 class="card-title">Catastro</h5>
                                <p class="card-text">
                                    Gestiona información sobre propiedades y terrenos en La Paz.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 bg-ham-lp-quaternary text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-building fa-3x mb-3"></i>
                                <h5 class="card-title">Urbanismo</h5>
                                <p class="card-text">
                                    Planificación y desarrollo urbano para mejorar la ciudad.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 bg-ham-lp-quinary text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-file-alt fa-3x mb-3"></i>
                                <h5 class="card-title">Trámites Municipales</h5>
                                <p class="card-text">
                                    Realiza tus trámites municipales de forma eficiente.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="tramites" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center mb-5 text-ham-lp">Listado de Trámites</h2>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-home text-ham-lp me-2"></i>Registro de
                                    Propiedad</span>
                                <a href="#" class="btn btn-sm btn-ham-lp">Iniciar</a>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-map text-ham-lp-secondary me-2"></i>Certificado Catastral</span>
                                <a href="#" class="btn btn-sm btn-ham-lp">Iniciar</a>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-pencil-ruler text-ham-lp-tertiary me-2"></i>Licencia de Construcción</span>
                                <a href="#" class="btn btn-sm btn-ham-lp">Iniciar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-coins text-ham-lp-quaternary me-2"></i>Pago
                                    de Impuestos</span>
                                <a href="#" class="btn btn-sm btn-ham-lp">Iniciar</a>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-id-card text-ham-lp-quinary me-2"></i>Renovación de Licencias</span>
                                <a href="#" class="btn btn-sm btn-ham-lp">Iniciar</a>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-trash-alt text-ham-lp me-2"></i>Gestión de
                                    Residuos</span>
                                <a href="#" class="btn btn-sm btn-ham-lp">Iniciar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-ham-lp text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Contacto</h5>
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i>Calle Mercado 1298, La
                            Paz, Bolivia
                        </p>
                        <p><i class="fas fa-phone me-2"></i>(591-2) 2650000</p>
                        <p><i class="fas fa-envelope me-2"></i>info@lapaz.bo</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5>Síguenos</h5>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <hr />
                <div class="text-center">
                    <p>
                        &copy; 2024 Honorable Alcaldía Municipal de La Paz. Todos los
                        derechos reservados.
                    </p>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>