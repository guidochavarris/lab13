@extends('layouts.app')

@section('content')

  <table class="table">
      <thead>
          <tr>
              <th scope="col">Fecha</th>
              <th scope="col">Mensaje</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($notificaciones as $notificacion)
          <tr>
              <th>{{$notificacion ->created_at}}</th>
              <th>{{$notificacion ->message}}</th>
          </tr>

          @php
            $notificaciones->markAsRead
          @endphp
              
          @endforeach
      </tbody>

  </table>
    
@endsection