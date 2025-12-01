<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
    
</head>
<body>
    <h1>Создание заявления</h1>

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="car_number">Номер автомобиля:</label>
            <input type="text" id="car_number" name="car_number" value="{{ old('car_number') }}" required>
            @error('car_number')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Описание заявки:</label>
            <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Создать</button>
    </form>

    <div class="back">
        <a href="{{ route('reports.index') }}">← Назад к списку</a>
    </div>
</body>
</html>