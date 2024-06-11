@extends('layouts.admin')
@section('page.title', 'Редактирование акции')
@section('content')
    <h2 class="float-left">Редактирование акцииr</h2>
    <form action="{{ route('offers.update', $offer->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title" class="input-field">Заголовок</label>
        <input type="text" name="title" class="input-field" value="{{ $offer->title }}" required>
        <label for="description" class="input-field">Описание</label>
        <textarea name="description" id="content" class="input-field">{{ $offer->description }}</textarea>
        <label for="start_date" class="input-field">Дата начала</label>
        <input type="date" name="start_date" class="input-field" value="{{ \Carbon\Carbon::parse($offer->start_date)->format('Y-m-d') }}" required>
        <label for="end_date" class="input-field">Дата окончания</label>
        <input type="date" name="end_date" class="input-field" value="{{ \Carbon\Carbon::parse($offer->end)->format('Y-m-d') }}" required>
        
        
        <h3>Выберите товары и размер скидки:</h3>
        <input type="text" class="search-items input-field" placeholder="Поиск по наименованию...">
        <table class="items-table">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Размер скидки (%)</th>
                    <th>Выбор</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <input type="number" name="discount_amount[{{ $item->id }}]" class="input-field" value="{{ $offer->items->find($item->id)->pivot->discount_amount ?? 0 }}">
                        </td>
                        <td>
                            <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" {{ $offer->items->contains($item->id) ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="submit" class="btn">Обновить</button>
    </form>
    @include('includes.tinyMCE-script')
    <script>
        document.querySelector('.search-items').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('.items-table tbody tr');
            rows.forEach(row => {
                const item = row.getElementsByTagName('td')[0].innerText.toLowerCase();
                if (item.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection