@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="espacador">
        </div>
        <div class="col-md-12 text-right"><button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#novoPorduto">Novo Produto
            </button>
        </div>
        @foreach ($products as $product)
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-1"><img src="{{ url("storage/{$product->image}") }}" style="border-radius: 50px;"
                            width="50px" height="50px" alt="{{ $product->name }}"></div>
                    <div class="col-md-2">{{$product->name}}</div>
                    <div class="col-md-2">{{$product->code}}</div>
                    <div class="col-md-1">R$ {{$product->price}}</div>
                    <div class="col-md-4">@foreach($product->taxes as $tax)
                        <div class="btn btn-primary btn-sm" role="alert">
                            {{$tax->code}}
                        </div>
                        @endforeach
                        <button class="btn btn-success btn-sm" role="alert" data-toggle="modal"
                            data-target="#modalTaxAdd" data-whatever="{{$product->id}}">
                            +
                        </button>
                    </div>
                    <div class="col-md-2">
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
<div class="modal fade" id="novoPorduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('novoprodutos') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <h5 class="modal-title">Novo Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nome do produto</label>
                        <input type="text" name="name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Codigo</label>
                        <input type="text" name="code" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Preço</label>
                        <input type="text" name="price" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        @foreach($taxes as $tax)
                        <label class="btn btn-primary" style="width: 100%;">{{$tax->name}} - {{$tax->code}} <input
                                type="checkbox" name="tax[]" value="{{$tax->id}}" class="badgebox"><span
                                class="badge">&check;</span></label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Imagem</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Criar produto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--modal adcionar impostos-->
<div class="modal fade" id="modalTaxAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        @foreach() @endforeach
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        @foreach($taxes as $tax)
                        <label class="btn btn-primary" style="width: 100%;">{{$tax->name}} - {{$tax->code}}<input
                                type="checkbox" name="tax[]" value="{{$tax->id}}" class="badgebox"><span
                                class="badge">&check;</span></label>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
@endsection