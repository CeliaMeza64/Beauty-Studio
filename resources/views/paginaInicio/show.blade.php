@extends('layouts.app')
  
@section('title', 'Página de Inicio')

@section('content')
<h2 class="services-title">Servicios</h2>

@if(Auth::check() && Auth::user()->role == 'admin')
    <a href="{{ route('paginaInicio.index') }}" class="btn btn-primary mb-3 volver-lista-btn">Volver a la lista</a>
@endif

<div class="card-container">
    @foreach($paginaInicio as $pagina)
        @if(is_object($pagina) && isset($pagina->titulo))
        <div class="card" data-bs-toggle="modal" data-bs-target="#modal-{{ $pagina->id }}">
            @if (!empty($pagina->imagen))
                <img src="{{ asset('storage/' . $pagina->imagen) }}" alt="{{ $pagina->titulo }}" class="card-img-top">
            @else
                <img src="ruta/a/imagen/placeholder.jpg" alt="Imagen no disponible" class="card-img-top">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $pagina->titulo }}</h5>
                <p class="card-text">{{ Str::limit($pagina->descripcion, 100) }}</p>
            </div>
        </div>
        
        <div class="modal fade" id="modal-{{ $pagina->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $pagina->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ $pagina->id }}">{{ $pagina->titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (!empty($pagina->imagen))
                            <img src="{{ asset('storage/' . $pagina->imagen) }}" alt="{{ $pagina->titulo }}" class="img-fluid mb-3">
                        @else
                            <img src="ruta/a/imagen/placeholder.jpg" alt="Imagen no disponible" class="img-fluid mb-3">
                        @endif
                        <p>{{ $pagina->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información no disponible</h5>
                <p class="card-text">Los detalles de esta entrada no están disponibles.</p>
            </div>
        </div>
        @endif
    @endforeach
</div>

<style>
  .services-title {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
  }
  
  .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
    margin: 0 auto;
    max-width: 1000px;
    padding: 0 1rem;
  }

  .card {
    flex: 1 1 calc(50% - 2rem);
    max-width: calc(50% - 2rem);
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    cursor: pointer;
  }

  .card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .card img {
    border-radius: 10px 10px 0 0;
    object-fit: cover;
    width: 100%;
    height: 200px;
  }

  .card-title {
    font-size: 1.5rem;
    color: #FF6EA2;
    margin-bottom: 0.75rem;
  }

  .card-text {
    font-size: 1rem;
    text-align: justify;
    color: #333;
  }

  .modal-body img {
    max-width: 100%;
    height: auto;
    margin-bottom: 1rem;
  }

  footer.footer {
    background: linear-gradient(135deg, #f9e3e3, #fce4ec); 
    color: #333;
    padding: 3rem 0;
  }

  footer .text-uppercase {
    font-size: 1.2rem;
    font-weight: bold;
  }

  footer p {
    margin-bottom: 0.75rem;
    font-size: 1rem;
  }

  footer .container {
    max-width: 1000px;
  }

  .whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.whatsapp-float img {
    width: 30px;
    height: 30px;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.tooltip-text {
    visibility: hidden;
    width: 180px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 80%; 
    left: 50%;
    margin-left: -90px;
    opacity: 0;
    transition: opacity 0.3s;
    font-size: 0.9rem;
}

.whatsapp-float:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
}

.volver-lista-btn {
    margin-left: 100px;
}
</style>
@endsection
