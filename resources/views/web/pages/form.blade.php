@extends('web.layouts.layout')

@section('content')
    <section class="banner-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp" style="padding-top: 0px!important;">
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Dashboard -->
    <section class="user-dashboard" style="padding-left: 12%;padding-right:12%;padding-top:5%">
        <div class="dashboard-outer">
            <div class="upper-title-box" style="margin-bottom: 5%;">
                <h3>Afiliación !</h3>
                <div class="text"></div>
            </div>
  
            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <!--<div class="widget-title">
                                <h4>Post Job</h4>
                            </div>-->
            
                            <div class="widget-content">
            
                                <!--<div class="post-job-steps">
                                    <div class="step">
                                        <span class="icon flaticon-briefcase"></span>
                                        <h5>Job Detail</h5>
                                    </div>
                
                                    <div class="step">
                                        <span class="icon flaticon-money"></span>
                                        <h5>Package & Payments</h5>
                                    </div>
                
                                    <div class="step">
                                        <span class="icon flaticon-checked"></span>
                                        <h5>Confirmation</h5>
                                    </div>
                                </div>-->
            
                                <form class="default-form" action="{{ route('registrar.solicitud')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-lg-12 col-md-12">
                                            <div class="row">
                                                <label>DNI</label>
                                            </div>
                                            <div class="row">
                                                <input type="text" id="dni" name="dni" placeholder="" style="width:80%">
                                            <button class="theme-btn btn-style-one" style="width: 20%;" onclick="buscarPersona()">Buscar</button>
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                           
                                            <div class="row">
                                                <div class="form-group col-lg-4 col-md-12">
                                                    <label>Nombres</label>
                                                    <input type="text" id="nombres" name="nombres" placeholder="" required>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-12">
                                                    <label>Apelllido Paterno</label>
                                                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" placeholder="" required>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-12">
                                                    <label>Apellido Materno</label>
                                                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" placeholder="" required>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                           
                                            <div class="row">
                                                <div class="form-group col-lg-4 col-md-12">
                                                    <label>Departamento </label>
                                                    <?php $departamentos = App\Models\Departamento::all(); ?>
                                                    <select name="idDepartamento" data-placeholder="Departamento" class="chosen-select">
                                                        @foreach ($departamentos as $departamento)
                                                        <option value="{{$departamento->id}}">{{$departamento->departamento}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-12">
                                                    <label>Provincia </label>
                                                    <?php $provincias = App\Models\Provincia::where('idDepartamento',6)->get(); ?>
                                                    <select name="idProvincia" data-placeholder="Provincia" class="chosen-select">
                                                        @foreach ($provincias as $provincia)
                                                        <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-12">
                                                    <label>Distrito </label>
                                                    <?php $distritos = App\Models\Distrito::where('idProvincia', 1)->get(); ?>
                                                    <select name="idDistrito" data-placeholder="Distrito" class="chosen-select " >
                                                        @foreach ($distritos as $distrito)
                                                        <option value="{{$distrito->id}}">{{$distrito->distrito}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Direccion de Suministro</label>
                                            <input type="text" name="direccion" placeholder="">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Correo</label>
                                            <input type="text" name="email" placeholder="">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Telefono</label>
                                            <input type="text" name="telefono" placeholder="">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Foto Delantera DNI</label>
                                            <div >
                                                <div >
                                                  <input class="uploadButton-input" type="file" name="imgDniFront" accept="image/*, application/pdf"/>
                                                  
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Foto Trasera DNI</label>
                                            <div>
                                                <div>
                                                  <input class="uploadButton-input" type="file" name="imgDniBack" accept="image/*, application/pdf"/>
                                                  
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Copia de Escritura</label>
                                            <div>
                                                <div>
                                                  <input class="uploadButton-input" type="file" name="imgEscritura" accept="image/*, application/pdf"/>
                                                </div>
                                            </div>
                                        </div>

                
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12 text-right">
                                            <button type="submit" class="theme-btn btn-style-one">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard -->

    <script>
        function buscarPersona(){
            let token = $("#tokencito").val();
            let dni = $('#dni').val();
            console.log('dni : '+dni);
            var ip = window.location.origin+'';

            $.ajax({
                headers: { "X-CSRF-TOKEN": token },//{'X-CSRF-TOKEN':token},
                type: "GET",
                url: ip + "/buscar-persona/"+dni,
                dataType: "JSON",
                //data: "idSede=" + idSede+"&numeroOrden=" + numeroOrden,
                success: function (data) {
                    console.log(data);
                    $("#nombres").val(data.nombres);
                    $("#apellidoPaterno").val(data.apellidoPaterno);
                    $("#apellidoMaterno").val(data.apellidoMaterno);
                    //document.getElementById("nombre2").val("Test");
                    //$('#nombres').val(data.nombres);
                },
                beforeSend: function () {},
                complete: function () {},
                error: function (request, status, error) {
                    
                    mensaje_danger(request.responseText);
                },
            });
        }
    </script>
@endsection