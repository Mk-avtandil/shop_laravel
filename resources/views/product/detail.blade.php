<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand text-light" href="#">SHOP</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav p-2">
                <li class="nav-item mx-2">
                    <a href="/" class="btn bg-light" type="submit">Главная</a>
                </li>
                <li class="nav-item mx-2">
                    <a href="{{ route('cart.index') }}" class="btn bg-light" type="submit">Корзина</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-3">Продукт</h2>
    <table class="table w-75 table-striped">
        <tr>
            <td><strong>Название: </strong>{{ $product->name }}</td>
        </tr>
        <tr>
            <td><strong>Цена: </strong>{{ $product->price }}</td>
        </tr>
        <tr>
            <td><strong>Описание: </strong>{{ $product->description }}</td>
        </tr>
        <tr>
            <td><strong>Категория: </strong>{{ $product->category->name }}</td>
        </tr>
        <tr>
            <td><strong>Дата создания: </strong>{{ $product->created_at }}</td>
        </tr>
        <tr>
            <td><strong>Дата обновления: </strong>{{ $product->updated_at }}</td>
        </tr>
    </table>
    <div class="row w-75">
        <div class="col-4">
            <a href="{{ route('product.index') }}" class="btn btn-primary w-100" type="submit">Назад</a>
        </div>
        <div class="col-4">
            <form action="{{route('product.edit', $product->id)}}" method="GET">
                @csrf
                <button class="w-100 btn btn-warning" type="submit">Изменить</button>
            </form>
        </div>
        <div class="col-4">
            <form action="{{route('cart.add', ['product' => $product->id])}}" method="POST">
                @csrf
                <button class="w-100 btn btn-success" type="submit">Добавить в корзину</button>
            </form>
        </div>
    </div>



</div>
</body>
</html>
