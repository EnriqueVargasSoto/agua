@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5 class="mb-0">Documentos</h5></div>
                            <div class="col-6">
                                <button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</button>
                            </div>
                        </div>
                        
                        
                        <p class="text-sm mb-0">
                        
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tipo de Documento</th>
                                    <th>Título</th>
                                    <th>Fecha</th>
                                    <th>Documento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                    <tr>
                                        <?php $tipo = App\Models\TipoDocumento::find($documento->idTipoDocumento); ?>
                                        <td class="text-sm font-weight-normal">{{$tipo->tipo}}</td>
                                        <td class="text-sm font-weight-normal">{{$documento->titulo}}</td>
                                        <td class="text-sm font-weight-normal">{{$documento->fecha}}</td>
                                        <td class="text-sm font-weight-normal">
                                            <a href="https://sastartarchico.com/documentos/{{$documento->documento}}" target="_blank" class="btn btn-success">Ver</a>
                                            
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a href="#editModal{{$documento->id}}"  data-bs-toggle="modal" class="btn btn-primary">Editar</a>
                                            
                                            <a href="{{ route('documentos.destroy', $documento->id)}}" class="btn btn-danger">Eliminar</a>
                                           
                                            
                                            
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('documentos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tipo de Documento</label>
                                <select name="idTipo" id="" class="form-control">
                                    @foreach ($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Título</label>
                                <input type="text" name="titulo" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Documento</label>
                                <input type="file" name="documento" class="form-control">
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

    @foreach ($documentos as $documento)
    <div class="modal fade" id="editModal{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('documentos.update', $documento->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tipo de Documento</label>
                                <select name="idTipo" id="" class="form-control" value="{{$documento->idTipoDocumento}}">
                                    <?php $tipoAux = App\Models\TipoDocumento::find($documento->idTipoDocumento); ?>
                                    <option value="{{$documento->idTipoDocumento}}">{{$tipoAux->tipo}}</option>
                                    @foreach ($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Título</label>
                                <input type="text" name="titulo" class="form-control" value="{{$documento->titulo}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="{{$documento->fecha}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Documento</label>
                                <input type="file" name="documento" class="form-control">
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
    @endforeach
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