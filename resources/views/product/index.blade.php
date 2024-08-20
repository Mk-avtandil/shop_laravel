<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2 class="mt-3">Продукты</h2>
    <table class="table">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Описание</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['id']?></td>
            <td><?php echo $product['name']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['description']?></td>
            <td>
                <form action="#">
                    <a href="#" class="w-100 btn btn-success" type="submit">Добавить в корзину</a>
                </form>
            </td>
            <td>
                <form action="{{route('product.delete', $product->id)}}" method="POST">
                    @csrf
                    <button href="#" class="w-100 btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="d-grid gap-3 d-md-block">
        <a href="{{ route('categories.index') }}" class="btn btn-primary" type="submit">Категории</a>
        <a href="/basket" class="btn btn-primary" type="submit">Корзина</a>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить новые продукты</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
