@extends('layouts.app')

@section('content')
<div class="container-fluid">
    

    @auth
    <nav class="navbar navbar-default" role="navigation">
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse"
                  data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1 >Menu</h1>
        </div>
      
        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><div class="col-md-5 mx-10">
                <a href="{{ url('/posts/myPosts') }}"><button type="button" class="btn btn-outline-dark">Mis Publicaciones</button></a>
            </div>   

            <li class="active"><div class="col-md-5 mx-10">
                <a href="{{ url('/user/count') }}"><button type="button" class="btn btn-outline-dark">configuracion cuenta</button></a>
            </div> 

            <li class="active"><div class="col-md-5 mx-10">
                <a href="{{ url('/posts/create') }}"><button type="button" class="btn btn-outline-dark">crear publicacion</button></a>
            </div>  
        
          </ul>
      
          
        </div>
      </nav>  
    @endauth
    

    @foreach ($posts as $post)
    <div class=" align-self-start ">
        <div class="card col-md--2 mx-auto">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ url('/posts/' . $post->id) }}">
                        {{$post->title}}
                    </a>
                    
                </h5>
                @if (Request::url() === url('/posts/myPosts'))
                    <form method="POST" action="{{ url('/posts/myPosts/' . $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="card-body d-flex justify-content-between align-items-center">
                            
                            <button type="submit" class="btn btn-primary btn-sm ml-auto">Eliminar publicacion</button>
                        </div>
                        
                    </form>
                    
                        
                @endif
            </div>
        </div>  
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection
