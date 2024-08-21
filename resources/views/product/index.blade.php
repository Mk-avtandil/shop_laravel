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
                    <a href="{{ route('product.create') }}" class="btn bg-light">Добавить новые продукты</a>
                </li>
                <li class="nav-item mx-2">
                    <a href="{{ route('order.index') }}" class="btn bg-light" type="submit">Корзина</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-3">Продукты</h2>
    <table class="table">
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Описание</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $product['description']?></td>
                <td>
                    <form action="{{route('order.add', ['product' => $product->id])}}" method="POST">
                        @csrf
                        <button class="w-100 btn btn-success" type="submit">Добавить в корзину</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('product.delete', $product->id)}}" method="POST">
                        @csrf
                        <button class="w-100 btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</div>
</body>
</html>
