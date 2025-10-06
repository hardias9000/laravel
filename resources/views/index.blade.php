
<!doctype html>  
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Enviar Mensaje</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>.error{color:#dc3545}.success{color:#198754}</style>
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card mx-auto" style="max-width:720px">
      <div class="card-body">
        <h4>Enviar mensaje</h4>

        <form id="form" method="POST" action="{{ route('contacto.guardar') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control">
            <div id="error-nombre" class="error small"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control">
            <div id="error-email" class="error small"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="4" class="form-control"></textarea>
            <div id="error-mensaje" class="error small"></div>
          </div>

          <div class="botones">
            <div class="d-flex gap-2 align-items-center ">
              <button id="btn-enviar" class="btn btn-primary" type="submit">Enviar</button>
              <div id="form-msg" class="ms-2"></div>
            </div>
            <div>
              <a  href="{{ route('contacto.registros') }}" class="btn btn-outline-secondary">ver Registros</a>
              <div id="form-msg" class="ms-2"></div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/validacion.js') }}"></script>
</body>
</html>
