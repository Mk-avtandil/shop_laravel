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

<div class="container my-3">
    <h3 class="mb-3">Добавление категории</h3>
    <form action="{{route('category.save')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Название</label>
            <input name="name" type="text" class="form-control">
        </div>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group my-3">
            <a href="{{ route('category.index') }}" class="btn btn-primary" type="submit">Назад</a>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>
    </form>
</div>
</body>
</html>
