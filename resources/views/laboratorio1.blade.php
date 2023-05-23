<x-layout titulo="laboratorio 1">
  <x-slot name="css"><link rel="stylesheet" href="{{ asset('css/laboratorio1.css') }}"></x-slot>
<section style="display: flex; justify-content: center; align-items: baseline">
    <strong style="width: 50%">Lista de reactivos en el Laboratorio 1</strong>
    


        <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal" >
    Crear Reactivo
</button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Reactivo</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form   action="{{ route('postReactivo')}}"method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="codigo" placeholder="Codigo del reactivo">
                    <label for="floatingInput">Codigo del reactivo</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Nombre del reactivo" name="nombre">
                    <label>Nombre del reactivo</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" placeholder="Cantidad de reactivo" name="cantidad">
                  <label>Cantidad de reactivo</label>
              </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="imagen">
                    <label >Inserte la imagen del reactivo</label>
                </div> 
                <div class="form-floating mb-3">
                  <input type="file" class="form-control"  name="ficha_seguridad">
                  <label >Inserte la ficha tecnica del reactivo</label>
              </div> 
                        
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Crear reactivo</button>
            </div>
          </form> 
          </div>
        </div>
      </div>
</section>
    <!---boton para buscar en la tabla--->
    <div class="boton">
      <form class="d-flex" role="search" action="{{ route('viewReactivo') }}" method="get">
        @csrf
        <input class="form-control me-2" type="search" placeholder="¿Estás buscando algo?" aria-label="¿Estás buscando algo?" name="query">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
    
    </div>



<div class="bd-example" style="height: 75vh">
  <table class="table table-striped table-hover">
      <thead>
    <tr>
    
      <th scope="col">Codigo del reactivo</th>
      <th scope="col">Nombre del reactvo</th>
      <th scope="col">Cantidad de reactivo</th>
      <th scope="col">Visualizar</th>
      <th scope="col">Eliminar reactivo</th>
      <th scope="col">Editar reactivo</th>
    </tr>
  </thead>
  <tbody>
    @if(count($informacion)<=0)
    <tr>
      <td colspan="6">No hay resultados para tu busqueda</td>
    </tr>
    @else
    @foreach($informacion as $item)
    <tr>
      <td>{{ $item->codigo_producto }}</td>
      <td>{{  $item->nombre_reactivo }}</td>
      <td>{{ $item->cantidad }}</td>
      <td><a href=""><i  class="bi bi-receipt" style="font-size: 18px; color: black"></i></a></td> 
      <td><form method="POST" action="">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash" style="font-size: 15px;"></i></button>
    </form>
    </td>
    <td>
     <a  class="btn btn-outline-warning"   href=""><i class="bi bi-pen" style="font-size: 18px ;" ></i></a>
  </td>
      @endforeach
      @endif
    </tr>
  </tbody>
  </table>
  {{$informacion->links()}}
</div>

</x-layout>