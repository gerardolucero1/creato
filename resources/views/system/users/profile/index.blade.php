@extends('layouts.backend')

@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('{{ Auth::user()->profile->banner }}');">
  <div class="bg-primary-dark-op py-30">
      <div class="content content-full text-center">
          <div class="mb-15">
              <a class="img-link" href="#">
                  <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ Auth::user()->profile->photo }}" alt="">
              </a>
          </div>
          <h1 class="h3 text-white font-w700 mb-10">
            {{ Auth::user()->name }}
          </h1>
          <h2 class="h5 text-white-op">
            {{ Auth::user()->email }}
          </h2>
          <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" href="{{ route('users.edit', Auth::user()->id) }}">
              <i class="fa fa-pencil"></i>
          </a>
      </div>
  </div>
</div>
{{-- <main id="main-container" style="min-height: 144px;">
    <div class="bg-image bg-image-bottom" style="background-image: url('{{ Auth::user()->profile->banner }}');">
        <div class="bg-primary-dark-op py-50">
          <div class="offset-md-1">
              <form>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambiarBanner">
                      <i class="si si-camera"></i>
                    </button>
                  </form>
          </div>
          
        </div>
    </div>
    <!-- contenido -->
    <div class="content">
        <div class="row">
            <div class="col-xl-7">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Descripción </h3>
                    </div>
                    <div class="block-content py-50">
                      {{ Auth::user()->profile->description }}
                    </div>
                    <hr>
                      <div class="block-content block-content-full">
                        <i> Proyectos </i>
                            <div class="row py-20">
                                <div class="col-6 text-right border-r">
                                    <div class="js-appear-enabled animated fadeInLeft" data-toggle="appear" data-class="animated fadeInLeft">
                                        <div class="font-size-h3 font-w600">
                                          16
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                                            Projects
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="js-appear-enabled animated fadeInRight" data-toggle="appear" data-class="animated fadeInRight">
                                        <div class="font-size-h3 font-w600">
                                          2
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                                          Active
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                          <div class="block">
                              <div class="block-header">
                                  <h3 class="block-title">
                                      Sales <small>This week</small>
                                  </h3>
                                  <div class="block-options">
                                      <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                          <i class="si si-refresh"></i>
                                      </button>
                                      <button type="button" class="btn-block-option">
                                          <i class="si si-wrench"></i>
                                      </button>
                                  </div>
                              </div>
                              <div class="block-content block-content-full">
                                  <div class="pull-all"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                      <canvas class="js-chartjs-dashboard-lines chartjs-render-monitor" style="display: block; width: 521px; height: 260px;" width="521" height="260"></canvas>
                                  </div>
                                  

                              </div>
                              <div class="block-content">
                                <statistic-component></statistic-component>
                              </div>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Información</h3>
                    </div>
                    <div class="block-content text-center">
                        <!-- imagen de perfil -->
                          <div class="block-content block-content-full">
                              <a class="img-link" href="#" data-toggle="modal" data-target="#cambiarPhoto">
                                  <img class="img-avatar img-avatar128 img-avatar-thumb" src="{{ Auth::user()->profile->photo }}" alt="">
                              </a>
                          </div>
                            <h2 class="h2 font-w700 mb-10">{{ Auth::user()->name }} {{ Auth::user()->profile->last_name }} {{ Auth::user()->profile->second_name }}</h2>
                            <h5>Puesto del administrador en la empresa</h5>
                            <button class="btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#editarInfo"> editar</button>
                            <button class="btn btn-lg btn-outline-secondary">Ver</button>
                          <div class="block-content py-20">
                            <!--Facebook-->
                            <button class="btn btn-primary"><i class="fa fa-facebook-square"></i> Facebook</button>
                            <!--Twitter-->
                            <button class="btn btn-info"><i class="fa fa-twitter-square"></i> Twitter</button>

                          </div>
                      </div>
                        <!-- termina imagen de perfil -->
                    </div>
                </div>
                
            </div>
        </div>

              
              <!-- termina perfil imagen -->  
        </div>
      
        <!-- Modal para banner -->
        <div class="modal fade top" id="cambiarBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
          <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar banner</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    @php
                        $profile = Auth::user();
                    @endphp
                    {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'files' => 'true']) !!}
                    <input type="file" name="banner" >  
                      <button type="submit" class="btn btn-primary">enviar</button>
                    {!! Form::close() !!}
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
          </div>
        </div>
        <!-- Modal para foto -->
        <div class="modal fade" id="cambiarPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar foto de perfil</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    
                    {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'files' => 'true']) !!}
                    <input type="file" name="photo" >  
                      <button type="submit" class="btn btn-primary">enviar</button>
                    {!! Form::close() !!}
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
          </div>
        </div>
        <!-- termina modal de edicion de imagenes -->
        <!-- Modal editar informacion -->
        <div class="col-md-12">
        <div class="modal fade" id="editarInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                 
                  <div class="col-md-9 offset-md-1">

                      <div class="form-group">
                          <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                          <label class="h5" for="name">Nombre: </label>
                          <input class="form-control mb-4" type="text" value="{{ Auth::user()->name }}" name="name">
                          <label for="last_name">Apellido Paterno: </label> <br>
                          <input class="form-control mb-4" type="text" value="{{ Auth::user()->profile->last_name }}" name="last_name">
                          <label for="second_name">Apellido Materno: </label><br>
                          <input class="form-control mb-4" type="text" value="{{ Auth::user()->profile->second_name }}" name="second_name">
                          <label for="description">Descripción:</label>
                          <textarea class="form-control" >{{ Auth::user()->profile->description }}</textarea>
                          <label for="role">Puesto</label>
                          <input class="form-control mb-4" type="text" value="" name="role">
                          <label for="phone">Telefono</label>
                          <input class="form-control mb-4" type="text" value="{{ Auth::user()->profile->phone }}" name="phone">
                          <label for="social_f">Facebook</label>
                          <input class="form-control mb-4" type="text" value="" name="social_f">
                          <label for="social_t">Twitter</label>
                          <input class="form-control mb-4" type="text" value="" name="social_t">
                          <label for="social_i">Instragram</label>
                          <input class="form-control mb-4" type="text" value="" name="social_i">
                        
                      </div>
                    </div>
            <div class="modal-footer">
                    
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-sm btn-primary float-right">enviar</button>
            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
</div> --}}

@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
    
@endsection
