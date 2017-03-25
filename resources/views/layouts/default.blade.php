<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel CRUD</title>
    <link href="{{ URL::asset('libs/bootstrap.css') }}" rel="stylesheet">
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap.min.css') }}">
	  <script src="{{ URL::asset('libs/jquery.min.js') }}"></script>
	  <script src="{{ URL::asset('libs/bootstrap.min.js') }}"></script>


<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Controle de Estoque</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{ route('main.index') }}">Início</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Produtos
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('product.index') }}">Exibir Produtos</a></li>
          <li><a href="{{ route('product.create') }}">Cadastrar Produto</a></li>
          <li><a href="{{ route('category.index') }}">Exibir Categorias de Produtos</a></li>
          <li><a href="{{ route('category.create') }}">Cadastrar Nova Categoria de Produtos</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fornecedores
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('provider.index') }}">Exibir Fornecedores</a></li>
          <li><a href="{{ route('provider.create') }}">Cadastrar Novo Fornecedor</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Compras (Lote)
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('batch.index') }}">Exibir Lotes</a></li>
          <li><a href="{{ route('batch.create') }}">Cadastrar Novo Lote</a></li>
          <li><a href="{{ route('productbatch.index') }}">Exibir Produtos por Lotes</a></li>
          <li><a href="{{ route('productbatch.create') }}">Cadastrar Nova Compra de Produto</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios e Exportação de Dados
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('batch.index') }}">Importar XML de Produtos</a></li>
          <li><a href="{{ route('batch.create') }}">Gerar Relatório de Produtos</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

 
<div class="container">
    @yield('content')
</div>
 
</body>
</html>