@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="espacador">
        </div>
        <div class="col-md-12 text-right"><button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#novoTaxa">Nova Taxa
            </button></div>
        @foreach ($taxes as $tax)
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-3">{{$tax->name}}</div>
                    <div class="col-md-3">{{$tax->code}}</div>
                    <div class="col-md-3">{{$tax->tax}}@if ($tax->tipe == 1)% @else Fixo @endif</div>
                    <div class="col-md-3 text-right">
                        <a href="#" class="btn btn-primary edit">
                            <i class="material-icons">
                                add_comment
                            </i>
                        </a>
                        <a href="#" class="btn btn-danger edit">
                            <i class="material-icons">
                                delete
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal novo produto -->
<div class="modal fade" id="novoTaxa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('novataxa') }}" method="POST">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title">Nova taxa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nome da taxa</label>
                        <input type="text" name="name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Codigo</label>
                        <input type="text" name="code" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Taxa</label>
                        <input type="text" name="tax" class="form-control" onkeypress="return onlynumber();" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tipo</label>
                        <select class="form-control" name="type" required>
                            <option value="1">Fixa</option>
                            <option value="2">Por cento</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
</script>
@endsection