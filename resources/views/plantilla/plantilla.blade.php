<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('titulo')</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



<div class="container mt-4">
  <!-- Botones de navegación -->
  <div class="d-flex justify-content-between mb-3">
    <button class="btn btn-secondary" onclick="window.history.back();"><i class="fas fa-arrow-left me-2"></i> Regresar</button>
    <button class="btn btn-primary">Continuar <i class="fas fa-arrow-right ms-2"></i></button>
  </div>

  <!-- Contenido principal de la página -->
  <div class="row">
    <div class="col">
      @yield('contenido')
    </div>
  </div>
</div>

<!-- Bootstrap JS y otras dependencias -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
