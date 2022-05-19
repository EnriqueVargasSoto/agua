@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5 class="mb-0">Reclamos</h5></div>
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
                                    <th>Usuario</th>
                                    <th>Asunto</th>
                                    <th>Mensaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reclamos as $reclamo)
                                    <tr>
                                        <?php $usuario = App\Models\User::find($reclamo->idUsuario);
                                                $perfil = App\Models\Perfil::find($usuario->idPerfil);
                                        ?>
                                        <td class="text-sm font-weight-normal">{{$perfil->nombres}} {{$perfil->apellidoPaterno}} {{$perfil->apellidoMaterno}}</td>
                                        <td class="text-sm font-weight-normal">{{$reclamo->asunto}}</td>
                                        <td class="text-sm font-weight-normal">{{$reclamo->mensaje}}</td>
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
    {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Concepto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store.concepto')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Concepto</label>
                                <input type="text" name="concepto" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Valor</label>
                                <input type="decimal" name="valor" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                              <label for="">Tipo</label>
                              <select name="tipo" id="" class="form-control">
                                <option value="fijo">Fijo</option>
                                <option value="editable">Editable</option>
                              </select>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn bg-gradient-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($conceptos as $concepto)
    <div class="modal fade" id="editModal{{$concepto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Concepto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.concepto', $concepto->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Concepto</label>
                                @if ($concepto->tipo == 'editable')
                                <input type="text" name="concepto" class="form-control" value="{{$concepto->concepto}}">
                                @else
                                <input type="text" name="concepto" class="form-control" value="{{$concepto->concepto}}" disabled>
                                @endif
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Valor</label>
                                <input type="decimal" name="valor" class="form-control" value="{{$concepto->valor}}">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                              <label for="">Tipo</label>
                              <select name="tipo" id="" class="form-control">
                                <option value="{{$concepto->tipo}}" style="text-transform: capitalize!important;">{{$concepto->tipo}}</option>
                                <option value="fijo">Fijo</option>
                                <option value="editable">Editable</option>
                              </select>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach--}}
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