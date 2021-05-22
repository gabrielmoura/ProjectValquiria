@extends('layouts.default')
@section('page-header') Clientes @endsection
@section('content')
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
                <th>Ação</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->fullName??$client->user()->name}}</td>
                    <td>{{$client->user()->email}}</td>
                    <td>{{$client->tel}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->birth_date}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
