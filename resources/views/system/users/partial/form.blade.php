{{--  <section class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('nameUser', 'Nombre de usuario') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nameUser']) }}  
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('emailUser', 'Email de usuario') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'emailUser']) }}  
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('passwordUser', 'Nueva contraseña') }}
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'passwordUser']) }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    <select class="form-control" id="userRol" name="rol">
                        @foreach ($roles as $key => $value)
                            @if (isset($user))
                                @if ($user->hasRole($value))
                                    <option value="{{ $value }}" selected>{{ $value }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endif
                            @else
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endif 
                        @endforeach
                    </select>
                    <label for="userRol">Please Select</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 offset-md-3 mt-4">
        <button class="btn btn-sm btn-block btn-success">Actualizar</button>
    </div>
</section>  --}}

<div class="row">
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Datos de usuario</h3>
            </div>
            <div class="block-content">
                <div class="form-group">
                    {{ Form::label('nameUser', 'Nombre de usuario') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nameUser']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('emailUser', 'Email de usuario') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'emailUser']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('passwordUser', 'Nueva contraseña') }}
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'passwordUser']) }}
                </div>
                <div class="form-group">
                    <label for="userRol">Selecciona un rol</label>
                    <select class="form-control" id="userRol" name="rol">
                        @foreach ($roles as $key => $value)
                            @if (isset($user))
                                @if ($user->hasRole($value))
                                    <option value="{{ $value }}" selected>{{ $value }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endif
                            @else
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endif 
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <button class="btn btn-sm btn-block btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>