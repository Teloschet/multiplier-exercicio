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
              <a href="{{ url('/categoria') }}" class="nav-link text-white">
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

        <h1 class="text-left mt-4 col-8 mb-4 m-auto">Cadastrar Pedido</h1>
            @if(isset($erros) && count($erros)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($erros->all() as $erro)
                    {{$erro}}
                @endforeach
            </div>
            @endif

        <div class="col-8 m-auto">
        
        <form action="{{ url('/books') }}" name="formCad" id="formCad" method="post">
        @csrf
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead class="thead-dark bg-dark text-white">
                    <tr>
                        <th scope="col">Produtos</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <select id="produtos" name="carrinho" style="text-align:center;" id="carrinho" class="form-control" required>
                        
                            <option value="">Produtos</option>
                            @foreach($prod as $produ)
                            <option  value="{{$produ->id}}">{{$produ->produto}}</option>
                        @endforeach
                        </select>
                        </td>
                        <td><input type="text" name="quantidade" placeholder="Quantidade" class="form-control" required style="text-align:center;"></td>
                        @foreach($users as $user)
                        <input type="hidden" name="id_user" value="{{$user->id}}">
                        @endforeach
                    </tr>
                    <tr>
                    <td style="font-weight:600;top:5px;position:relative;" >VALOR TOTAL</td>
                    <!-- CONDIÇÃO SELECT -->
                    <td><input id="price" type="text" style="text-align:center;" placeholder="Valor Total" name="price" value="" class="form-control"></td>
                    <!-- CONDIÇÃO SELECT -->
                    </tr>
                </tbody>
                <tfoot class="tfoot-dark bg-dark">
                    <tr>
                        <td style="display:flex;margin-left:0px;"><input type="submit" value="Adicionar Pedido" class="btn btn-success"></td>
                        <td></td>
                    </tr>
                </tfoot>
                </table>
                </div>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                @foreach($prod as $produ)
                <script type="text/javascript">
                      $(document).ready(function() {
                        $(document).on('change', '#produtos', function() {
                          var prod_id = $(this).val();
                          // console.log(prod_id);
                          if(prod_id == {{$produ->id}}) {
                            $('#price').attr('value', '{{ $produ->price }}');
                          }
                        });
                      });
                </script>
                @endforeach
@endsection