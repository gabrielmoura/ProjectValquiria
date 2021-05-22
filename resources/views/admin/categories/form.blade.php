@extends('layouts.default')
@section('page-header')Criar Categoria @endsection
@section('content')
    <div class="row mB-40">
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                {!! Form::open($form) !!}

                {!! Form::myInput('text','name','Nome',[],$category['name']??null) !!}

                {!! Form::myInput('text','description','Descrição',[],$category['description']??null) !!}


                <button type="submit" class="btn btn-primary">Salvar</button>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
