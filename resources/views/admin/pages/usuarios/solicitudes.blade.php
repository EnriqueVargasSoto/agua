@extends('admin.layouts.layout')

@section('content')
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <div class="row">
              <div class="col-6"><h5 class="mb-0">Solicitudes</h5></div>
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
                  <th>Nombres</th>
                  <th>DNI</th>
                  <th>Imagen DNI - Frontal</th>
                  <th>Imagen DNI - Posterior</th>
                  <th>Direccion</th>
                  <!--<th>Departamento</th>
                  <th>Provincia</th>
                  <th>Distrito</th>
                  <th>Correo</th>-->
                  <th>Imagen Escritura</th>
                  <!--<th>Estado Pago</th>-->
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr>
                      <td class="text-sm font-weight-normal">{{$solicitud->nombres}}</td>
                      <td class="text-sm font-weight-normal">{{$solicitud->dni}}</td>
                      <td class="text-sm font-weight-normal">
                        {{--<img src="{{ asset('img/dni/'.$solicitud->imgDniFront)}}" alt="" style="height: 70px">--}}
                        <a href="https://sastartarchico.com/img/dni/{{$solicitud->imgDniFront}}" target="_blank" class="btn btn-success">Ver</a>
                      </td>
                      <td class="text-sm font-weight-normal">
                        {{--<img src="{{ asset('img/dni/'.$solicitud->imgDniBack)}}" alt="" style="height: 70px">--}}
                        <a href="https://sastartarchico.com/img/dni/{{$solicitud->imgDniBack}}" target="_blank" class="btn btn-success">Ver</a>
                      </td>
                      <td class="text-sm font-weight-normal">{{$solicitud->direccion}}</td>
                      {{--<td class="text-sm font-weight-normal">
                        <?php $departamento = App\Models\Departamento::find($solicitud->idDepartamento); 
                        echo($departamento->departamento) ?>
                      </td>
                      <td class="text-sm font-weight-normal">
                        <?php $provincia = App\Models\Provincia::find($solicitud->idProvincia); 
                        echo($provincia->provincia) ?>
                      </td>
                      <td class="text-sm font-weight-normal">
                        <?php $distrito = App\Models\Distrito::find($solicitud->idDistrito); 
                        echo($distrito->distrito) ?>
                      </td>
                      <td class="text-sm font-weight-normal">{{$solicitud->email}}</td>--}}
                      <td class="text-sm font-weight-normal"> 
                        <!--<object data="your_url_to_pdf" type="application/pdf">
                          <iframe src="https://docs.google.com/viewer?url=your_url_to_pdf&embedded=true"></iframe>
                        </object>-->
                        <a href="https://sastartarchico.com/img/escritura/{{$solicitud->imgEscritura}}" target="_blank" class="btn btn-success">Ver</a>
                      </td>
                      {{--<td class="text-sm font-weight-normal">
                        @if ($solicitud->estadoPago == 'pendiente')
                        <span class="badge badge-sm badge-secondary">Pendiente</span>
                        @else
                        <span class="badge badge-sm badge-success">Pagado</span>
                        @endif
                      </td>--}}
                      <td class="text-sm font-weight-normal">
                        <a href="{{ route('activa.usuario', $solicitud->id)}}" class="btn btn-primary">Activar Usuario</a>
                        <a href="{{ route('perfil.delete', $solicitud->id)}}" class="btn btn-danger">Eliminar</a>
                      </td>
                    </tr>
                @endforeach
                {{--@foreach ($usuarios as $usuario)
                <?php //$perfil = App\Models\Perfil::find($usuario->id); ?>
                <tr>
                  <td class="text-sm font-weight-normal">{{$perfil->nombres}}</td>
                  <td class="text-sm font-weight-normal">{{$perfil->apellidos}}</td>
                  <td class="text-sm font-weight-normal">{{$perfil->email}}</td>
                  <td class="text-sm font-weight-normal">{{$perfil->direccion}}</td>
                  <td class="text-sm font-weight-normal">{{$perfil->telefono}}</td>
                  <td class="text-sm font-weight-normal">
                    @if ($usuario->estado = 'activo')
                      <span class="badge badge-sm badge-success">Activo</span>
                    @else
                      <span class="badge badge-sm badge-secondary">Inactivo</span>
                    @endif
                  </td>
                  <td class="text-sm font-weight-normal"></td>
                </tr>
                @endforeach--}}
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
    <!--<footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com/" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com/" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>-->
  </div>
  <!-- Modal Crear-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="multisteps-form mb-5">
            <!--progress bar-->
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto my-4">
                <div class="card">
                  <div class="card-body">
                    <div class="multisteps-form__progress">
                      <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                        <span>User Info</span>
                      </button>
                      <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                      <button class="multisteps-form__progress-btn" type="button" title="Socials">Socials</button>
                      <button class="multisteps-form__progress-btn" type="button" title="Profile">Profile</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8">
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">About me</h5>
                    <p class="mb-0 text-sm">Mandatory informations</p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>First Name</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="eg. Michael" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Last Name</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="eg. Prior" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Company</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="eg. Creative Tim" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Email Address</label>
                          <input class="multisteps-form__input form-control" type="email" placeholder="eg. argon@dashboard.com" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Password</label>
                          <input class="multisteps-form__input form-control" type="password" placeholder="******" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Repeat Password</label>
                          <input class="multisteps-form__input form-control" type="password" placeholder="******" />
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Address</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col">
                          <label>Address 1</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="eg. Street 111" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col">
                          <label>Address 2</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="eg. Street 221" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>City</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="eg. Tokyo" />
                        </div>
                        <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                          <label>State</label>
                          <select class="multisteps-form__select form-control">
                            <option selected="selected">...</option>
                            <option value="1">State 1</option>
                            <option value="2">State 2</option>
                          </select>
                        </div>
                        <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                          <label>Zip</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="7 letters" />
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Socials</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12">
                          <label>Twitter Handle</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="@argon" />
                        </div>
                        <div class="col-12 mt-3">
                          <label>Facebook Account</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="https://.../" />
                        </div>
                        <div class="col-12 mt-3">
                          <label>Instagram Account</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="https://.../" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                          <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Profile</h5>
                    <div class="multisteps-form__content mt-3">
                      <div class="row">
                        <div class="col-12">
                          <label>Public Email</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="Use an address you don't use frequently." />
                        </div>
                        <div class="col-12 mt-3">
                          <label>Bio</label>
                          <textarea class="multisteps-form__textarea form-control" rows="5" placeholder="Say a few words about who you are or what you're working on."></textarea>
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn bg-gradient-primary">Save changes</button>
        </div>
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