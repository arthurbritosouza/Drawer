@extends('layouts.user_type.auth')
@include('includes.include')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <a href="{{ route('cadastrar.arquivo.form') }}" class="btn btn-outline-primary btn-sm" title="Cadastrar Arquivo">
            <i class="fas fa-plus"></i>
        </a>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Arquivos</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Anotação</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data/Hora</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Arquivo</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($r as $arq)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$arq->nome_arquivo}} </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{$arq->created_at}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a class="btn bg-gradient-dark mb-0" href="{{ route('visualizar.arquivo', $arq->id) }}"><i class="fas fa-eye"></i>&nbsp;&nbsp;Visualizar Arquivo</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/apagar_arquivo/{{$arq->id}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="/editar_arquivo_form/{{$arq->id}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
