<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{$css ?? ''}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <title>Inicio - {{$titulo ?? ''}}</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 150, 63);" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">  <img src="{{ asset('images/universidad.webp') }}" alt="universidad" style="height: 50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
           <strong ><a class="nav-link active" aria-current="page" href="#" style="color: white;">Inicio</a></strong> 
          </li>
          <li class="nav-item">
            <strong><a class="nav-link" href="#" style="color: white;">Pricing</a></strong>
          </li>
          <li class="nav-item">
            <strong><a class="nav-link" href="#" style="color: white;">Pricing</a></strong>
          </li>
          <li class="nav-item">
            <strong><a class="nav-link" href="#" style="color: white;">Pricing</a></strong>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  @if (session('status'))
  <div class="alert alert-success alert-dismissible fade show " style="text-align: center">
      {{ session('status') }}
  </div>
@endif

  @if (session('status1'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
    {{session('status1')}}
  </div>
  @endif
    {{$slot}}
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<footer>
  <img src="{{ asset('images/logo.webp') }}" alt="logo" style="height: 100px">
</footer>

<style>
  body{
    background-image: url('/images/fondo.svg'); }
      footer{
        background-image: url('/images/fondo.svg');
            display: flex;
            justify-content: center;
            align-items: center;
        }
</style>
</body>
</html>