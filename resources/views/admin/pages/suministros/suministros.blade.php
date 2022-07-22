@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5 class="mb-0">Suministros</h5></div>
                            <div class="col-6">
                                <button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#cerateModal">Nuevo</button>
                            </div>
                        </div>
                        
                        
                        <p class="text-sm mb-0">
                        
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>Numero de Suministro</th>
                                    <th>Afiliado</th>
                                    <th>Monto Deuda</th>
                                    <th>Medida Inicial</th>
                                    <th>Medida Final</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suministros as $suministro)
                                    <tr>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$suministro->codigo}}</td>
                                        <?php   $usuario = App\Models\User::find($suministro->idUsuario); 
                                                
                                                $perfil = App\Models\Perfil::find($usuario->idPerfil);

                                                $recibos = App\Models\Recibo::where('idSuministro', $suministro->id)->get();
                                                $monto = 0;
                                                foreach ($recibos as $key => $recibo) {
                                                    $monto = $monto + $recibo->total;
                                                }
                                        ?>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$perfil->nombres}} {{$perfil->apellidoPaterno}} {{$perfil->apellidoMaterno}}</td>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$monto}}</td>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$suministro->medidaInicio}}</td>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$suministro->medidaFin}}</td>
                                        <td class="text-sm font-weight-normal">
                                            <a href="#modalRecibo{{$suministro->id}}" data-bs-toggle="modal" class="btn btn-success">Recibos</a>
                                            <a href="#"  class="btn btn-secundary">Historial</a>
                                            <a href="#editModal" data-bs-toggle="modal" class="btn btn-info">Editar</a>
                                            {{--@if ($concepto->tipo == 'editable')--}}
                                            <a href="" class="btn btn-danger">Eliminar</a>
                                            {{--@endif--}}
                                            
                                            
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
    <div class="modal fade" id="cerateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Suministro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store.suministros')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Afiliado</label>
                                <select name="idUsuario" id="" class="form-control">
                                    <?php $usuarios = App\Models\User::where('idRol', 2)->get(); ?>
                                    @foreach ($usuarios as $usuario)
                                    <?php $perfil = App\Models\Perfil::find($usuario->idPerfil); ?>
                                    <option value="{{$usuario->id}}">{{$perfil->nombres}} {{$perfil->apellidoPaterno}} {{$perfil->apellidoMaterno}}</option>
                                    @endforeach
                                  
                                  
                                </select>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Direccion de Instalacion</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-12">
                                <label for="">Valor</label>
                                <input type="decimal" name="valor" class="form-control">
                            </div>
                        </div>-->
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn bg-gradient-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($suministros as $item)
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
              <div class="card-header">
                <div class="row">
                  <div class="col-6"><h5 class="mb-0">Suministro : {{$item->codigo}}</h5></div>
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
                        <?php $recibos = App\Models\Recibo::where('idSuministro',$item->id)->get(); ?>
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
@endsection