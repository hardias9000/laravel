<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Mensajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Registros de Mensajes</h1>
                    <a href="{{ route('contacto.index') }}" class="btn btn-primary">
                        Volver al Formulario
                    </a>
                </div>

                @if(count($mensajes) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Mensaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mensajes as $mensaje)
                                <tr>
                                    <td>{{ $mensaje['id'] }}</td>
                                    <td>{{ $mensaje['nombre'] }}</td>
                                    <td>{{ $mensaje['email'] }}</td>
                                    <td>{{ Str::limit($mensaje['mensaje'], 50) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="alert alert-info">
                        Total de mensajes: <strong>{{ count($mensajes) }}</strong>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        <h4>No hay mensajes registrados</h4>
                        <p class="mb-0">Aún no se han guardado mensajes en el sistema.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>