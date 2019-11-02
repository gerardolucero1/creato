@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-0" style="background-image: url(https://printersetup.org/wp-content/uploads/2018/08/bg-banner-blue.png); no-repeat:">
              <div class="form-group offset-md-0">
                <form>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
                      <i class="si si-camera"></i>
                    </button>
                  </form>
              </div>    
              <!-- perfil imagen-->
                <div class="col-md-4 offset-md-1">
                    <div class="animated fadeIn">
                        <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                            <img class="img-fluid options-item" src="https://images7.alphacoders.com/633/thumb-1920-633262.png" alt="" >
                            <div class="options-overlay bg-black-op-75" >
                                <div class="options-overlay-content">
                                    <h3 class="h4 text-white mb-5">{{ Auth::user()->name }}</h3>
                                    <form>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" for="customFile" role="button"><i class="fa fa-pencil"></i> Edit</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- termina perfil imagen -->  
        </div>
        
<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    
    </div>
</div>

@endsection
