@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="card h-100 ">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize">Suministros</h5>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-group list-group-flush">
                        @foreach ($suministros as $suministro)
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <!--<div class="col-auto d-flex align-items-center">
                                    <a href="javascript:;" class="avatar">
                                    <img class="border-radius-lg" alt="Image placeholder" src="{{ asset('admin/assets/img/team-1.jpg')}}">
                                    </a>
                                </div>-->
                                <div class="col ml-2">
                                    <h6 class="mb-0">
                                    <a href="javascript:;">{{$suministro->codigo}}</a>
                                    </h6>
                                    <span>{{$suministro->direccion}}</span><br>
                                    @if ($suministro->estado == 'activo')
                                    <span class="badge badge-success badge-sm">Activo</span>
                                    @else
                                    <span class="badge badge-warning badge-sm">Suspendido</span>
                                    @endif
                                    
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-outline-primary btn-xs mb-0" onclick="listarRecibos({{$suministro}})">Ver</button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Mis Recibos</h5></div>
                        <div class="col-6">
                            <!--<button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</button>-->
                        </div>
                    </div>

                    <p class="text-sm mb-0">
                        <!--Cambio de contraseña-->
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_detalle_modal" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7" style="text-align: center;">Suministro</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2" style="text-align: center;">Total</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2" style="text-align: center;">Estado</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2" style="text-align: center;">Concepto</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2" style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                            <h6 class="mb-0 text-xs">Spotify</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">$2,500</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">working</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 text-xs">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-dark mb-0">
                                            <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-invision.svg" class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">Invision</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">$5,000</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-success"></i>
                                            <span class="text-dark text-xs">done</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 text-xs">100%</span>
                                            <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-dark mb-0" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-jira.svg" class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">Jira</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">$3,400</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-danger"></i>
                                            <span class="text-dark text-xs">canceled</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 text-xs">30%</span>
                                            <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30" style="width: 30%;"></div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-dark mb-0" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-slack.svg" class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                            <h6 class="mb-0 text-xs">Slack</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">$1,000</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-danger"></i>
                                            <span class="text-dark text-xs">canceled</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 text-xs">0%</span>
                                            <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%;"></div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-dark mb-0" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-webdev.svg" class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                            <h6 class="mb-0 text-xs">Webdev</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">$14,000</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">working</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 text-xs">80%</span>
                                            <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="width: 80%;"></div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-dark mb-0" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-xd.svg" class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                            <h6 class="mb-0 text-xs">Adobe XD</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">$2,300</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-success"></i>
                                            <span class="text-dark text-xs">done</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 text-xs">100%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-dark mb-0" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    function listarRecibos(suministro){
        var ip = window.location.origin+'';
        console.log(suministro);
        let idSuministro = suministro.id;
        let fila = '';
        $.ajax({
            url: ip + "/lsitar-recibos/" + idSuministro,
            type: "GET",
            dataType: "JSON",
            async: "false",
            success: function (data) {
                console.log(data);
                console.log(data.length);
                for (let i = 0; i < data.length; i++) {
                    //const element = array[i];
                    let filaEstado = '';
                    if (data[i].estado == 'pendiente') {
                        filaEstado += '<td><span class="badge badge-dot me-4"><i class="bg-danger"></i><span class="text-dark text-xs">'+data[i].estado+'</span></span></td>';
                    } else {
                        filaEstado += '<td><span class="badge badge-dot me-4"><i class="bg-success"></i><span class="text-dark text-xs">'+data[i].estado+'</span></span></td>';
                    }
                    fila += '<tr><td style="text-align: center;"><strong>'+suministro.codigo+'</strong></td>'+
                            '<td><p class="text-xs font-weight-bold mb-0">'+data[i].total+'</p></td>'+filaEstado+
                            '<td class="align-middle text-center"><div class="d-flex align-items-center"><span class="me-2 text-xs">'+data[i].concepto+'</span><div></div></td>'+
                            '<td><a class="btn btn-info">Pagar</a></td></tr>';
                }
                $("#tbl_detalle_modal tbody tr").remove();
                $("#tbl_detalle_modal tbody").append(fila);
                /*if (data.username == "admin") {
                    document.getElementById("block_precio_convenio").style.display =
                        "";
                } else {
                    document.getElementById("block_precio_convenio").style.display =
                        "none";
                }*/
            },
        });
    }

    
</script>

@endsection