@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <form action="{{ route('recibos.create')}}" method="post">
                        @csrf
                        <input type="text" name="idCiclo" value="{{$ciclo->id}}" hidden>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6"><h5 class="mb-0">{{$ciclo->mes}} / {{$ciclo->anio}}</h5></div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#cerateModal">Generar Recibos</button>
                                </div>
                            </div>
                            
                            
                            <p class="text-sm mb-0">
                            
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Ciclo</th>
                                        <th>Suministro</th>
                                        <th>Valor</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <!--<th>Opciones</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalle as $item)
                                        <tr>
                                            <?php $suministro = App\Models\Suministro::find($item->idSuministro) ?>
                                            <td class="text-sm font-weight-normal" style="text-align: center">{{$suministro->direccion}}</td>
                                            <td class="text-sm font-weight-normal" style="text-align: center">{{$suministro->codigo}}</td>
                                            <td class="text-sm font-weight-normal" style="text-align: center"><span id="precio{{$item->idSuministro}}">{{$item->precio}}</span></td>
                                            <td class="text-sm font-weight-normal" style="text-align: center" style="width: 50px">
                                                @if ($ciclo->estado == '1')
                                                {{$item->cantidad}}
                                                @else
                                                <input type="numeric" name="cantidad{{$suministro->id}}" class="form-control" >
                                                @endif
                                                
                                            </td>
                                            <td class="text-sm font-weight-normal" style="text-align: center">
                                                <span>{{$item->total}}</span>
                                            </td>
                                            <!--<td class="text-sm font-weight-normal">
                                                <a href="#" data-bs-toggle="modal" class="btn btn-success">Generar Recibo</a>
                                                
                                                
                                                
                                            </td>-->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    
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
    {{--<div class="modal fade" id="cerateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Ciclo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('ciclos.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Año</label>
                                <input type="text" name="anio" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Mes</label>
                                <input type="text" name="mes" class="form-control">
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
    </div>--}}


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

    <script>
        function cambiaTotal( cantidad){
            //console.log(precio);
            console.log(cantidad);
            //console.log(total);
        }
    </script>
@endsection