@extends('templates.template')

@section('content')
<main>
<header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container" style="display:flex;justify-content:center;text-align:center;">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="{{ url('/books') }}" class="nav-link text-secondary">
                <i class="fas fa-piggy-bank bi d-block mx-auto mb-1" style="width:24px;height:24px;font-size:26px;" width="24" height="24"><use xlink:href="#home"/></i>
                Pedidos
              </a>
            </li>
            <li>
              <a href="{{ url('categoria') }}" class="nav-link text-white">
                <i class="fas fa-columns bi d-block mx-auto mb-1" style="width:24px;height:24px;font-size:26px;" width="24" height="24"><use xlink:href="#table"/></i>
                Categorias
              </a>
            </li>
            <li>
              <a href="{{ url('/produtos') }}" class="nav-link text-white">
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
<h1 class="text-left mt-4 col-8 mb-4 m-auto">Visualizando pedido: {{$book->id}}</h1>
<div class="col-8 m-auto">
        @php 
            $user=$book->find($book->id)->relUsers;
        @endphp

        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead class="thead-dark bg-dark text-white">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor Unitário</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Data da Compra</th>
                        <th scope="col">Comprador</th>
                        <th scope="col">E-mail do Comprador</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {{$prod->produto}}
                        </td>

                        <td>
                        {{$book->quantidade}}
                        </td>

                        <td>
                        R$ {{$book->price}}
                        </td>

                        <td>
                        R$ {{$book->price * $book->quantidade}}
                        </td>

                        <td>
                        {{$book->created_at}}
                        </td>

                        <td>
                        {{$user->name}}
                        </td>

                        <td>
                        {{$user->email}}
                        </td>
                    </tr>
                </tbody>
                </table>
        </div>
        </div>

@endsection