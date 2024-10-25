<div class="row items-push">
    <div class="col-lg-3">
        <p class="text-muted">
            Información vital de tu cuenta. Su nombre de usuario será visible públicamente.
        </p>
    </div>
    <div class="col-lg-7 offset-lg-1">
        <div class="form-group row">
            <div class="col-12">
                {{ Form::label('nameUser', 'Nombre de usuario') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nameUser']) }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                {{ Form::label('emailUser', 'Email de usuario') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'emailUser']) }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                {{ Form::label('passwordUser', 'Nueva contraseña') }}
                {{ Form::password('password', ['class' => 'form-control', 'id' => 'passwordUser']) }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
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
        </div>
        <div class="form-group row">
            <div class="col-12">
                <button class="btn btn-sm btn-block btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>