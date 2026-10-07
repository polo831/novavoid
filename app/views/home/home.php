<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Void | Tienda de Ropa</title>
    <style>
        /* Estilos generales y paleta Naranja Tostado / Cálido y Negro */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f7ece4; /* Fondo naranja/durazno muy cálido y vibrante */
            color: #111111; /* Negro profundo */
            line-height: 1.6;
        }

        /* Barra de navegación */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            border-bottom: 1px solid #e0c8b9;
            background-color: #f7ece4;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #111;
        }

        nav a {
            margin-left: 25px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #d35400; /* Acento naranja al pasar el mouse */
        }

        /* Sección Hero / Portada con Imagen */
        .hero {
            text-align: center;
            padding: 100px 20px;
            background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('portada.jpg'); /* Fondo con un filtro oscuro sutil y tu imagen */
            background-size: cover;
            background-position: top; /* Mantiene el foco superior igual que en el login */
            color: #ffffff; /* Texto en blanco para que resalte sobre la foto */
            border-bottom: 1px solid #e0c8b9;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .hero p {
            color: #f7ece4;
            font-size: 1.1rem;
            margin-bottom: 30px;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        .btn-cta {
            background-color: #111;
            color: #fff;
            padding: 12px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            text-transform: uppercase;
            font-size: 0.85rem;
            transition: background 0.3s;
        }

        .btn-cta:hover {
            background-color: #d35400;
        }

        /* Grilla de Productos */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
            border-left: 4px solid #d35400; /* Toque naranja en el título */
            padding-left: 15px;
        }

        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .card-producto {
            background: #ffffff;
            border: 1px solid #e0c8b9;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card-producto:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(211, 84, 0, 0.1);
        }

        .img-placeholder {
            width: 100%;
            height: 250px;
            background-color: #f2e2d5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-weight: bold;
        }

        .info-producto {
            padding: 20px;
        }

        .info-producto h3 {
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: #111;
        }

        .info-producto .precio {
            font-size: 1rem;
            font-weight: bold;
            color: #d35400; /* Precio resaltado en un tono naranja fuerte/óxido */
            margin-bottom: 15px;
        }

        .btn-comprar {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #111;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn-comprar:hover {
            background-color: #d35400;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 30px;
            background-color: #111;
            color: #f7ece4;
            margin-top: 80px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">Nova Void</div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="#">Catálogo</a>
            <a href="loguin.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
        </nav>
    </header>

    <!-- Hero Section con la imagen de fondo -->
    <section class="hero">
        <h1>Colección Esencial</h1>
        <p>Diseño, minimalismo y estructura urbana con personalidad cálida.</p>
        <a href="#" class="btn-cta">Ver Catálogo</a>
    </section>

    <!-- Main Content: Productos -->
    <div class="container">
        <h2 class="section-title">Destacados</h2>
        
        <div class="grid-productos">
            <!-- Producto 1 -->
            <div class="card-producto">
                <div class="img-placeholder">IMAGEN PRENDA</div>
                <div class="info-producto">
                    <h3>Remera Oversize Void</h3>
                    <div class="precio">$20.000</div>
                    <a href="#" class="btn-comprar">Agregar al Carrito</a>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="card-producto">
                <div class="img-placeholder">IMAGEN PRENDA</div>
                <div class="info-producto">
                    <h3>Pantalón Cargo Minimal</h3>
                    <div class="precio">$35.000</div>
                    <a href="#" class="btn-comprar">Agregar al Carrito</a>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="card-producto">
                <div class="img-placeholder">IMAGEN PRENDA</div>
                <div class="info-producto">
                    <h3>Buzo Hoodie Black</h3>
                    <div class="precio">$45.000</div>
                    <a href="#" class="btn-comprar">Agregar al Carrito</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Nova Void. Todos los derechos reservados.</p>
    </footer>

</body>
</html>