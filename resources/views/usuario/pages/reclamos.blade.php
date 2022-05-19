@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h5 class="mb-0">Reclamo</h5></div>
                            <div class="col-6">
                                <!--<button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</button>-->
                            </div>
                        </div>
                        
                        
                        <p class="text-sm mb-0">
                        
                        </p>
                    </div>
                    <div style="padding-left: 20%;padding-right:20%;padding-top:3%;padding-bottom:5%;">
                        
                        <form action="{{ route('reclamos.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Asunto</label>
                                    <input type="text" name="asunto" class="multisteps-form__input form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Detalle del Reclamo</label>
                                    <textarea type="text" name="mensaje" class="multisteps-form__input form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="margin-top: 10%;width:100%">Enviar</button>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection