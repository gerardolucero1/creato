<section class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('nameProject', 'Titulo del proyecto') }}
                    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'nameProject']) }}  
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('slugProject', 'URL amigable') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slugProject', 'readonly' => 'true']) }} 
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('dateProject', 'Fecha del evento') }}
                    {{ Form::date('date', null, ['class' => 'form-control', 'id' => 'dateProject']) }} 
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('client_id', 'Cliente') }}
                    {{ Form::select('client_id', $users, null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('placeProject', 'Lugar del evento') }}
                    {{ Form::text('place', null, ['class' => 'form-control', 'id' => 'placeProject']) }}  
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <div class="form-material">
                    {{ Form::label('image', 'Banner principal') }}
                    {{ Form::file('banner', ['class' => 'form-control', 'id' => 'file-input']) }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <img id="imgSalida" src="" alt="" width="100%">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-block btn-success">Guardar</button>
            </div>
        </div>
    </div>
</section>

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            var name = document.getElementById('nameProject'),
                slug = document.getElementById('slugProject');
        
            name.onkeyup = function() {
            slug.value = string_to_slug(name.value);
            }
        });
        
        function string_to_slug (str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();
        
            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
        
            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes
        
            return str;
        }

        $(window).on('load', function(){
            $(function() {
                $('#file-input').change(function(e) {
                    addImage(e); 
                });

                function addImage(e){
                    var file = e.target.files[0],
                    imageType = /image.*/;
            
                    if (!file.type.match(imageType))
                        return;
                
                    var reader = new FileReader();
                    reader.onload = fileOnload;
                    reader.readAsDataURL(file);
                }
            
                function fileOnload(e) {
                    var result=e.target.result;
                    $('#imgSalida').attr("src",result);
                }
            });
        });
    </script>
@endsection