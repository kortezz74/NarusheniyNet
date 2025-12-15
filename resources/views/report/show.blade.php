<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 300px; padding: 8px; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .back { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Создание заявления</h1>

    <form method="POST" action="{{ route('reports.update', $report->id) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="car_number">Номер автомобиля:</label>
            <input type="text" id="car_number" name="number" value="{{ old('car_number') }}" required>
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