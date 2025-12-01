<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявлений</title>
   
</head>
<body>
    <h1>Список заявлений</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('reports.create') }}" class="btn btn-primary">Создать заявление</a>

    @if($reports->count() > 0)
        @foreach($reports as $report)
            <div class="application">
                <p><strong>Номер автомобиля:</strong> {{ $report->car_number }}</p>
                <p><strong>Описание:</strong> {{ $report->description }}</p>
                <p><strong>Дата создания:</strong> {{ $report->created_at->format('d.m.Y H:i') }}</p>
                
                <div>
                    <a href="{{ route('reports.show', $report) }}" class="btn btn-warning">Редактировать</a>
                    
                    <form  method="POST"action="{{ route('reports.destroy', $report->id)}}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <p>Заявки не найдены</p>
    @endif
</body>
</html>