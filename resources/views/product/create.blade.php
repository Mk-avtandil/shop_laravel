<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand text-light" href="/">SHOP</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav p-2">
            </ul>
        </div>
    </div>
</nav>

<div class="container my-3">
    <h3 class="mb-3">Добавление продукта</h3>
    <form action="{{route('product.save')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Название</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Цена</label>
            <input name="price" type="text" class="form-control">
        </div>
        @error('price')
        <span>{{ $message }}</span>
        @enderror
        <div class="form-group">
            <label>Описание</label>
            <input name="description" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Категория</label>
            <select class="custom-select form-control" name="category_id">
                <option value="">...</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
            <span>{{ $message }}</span>
        @enderror
        <div class="form-group my-3">
            <button class="btn btn-primary" type="submit">Сохранить</button>
            <a href="/" class="btn btn-primary" type="submit">Назад</a>
        </div>

    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
