@extends('layouts.user_type.auth')

@section('content')
@php 

$u = $anotacao
@endphp

<style>
textarea.form-control.no-border {
    border: none;
}

textarea.form-control.no-border:focus {
    outline: none;
}
</style>

@foreach($u as $ant)
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <center><h6>{{$ant->nome_anotacao}}</h6></center>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <form method="POST" action="cadastrar_arquivo" enctype="multipart/form-data">
                                                @csrf
                                                <textarea class="form-control no-border" style="height: 900px;" name="anotacao">{{$ant->anotacao}}</textarea>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endforeach
@endsection
