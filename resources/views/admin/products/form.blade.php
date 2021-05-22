@extends('layouts.default')
@section('page-header')Usuário @endsection
@section('content')
    <div class="row mB-40">
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                {!! Form::open($form) !!}

                {!! Form::myInput('text','name','Nome Produto',[],$product['name']??null) !!}

                {!! Form::myInput('text','description','Descrição',[],$product['description']??null) !!}

                {!! Form::myTextArea('body','Conteúdo',[],$product['body']??null) !!}

                {!! Form::myInput('text','price','Preço',['id'=>'price'],$product['price']??null) !!}

                {!! Form::mySelect('categories[]','Categorias',$dataCategories,(isset($product))?$product->categories()->get():[],['multiple']) !!}

                {!! Form::myFile('photos[]','Fotos do Produto',['multiple'=>'multiple']) !!}

                <button type="submit" class="btn btn-primary">Salvar</button>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
@push('js')

    <script>
        $('#price').maskMoney({prefix: '', allowNegative: false, thousands: '.', decimal: ','});
    </script>

@endpush
