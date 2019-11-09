
<!-- Crear perfil de usuario-->
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <div class="form-group">
                        {{ Form::label('last_name', 'Apellido Paterno') }}
                        {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                </div>

                <div class="form-group">
                        {{ Form::label('second_name', 'Apellido Materno') }}
                        {{ Form::text('second_name', null, ['class' => 'form-control', 'id' => 'second_name']) }}
                </div>

                <div class="form-group">
                        {{ Form::label('description', 'Descripción') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                </div>

                <div class="form-group">
                        {{ Form::label('phone', 'Telefono') }}
                        {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
                </div>

                <div class="form-group">
                        {{ Form::label('phto', 'Foto') }}
                        {{ Form::file('photo', null, ['class' => 'form-control', 'id' => 'photo']) }}
                </div>

                <div class="form-group">
                        {{ Form::label('banner', 'Banner') }}
                        {{ Form::file('banner', null, ['class' => 'form-control', 'id' => 'banner']) }}
                </div>
            
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">enviar</button>
</div>
<!-- end Crear perfil usuario -->

