@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
     <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Editar Arquivo</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
                <tr>
                    <td>
                      @foreach($ed as $arq)
                    <form method="POST" action="/editar_arquivo/{{$arq->id}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">Arquivo:</label>
                                    <input class="form-control" type="text" placeholder="Nome do Arquivo" name="nome_arquivo" value="{{$arq->nome_arquivo}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <button class="btn bg-gradient-dark btn-sm float-start me-3" type="submit">Editar</button>
                            </div>
                        </div>
                        </form>
                      @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

  </main>
  
  @endsection
