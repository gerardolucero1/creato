@extends('layouts.app')

@section('content')
<!-- formulario de cotización -->
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h2>Cotización</h2>
        <form action="{{route('quotation.store')}}" method="post">
            @csrf
            <div class="form-group">
             <label for="Input1">Nombre</label>
             <input type="text" class="form-control" id="Input1" name="name" placeholder="name">
            </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input class="form-control form-control-lg" id ="fecha" name="date" type="date" placeholder=".form-control-lg">
                </div>
                    <div class="form-group">
                        <label for="lugar">Lugar del evento</label>
                        <input type="text" class="form-control" id="lugar" name="place" placeholder="lugar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                       
  </div>
                   <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
<!-- end formulario de cotización -->

@endsection
