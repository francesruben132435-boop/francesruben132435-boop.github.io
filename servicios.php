<?php
// Array de servicios disponibles
$servicios = [
  'limpieza-laser' => [
    'nombre' => 'Limpieza Láser',
    'titulo_corto' => 'Limpieza Láser',
    'descripcion_corta' => 'Eliminamos suciedad, óxido y contaminación con precisión.',
    'descripcion_completa' => 'Utilizamos tecnología láser de última generación para eliminar suciedad, óxido, corrosión y contaminación de superficies delicadas. Sin dañar el material base, garantizamos resultados profesionales y durables.',
    'ventajas' => [
      'Precisión milimétrica sin daño material',
      'Sin químicos agresivos',
      'Rápido y eficiente',
      'Aplicable en diversos materiales'
    ],
    'imagen_class' => 'service-limpieza'
  ],
  'acceso-cuerdas' => [
    'nombre' => 'Acceso con Cuerdas',
    'titulo_corto' => 'Acceso con Cuerdas',
    'descripcion_corta' => 'Trabajos en altura seguros y certificados IRATA.',
    'descripcion_completa' => 'Realizamos trabajos en altura de forma segura utilizando técnicas especializadas de acceso por cuerda (IRATA certified). Nuestro equipo está capacitado y certificado para trabajar en cualquier altura con máxima seguridad.',
    'ventajas' => [
      'Certificación IRATA International',
      'Equipo entrenado y certificado',
      'Máxima seguridad en trabajos de altura',
      'Soluciones para espacios complejos'
    ],
    'imagen_class' => 'service-acceso'
  ],
  'impermeabilizacion' => [
    'nombre' => 'Impermeabilización',
    'titulo_corto' => 'Impermeabilización',
    'descripcion_corta' => 'Protección contra filtraciones y humedad.',
    'descripcion_completa' => 'Aplicamos sistemas de impermeabilización de última generación para proteger tus infraestructuras de filtraciones, humedad y agentes externos. Garantía real y respaldo documental en cada proyecto.',
    'ventajas' => [
      'Sistemas de última generación',
      'Garantía documental por escrito',
      'Protección de largo plazo',
      'Soluciones personalizadas'
    ],
    'imagen_class' => 'service-impermeabilizacion'
  ]
];

// Obtener el ID del servicio desde URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
$servicio = isset($servicios[$id]) ? $servicios[$id] : null;

// Si no existe el servicio, redirigir a index
if (!$servicio) {
  header("Location: index.html");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Proteo Alturas | <?php echo $servicio['nombre']; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="header">
    <div class="header-top">
      <div class="header-content">
        <h1 class="logo"><a href="index.html" style="color: inherit; text-decoration: none;">PROTEO ALTURAS</a></h1>
        <nav class="nav-links">
          <a href="index.html#servicios">Servicios</a>
          <a href="index.html#contacto">Contacto</a>
        </nav>
      </div>
    </div>
    <div class="header-banner">
      <div class="banner-content">
        <h2><?php echo $servicio['nombre']; ?></h2>
        <p><?php echo $servicio['descripcion_corta']; ?></p>
      </div>
    </div>
  </header>

  <main>
    <section class="section service-detail">
      <div class="section-content">
        <div class="service-detail-container">
          <div class="service-detail-image <?php echo $servicio['imagen_class']; ?>"></div>
          
          <div class="service-detail-content">
            <h2><?php echo $servicio['nombre']; ?></h2>
            <p class="service-description">
              <?php echo $servicio['descripcion_completa']; ?>
            </p>
            
            <h3>Ventajas principales</h3>
            <ul class="service-ventajas">
              <?php foreach ($servicio['ventajas'] as $ventaja): ?>
                <li><?php echo $ventaja; ?></li>
              <?php endforeach; ?>
            </ul>
            
            <div class="service-actions">
              <a href="index.html#servicios" class="button button-primary">Volver a Servicios</a>
              <a href="index.html#contacto" class="button button-secondary">Contactar</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section contact" id="contacto">
      <div class="section-content contact-content">
        <div>
          <h2>Contacto</h2>
          <p>Teléfono: <a href="tel:+527291112663">+52 729 111 2663</a></p>
          <p>Email: <a href="mailto:centenorojo1@gmail.com">centenorojo1@gmail.com</a></p>
        </div>
        <a class="button button-secondary" href="tel:+527291112663">Llamar</a>
      </div>
    </section>
  </main>
</body>
</html>
