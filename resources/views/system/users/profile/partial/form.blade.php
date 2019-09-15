
<!-- Crear perfil de usuario-->
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            {{ Form::label('last_name', 'Apellidos') }}
                    {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}

            {{ Form::label('phone', 'Telefono') }}
                    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}


            </div>
            
                   
       
        </div>
        <button type="submit" class="btn btn-primary">enviar</button>
</div>
<!-- end Crear perfil usuario -->

