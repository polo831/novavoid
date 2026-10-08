<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Void Store</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Barra de Navegación Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/novavoid/public/index.php?url=home/index">Nova Void Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="/novavoid/public/index.php?url=home/index">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">🛒 Carrito</a>
                    </li>
                    <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm px-3" href="/novavoid/public/index.php?url=auth/logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container my-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="fw-bold">Catálogo Exclusivo</h1>
            <p class="text-muted">Explorá nuestra colección de prendas</p>
        </div>

        <!-- Botones de Filtrado por Categorías -->
         <div class="d-flex justify-content-center gap-2 flex-wrap mb-5">
       <a href="/novavoid/public/index.php?url=home/index" class="btn btn-outline-dark btn-sm px-4">Todas</a>
       <a href="/novavoid/public/index.php?url=home/index&categoria=1" class="btn btn-outline-dark btn-sm px-4">Remeras</a>
       <a href="/novavoid/public/index.php?url=home/index&categoria=3" class="btn btn-outline-dark btn-sm px-4">Pantalones</a>
       <a href="/novavoid/public/index.php?url=home/index&categoria=2" class="btn btn-outline-dark btn-sm px-4">Buzos</a>
</div>
        <!-- Grilla de Productos -->
        <div class="row">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="img/<?php echo htmlspecialchars($producto['imagen'] ?? ''); ?>" 
                                 class="card-img-top" 
                                 style="height: 280px; object-fit: cover;" 
                                 alt="Imagen del producto">
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    <?php echo htmlspecialchars($producto['nombre_prenda'] ?? 'Sin nombre'); ?>
                                </h5>
                                <p class="card-text text-muted small"><?php echo htmlspecialchars($producto['descripcion'] ?? ''); ?></p>
                                
                                <div class="mt-auto">
                                    <span class="badge bg-secondary mb-2">Talle: <?php echo htmlspecialchars($producto['talle'] ?? '-'); ?></span>
                                    <p class="fs-5 fw-bold text-dark mb-3">$<?php echo number_format($producto['precio'] ?? 0, 2, ',', '.'); ?></p>
                                    <a href="#" class="btn btn-dark w-100">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">No hay productos disponibles en esta categoría.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>