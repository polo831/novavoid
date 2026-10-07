<?php
// Vista de inicio de sesión para Noda Void
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Noda Void</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-12 col-sm-10 col-md-6 col-lg-4">

                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">
                            Iniciar Sesión
                        </h2>

                        <p class="text-center text-muted mb-4">
                            Noda Void
                        </p>

                        <?php if (!empty($mensajeExito)): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlspecialchars($mensajeExito); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($error); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/tiendaonlinepolo/public/index.php?url=auth/login" method="POST">

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Correo Electrónico
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Ingrese su correo"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Contraseña
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Ingrese su contraseña"
                                    required
                                >
                            </div>

                            <div class="d-grid">
                                 <button type="submit" class="btn btn-dark">
                                 Ingresar
                                </button>
                            </div>

                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                ¿No tienes cuenta?
                                <a href="/tiendaonlinepolo/public/index.php?url=auth/register">
                                    Regístrate aquí
                                </a>
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
