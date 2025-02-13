@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Crear un nuevo video</h2>
        </div>
        <div class="row">
            <form action="{{ route('asset.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
                @csrf
                @method('POST')
                <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                    <label for="image">Miniaturas</label>
                    <input type="file" class="form-control" id="image" name="image" />
                </div>
                <div class="form-group">
                    <label for="video">Archivo de Vídeo</label>
                    <input type="file" class="form-control" id="video_path" name="video_path" />
                </div>
                <a href="/home" type="submit" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Subir Vídeo</button>
            </form>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row mt-5">
        <h2 class="mb-40">Videos e Imágenes Subidos</h2>
        
        @foreach($assets as $asset)
            <div class="col-md-2 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ Storage::url('images/' . $asset->image) }}" alt="{{ $asset->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $asset->title }}</h5>
                        <div class="video-content">
                            <video class="img-fluid" controls>
                                <source src="{{ Storage::url('videos/' . $asset->video_path) }}" type="video/mp4" />
                                Tu navegador no es compatible con HTML5
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
