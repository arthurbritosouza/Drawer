@extends('layouts.user_type.auth')
@include('includes.include')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
     <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Cadastrar Arquivo</h6>
                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/apagar_arquivo"><i class="far fa-trash-alt me-2"></i>Delete</a>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
                <tr>
                    <td>
                    <form method="POST" action="cadastrar_arquivo" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">Nome:</label>
                                    <input class="form-control" type="text" placeholder="Nome do Arquivo" name="nome_arquivo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="arquivo" name="arquivo" id="upload">
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">Upload</button>
                            </div>
                        </div>
                        </form>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

  </main>
  
  @endsection
