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
        <a class="navbar-brand text-light" href="/">SHOP</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav p-2">
                <li class="nav-item mx-2">
                    <a href="/" class="btn bg-light" type="submit">Главная</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-3">Корзина</h2>
    <table class="table">
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Кол-во</th>
            <th></th>
        </tr>
        @foreach($products as $item)
            <tr>
                <td>{{ $item->product->name  }}</td>
                <td>{{ $item->product->price  }}</td>
                <td>{{ $item->product->description  }}</td>
                <td>{{ $item->product->category->name  }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('cart.clear')}}" class="btn btn-primary" type="submit">Очистить корзину</a>
</div>
</body>
</html>
