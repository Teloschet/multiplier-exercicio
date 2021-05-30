@extends('templates.template')

@section('content')
<main>
<header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container" style="display:flex;justify-content:center;text-align:center;">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
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

        <div class="col-8 m-auto mt-4">
            @csrf
            <h2><i class="fas fa-piggy-bank"></i>  Pedidos</h2>
            <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark bg-dark text-white">
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Carrinho</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($book as $books)
                <tr>
                    <th scope="row">{{$books->id}}</th>
                    <td>{{$books->carrinho}}</td>
                    <td>{{$books->created_at}}</td>
                    <td>{{$books->quantidade}}</td>
                    <td>R$ {{$books->price}}</td>
                    <td>R$ {{$books->price * $books->quantidade}}</td>
                    <td>
                        <a href="{{ url("books/$books->id") }}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="{{ url("books/$books->id") }}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-left mat-3 mb-4">
            <a href="{{ url('books/create') }}">
                <button class="btn btn-success" style="font-weight:600;border-radius:50%;">+</button>
            </a>
        </div>
        </div>

        

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.1/dist/chart.min.js"></script>
        <div class="col-8 m-auto mt-4">
          <canvas id="myChart" width="400" height="50"></canvas>
        </div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pedidos'],
        datasets: [{
            label: '2021',
            data: [{{$books->id}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection