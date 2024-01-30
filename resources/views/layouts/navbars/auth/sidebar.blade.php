


@php
$ant = App\Models\Anotacao::all();
@endphp

<style>
/* Estilos do botão */
.modal-btn {
  cursor: pointer;
}

/* Estilos do modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close-btn {
  cursor: pointer;
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
}

/* Exibir o modal quando o hash da URL corresponder ao ID do modal */
.modal:target {
  display: block;
}
</style>







<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('admin.arquivos') }}">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">Drawer</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laravel Examples</h6>
      </li>

        <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('arquivos') ? 'active' : '') }}" href="{{ url('arquivos') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('admin/dashboard/arquivos') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
        </div>
        <span class="nav-link-text ms-1">Arquivos</span>
    </a>
</li>


      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Nova Anotação <a href="#modal" class="modal-btn"><span class="fas fa-plus"></span></a> </h6>
      </li>

      @foreach($ant as $anotacao)
    <li class="nav-item pb-2">
        <div class="d-flex align-items-center">
            <a class="nav-link {{ (Request::is('anotacao/' . $anotacao->id) ? 'active' : '') }}" href="{{ url('anotacao/' . $anotacao->id) }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('admin/dashboard/arquivos') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
                </div>
                <span class="nav-link-text ms-1">{{ $anotacao->nome_anotacao }}</span> 
            </a>
               <a href="/apagar_anotacao/{{$anotacao->id}}" onclick="return confirm('Tem certeza que deseja excluir esta anotação?');">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </li>
@endforeach


   

      <div id="modal" class="modal">
  <div class="modal-content">
    <a href="#" class="close-btn">&times;</a>
    <form method="POST" action="/cadastrar_anotacao">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="user-name" class="form-control-label">Anotação:</label>
            <input class="form-control" type="text" placeholder="Anotação" name="nome_anotacao">
          </div>
          </div> 
        </div>
        <textarea class="form-control" style="height: 200px;" placeholder="Nome do Arquivo" name="anotacao"></textarea>
        <button class="btn bg-gradient-dark btn-sm float-start me-3" type="submit">Upload</button>
      </div>
    </form>
</aside>














