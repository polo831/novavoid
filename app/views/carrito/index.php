<?php 
// Si tu proyecto incluye una cabecera global, puedes requerirla aquí:
// require_once __DIR__ . '/../inc/header.php'; 
?>

<div class="container my-5">
    <h2>Tu Carrito de Compras - Noda Void</h2>
    
    <?php if (empty($_SESSION['carrito'])): ?>
        <div class="alert alert-info mt-4" role="alert">
            Tu carrito está vacío. ¡Explora el catálogo y añade algunas prendas!
        </div>
        <a href="index.php?url=Productos/index" class="btn btn-dark mt-3">Ver Productos</a>
    <?php else: ?>
        <div class="table-responsive mt-4">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrito'] as $id => $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nombre'] ?? 'Producto #' . $id); ?></td>
                            <td>$<?= number_format($item['precio'], 2, ',', '.'); ?></td>
                            <td><?= $item['cantidad']; ?></td>
                            <td>$<?= number_format($item['precio'] * $item['cantidad'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="index.php?url=Carrito/eliminar&id=<?= $id; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h3>Total: $<?= number_format($total, 2, ',', '.'); ?></h3>
            <div>
                <a href="index.php?url=Productos/index" class="btn btn-outline-dark me-2">Seguir comprando</a>
                <a href="index.php?url=Carrito/finalizar" class="btn btn-success">Finalizar Compra</a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php 
// Si tu proyecto incluye un pie de página global:
// require_once __DIR__ . '/../inc/footer.php'; 
?>