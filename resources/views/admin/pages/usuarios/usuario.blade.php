@extends('admin.layouts.layout')

@section('content')
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <div class="row">
              <div class="col-6"><h5 class="mb-0">Usuarios</h5></div>
              <div class="col-6">
                <button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#createModal">Nuevo</button>
              </div>
            </div>
            
            
            <p class="text-sm mb-0">
              
            </p>
          </div>
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
              <thead class="thead-light">
                <tr>
                  <th>Nombres</th>
                  <th>DNI</th>
                  <th>Direccion</th>
                  <th>Correo</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($usuarios as $usuario)
                    <?php $perfil = App\Models\Perfil::find($usuario->idPerfil); ?>
                    <tr>
                      <td class="text-sm font-weight-normal">{{$perfil->nombres}}</td>
                      <td class="text-sm font-weight-normal">{{$perfil->dni}}</td>
                      <td class="text-sm font-weight-normal">{{$perfil->direccion}}</td>
                      <td class="text-sm font-weight-normal">{{$perfil->email}}</td>
                      <td class="text-sm font-weight-normal">
                        @if ($usuario->estado == 'inactivo')
                        <span class="badge badge-sm badge-secondary">Inactivo</span>
                        @else
                        <span class="badge badge-sm badge-success">Activo</span>
                        @endif
                      </td>
                      <td class="text-sm font-weight-normal">
                        <a href="#modalSuministros{{$usuario->id}}" class="btn btn-primary" data-bs-toggle="modal">Suministros</a>
                        <a href="#modalRecibo{{$usuario->id}}" class="btn btn-secondary" data-bs-toggle="modal">Recibos</a>
                        <a href="#exampleModal{{$usuario->id}}" class="btn btn-success" data-bs-toggle="modal">Ver Perfil</a>
                        @if ($usuario->estado == 'inactivo')
                        <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-info">Activar</a>
                        @else
                        <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-warning">Inactivar</a>
                        @endif
                        <a href="{{ route('usuario.delete', $usuario->id)}}" class="btn btn-danger">Eliminar</a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4" style="display: none;">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-basic">
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Crear-->
  @foreach ($usuarios as $item)
  <?php $perfil = App\Models\Perfil::find($item->idPerfil); ?>
  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <label for="">Nombres y Apellidos</label>
              <input type="text" name="" id="" value="{{$perfil->nombres}}" class="multisteps-form__input form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="">DNI</label>
              <input type="text" name="" id="" value="{{$perfil->dni}}" class="multisteps-form__input form-control" disabled>
            </div>
            <div class="col-6">
              <label for="">Email</label>
              <input type="text" name="" id="" value="{{$perfil->email}}" class="multisteps-form__input form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="">Direccion</label>
              <input type="text" name="" id="" value="{{$perfil->direccion}}" class="multisteps-form__input form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="">Departamento</label>
              <?php $departamento = App\Models\Departamento::find($perfil->idDepartamento); ?>
              <input type="text" name="" id="" value="{{$departamento->departamento}}" class="multisteps-form__input form-control" disabled>
            </div>
            <div class="col-6">
              <label for="">Provincia</label>
              <?php $provincia = App\Models\Provincia::find($perfil->idProvincia); ?>
              <input type="text" name="" id="" value="{{$provincia->provincia}}" class="multisteps-form__input form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="">Distrito</label>
              <?php $distrito = App\Models\Distrito::find($perfil->idDistrito); ?>
              <input type="text" name="" id="" value="{{$distrito->distrito}}" class="multisteps-form__input form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-12" style="text-align: center;margin-top:5%;">
              <a href="" class="btn btn-success" style="width: 30%;">DNI-frontal</a>
              <a href="" class="btn btn-success" style="width: 30%;">DNI-posterior</a>
              <a href="" class="btn btn-success" style="width: 30%;">Escritura</a>
            </div>
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($usuarios as $item)
  <?php $suministros = App\Models\Suministro::where('idUsuario',$item->id)->get(); ?>
  <div class="modal fade" id="modalSuministros{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Suministros</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Codigo</th>
                  <th>Direccion</th>
                  <th>Estado</th>
                  <!--<th>Estado</th>
                  <th>Opciones</th>-->
                </tr>
              </thead>
              <tbody>
                @foreach ($suministros as $key => $suministro)
                    <?php $perfil = App\Models\Perfil::find($usuario->idPerfil); ?>
                    <tr>
                      <td class="text-sm font-weight-normal">{{$key+1}}</td>
                      <td class="text-sm font-weight-normal">{{$suministro->codigo}}</td>
                      <td class="text-sm font-weight-normal">{{$suministro->direccion}}</td>
                      {{--<td class="text-sm font-weight-normal">{{$suministro->estado}}</td>--}}
                      <td class="text-sm font-weight-normal">
                        @if ($suministro->estado == 'suspendido')
                        <span class="badge badge-sm badge-secondary">Suspendido</span>
                        @else
                        <span class="badge badge-sm badge-success">Activo</span>
                        @endif
                      </td>
                      {{--<td class="text-sm font-weight-normal">
                        <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-info">Suministros</a>
                        <a href="#exampleModal{{$usuario->id}}" class="btn btn-success" data-bs-toggle="modal">Ver Perfil</a>
                        @if ($usuario->estado == 'inactivo')
                        <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-info">Activar</a>
                        @else
                        <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-warning">Inactivar</a>
                        @endif
                        <a href="{{ route('usuario.delete', $usuario->id)}}" class="btn btn-danger">Eliminar</a>
                      </td>--}}
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($usuarios as $item)
  <?php $suministros = App\Models\Suministro::where('idUsuario',$item->id)->get(); ?>
  <div class="modal fade" id="modalRecibo{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"  style="max-width: 775px!important;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recibos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @foreach ($suministros as $key => $suministro)
          <div class="card-header">
            <div class="row">
              <div class="col-6"><h5 class="mb-0">Suministro : {{$suministro->codigo}}</h5></div>
              <div class="col-6">
                <!--<button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</button>-->
              </div>
            </div>
            
            
            <p class="text-sm mb-0">
              
            </p>
          </div>
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Codigo de Suministro</th>
                  <th>Concepto</th>
                  <th>Monto</th>
                  <th>Estado</th>
                  <!--<th>Estado</th>
                  <th>Opciones</th>-->
                </tr>
              </thead>
              <tbody>
                    <?php $recibos = App\Models\Recibo::where('idSuministro',$suministro->id)->get(); ?>
                    @foreach ($recibos as $key => $recibo)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$key+1}}</td>
                        <td class="text-sm font-weight-normal">{{$suministro->codigo}}</td>
                        <td class="text-sm font-weight-normal">{{$recibo->concepto}}</td>
                        <td class="text-sm font-weight-normal">{{$recibo->total}}</td>
                        {{--<td class="text-sm font-weight-normal">{{$suministro->estado}}</td>--}}
                        <td class="text-sm font-weight-normal">
                          @if ($recibo->estado == 'pendiente')
                          <span class="badge badge-sm badge-secondary">Pendiente</span>
                          @else
                          <span class="badge badge-sm badge-success">Pagado</span>
                          @endif
                        </td>
                        {{--<td class="text-sm font-weight-normal">
                          <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-info">Suministros</a>
                          <a href="#exampleModal{{$usuario->id}}" class="btn btn-success" data-bs-toggle="modal">Ver Perfil</a>
                          @if ($usuario->estado == 'inactivo')
                          <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-info">Activar</a>
                          @else
                          <a href="{{ route('usuario.cambia-estado', $usuario->id)}}" class="btn btn-warning">Inactivar</a>
                          @endif
                          <a href="{{ route('usuario.delete', $usuario->id)}}" class="btn btn-danger">Eliminar</a>
                        </td>--}}
                      </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('storeDesdeAdmin.solicitud')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <label for="">Nombres</label>
                <input type="text" name="nombres" id="" class="multisteps-form__input form-control" >
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="">Apellido Paterno</label>
                <input type="text" name="apellidoPaterno" id="" class="multisteps-form__input form-control" >
              </div>
              <div class="col-6">
                <label for="">Apellido Materno</label>
                <input type="text" name="apellidoMaterno" id="" class="multisteps-form__input form-control" >
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="">DNI</label>
                <input type="text" name="dni" id="" class="multisteps-form__input form-control" >
              </div>
              <div class="col-6">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="multisteps-form__input form-control" >
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="">Telefono</label>
                <input type="text" name="telefono" id="" class="multisteps-form__input form-control" >
              </div>
              <div class="col-6">
                <label for="">Departamento</label>
                <?php $departamentos = App\Models\Departamento::all(); ?>
                <select name="idDepartamento" data-placeholder="Departamento" class="multisteps-form__input form-control">
                    @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}">{{$departamento->departamento}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="">Provincia</label>
                <?php $provincias = App\Models\Provincia::where('idDepartamento',6)->get(); ?>
                <select name="idProvincia" data-placeholder="Provincia" class="multisteps-form__input form-control">
                    @foreach ($provincias as $provincia)
                    <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="">Distrito</label>
                <?php $distritos = App\Models\Distrito::where('idProvincia', 1)->get(); ?>
                <select name="idDistrito" data-placeholder="Distrito" class="multisteps-form__input form-control" >
                    @foreach ($distritos as $distrito)
                    <option value="{{$distrito->id}}">{{$distrito->distrito}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label for="">Direccion</label>
                <input type="text" name="direccion" id="" class="multisteps-form__input form-control" >
              </div>
            </div>
  
            <div class="row">
              <div class="col-12">
                <label for="">Foto Delantera DNI</label>
                <input type="file" name="imgDniFront" accept="image/*, application/pdf" class="multisteps-form__input form-control" >
              </div>
            </div>
  
            <div class="row">
              <div class="col-12">
                <label for="">Foto Trasera DNI</label>
                <input type="file" name="imgDniBack" accept="image/*, application/pdf" class="multisteps-form__input form-control" >
              </div>
            </div>
  
            <div class="row">
              <div class="col-12">
                <label for="">Copia de Escritura</label>
                <input type="file" name="imgEscritura" accept="image/*, application/pdf" class="multisteps-form__input form-control" >
              </div>
            </div>
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('admin/assets/js/plugins/multistep-form.js')}}"></script>
  <script src="{{ asset('admin/assets/js/plugins/datatables.js')}}"></script>

  <script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
      searchable: false,
      fixedHeight: true
    });

    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
@endsection