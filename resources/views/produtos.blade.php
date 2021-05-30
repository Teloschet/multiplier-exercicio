@extends('templates.template')

@section('content')

<main>
<header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container" style="display:flex;justify-content:center;text-align:center;">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="{{ url('/books') }}" class="nav-link text-white">
                <i class="fas fa-piggy-bank bi d-block mx-auto mb-1" style="width:24px;height:24px;font-size:26px;" width="24" height="24"><use xlink:href="#home"/></i>
                Pedidos
              </a>
            </li>
            <li>
              <a href="{{ url('/categoria') }}" class="nav-link text-white">
                <i class="fas fa-columns bi d-block mx-auto mb-1" style="width:24px;height:24px;font-size:26px;" width="24" height="24"><use xlink:href="#table"/></i>
                Categorias
              </a>
            </li>
            <li>
              <a href="{{ url('/produtos') }}" class="nav-link text-secondary">
                <i class="fas fa-th bi d-block mx-auto mb-1" style="width:24px;height:24px;font-size:26px;" width="24" height="24"><use xlink:href="#grid"/></i>
                Produtos
              </a>
            </li>
            <li>
              <a href="{{ url('/usuario') }}" class="nav-link text-white">
                <i class="fas fa-user-circle bi d-block mx-auto mb-1" style="width:24px;height:24px;font-size:26px;" width="24" height="24"><use xlink:href="#people-circle"/></i>
                Christopher <i class="fas fa-sort-down" style="margin-top:2px;margin-left:5px;position:absolute;"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <div class="b-example-divider"></div>
</main>

        <h1 class="text-left mt-4 col-8 mb-4 m-auto">Cadastrar Produtos</h1>
            @if(isset($erros) && count($erros)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($erros->all() as $erro)
                    {{$erro}}
                @endforeach
            </div>
            @endif

        <div class="col-8 m-auto">
        
    <form action="{{ url('/produtos') }}" name="formCad" id="formCad" method="post">
        @csrf
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead class="thead-dark bg-dark text-white">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <input type="text" name="produto" class="form-control" style="text-align:center;" required placeholder="Nome do Produto">
                        </td>
                        <td>
                            <select name="categoria_id" id="categoria_id" class="form-control">
                                <option value="">Escolha a categoria</option>
                                @foreach($cate as $categ)
                                <option value="{{$categ->id}}">{{$categ->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="price" placeholder="Valor" class="form-control" required style="text-align:center;"></td>
                        <input type="hidden" name="id_user" value="">
                    </tr>
                </tbody>
                <tfoot class="tfoot-dark bg-dark">
                    <tr>
                        <td style="display:flex;margin-left:0px;"><input type="submit" value="Adicionar Produto" class="btn btn-success"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
                </table>
    </form>
        </div>
    </div>

    <div class="col-8 m-auto mt-4">
            @csrf
            <h2><i class="fas fa-th"></i>  Produtos</h2>
            <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark bg-dark text-white">
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Nome do Produto</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prod as $produ)
                <tr>
               
                    <th scope="row">{{$produ->id}}</th>
                    <td>{{$produ->produto}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
@endsection