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
                <li class="nav-item mx-2">
                    <a href="{{ route('category.create') }}" class="btn bg-light" type="submit">Добавить категорию</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-3">Категории</h2>
    <table class="table w-75">
        <tr>
            <th scope="col">Название</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{route('category.edit', $category->id)}}" method="GET">
                        @csrf
                        <button class="w-100 btn btn-warning" type="submit">Изменить</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('category.delete', $category->id)}}" method="POST">
                        @csrf
                        <button class="w-100 btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $categories->links('pagination::bootstrap-5') }}
</div>


