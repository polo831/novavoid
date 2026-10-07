<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal - Noda Void</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <!-- Navbar superior opcional o componentes de tu framework -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Noda Void</a>
            <div class="d-flex align-items-center">
                <span class="text-light me-3 small"><i class="bi bi-person-circle"></i> Bienvenido, <?php echo htmlspecialchars($nombre ?? ''); ?></span>
                <a href="/tiendaonlinepolo/public/index.php?url=auth/logout" class="btn btn-outline-light btn-sm">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Contenido principal: Catálogo de Productos -->
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="fw-bold text-dark">Catálogo de Prendas</h1>
                <p class="text-muted">Explora los productos disponibles en Noda Void</p>
            </div>
        </div>

      <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden bg-white">
                    <!-- Contenedor de la imagen dinámica -->
                    <div class="bg-light overflow-hidden" style="height: 200px;">
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="/tiendaonlinepolo/public/img/<?php echo htmlspecialchars($producto['imagen']); ?>" 
                                 alt="<?php echo htmlspecialchars($producto['nombre_prenda']); ?>" 
                                 class="w-100 h-100 object-fit-cover">
                        <?php else: ?>
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary text-white">
                                <span>SIN IMAGEN</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark"><?php echo htmlspecialchars($producto['nombre_prenda']); ?></h5>
                        
                        <div class="mb-2">
                            <span class="badge bg-secondary text-light me-1">Talle: <?php echo htmlspecialchars($producto['talle']); ?></span>
                            <span class="badge bg-light text-dark border">Stock: <?php echo htmlspecialchars($producto['stock']); ?></span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                            <span class="fs-5 fw-bold text-success">$<?php echo number_format($producto['precio'], 2); ?></span>
                            <button class="btn btn-dark btn-sm rounded-pill px-3 shadow-sm">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <p class="text-muted">No hay productos cargados en la base de datos.</p>
        </div>
    <?php endif; ?>
</div>