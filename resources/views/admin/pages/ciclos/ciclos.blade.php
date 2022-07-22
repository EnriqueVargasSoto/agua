@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5 class="mb-0">Ciclos</h5></div>
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
                                    <th>Año</th>
                                    <th>Mes</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ciclos as $ciclo)
                                    <tr>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$ciclo->anio}}</td>
                                        <td class="text-sm font-weight-normal" style="text-align: center">{{$ciclo->mes}}</td>
                                        <td class="text-sm font-weight-normal">
                                            <a href="{{ route('detalle.index', $ciclo->id)}}" class="btn btn-success">Ver</a>
                                            <a href="{{ route('ciclos.destroy', $ciclo->id)}}" class="btn btn-danger">Eliminar</a>
                                            <!--<a href="#editModal" data-bs-toggle="modal" class="btn btn-info">Generar</a>-->
                                            
                                            
                                            
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
                                <select name="anioNew" data-placeholder="Año" class="multisteps-form__input form-control">
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Mes</label>
                                <select name="mesNew" data-placeholder="Mes" class="multisteps-form__input form-control">
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setiembre">Setiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>   
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