@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5 class="mb-0">Mis Datos</h5></div>
                            <div class="col-6">
                                <!--<button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</button>-->
                            </div>
                        </div>

                        <p class="text-sm mb-0">
                            <!--Cambio de contraseña-->
                        </p>
                    </div>
                    <div style="padding-left: 20%;padding-right:20%;padding-top:3%;padding-bottom:5%;">
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="">Nombres y Apellidos</label>
                                <input type="text" name="nombres" class="multisteps-form__input form-control" value="{{$perfil->nombres}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">DNI</label>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$perfil->dni}}">
                            </div>
                            <div class="col-6">
                                <label for="">Email</label>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$perfil->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Direccion</label>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$perfil->direccion}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Departamento</label>
                                <?php $departamento = App\Models\Departamento::find($perfil->idDepartamento); ?>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$departamento->departamento}}">
                            </div>
                            <div class="col-6">
                                <label for="">Provincia</label>
                                <?php $provincia = App\Models\Provincia::find($perfil->idProvincia); ?>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$provincia->provincia}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Distrito</label>
                                <?php $departamento = App\Models\Departamento::find($perfil->idDepartamento); ?>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$departamento->departamento}}">
                            </div>
                            <div class="col-6">
                                <label for="">Distrito</label>
                                <?php $distrito = App\Models\Distrito::find($perfil->idDistrito); ?>
                                <input type="text" name="asunto" class="multisteps-form__input form-control" value="{{$distrito->distrito}}">
                            </div>
                        </div>
                        
                        <!--<button class="btn btn-success" style="margin-top: 10%;width:100%">Actualizar</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection