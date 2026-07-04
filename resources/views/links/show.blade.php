<x-app-layout>

    <div class="max-w-5xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">
            Информация о ссылке
        </h1>

        <div class="mb-6">
            <p><strong>Оригинальный URL:</strong></p>

            <a href="{{ $link->original_url }}"
               class="text-blue-600"
               target="_blank">
                {{ $link->original_url }}
            </a>
        </div>

        <div class="mb-6">
            <strong>Короткий URL:</strong>

            {{ url($link->short_code) }}
        </div>

        <div class="mb-6">
            <strong>Общее кол-во кликов:</strong>

            {{ $link->clicks->count() }}
        </div>

        <table class="w-full border">
            <thead>
            <tr>
                <th class="border p-2">IP-адрес</th>
                <th class="border p-2">Дата и время перехода</th>
            </tr>
            </thead>

            <tbody>

            @forelse($link->clicks as $click)

                <tr>
                    <td class="border p-2">
                        {{ $click->ip_address }}
                    </td>

                    <td class="border p-2">
                        {{ $click->created_at->format('d.m.Y H:i:s') }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="2" class="border p-2 text-center">
                        Переходы по ссылке не осуществлялись
                    </td>
                </tr>

            @endforelse

            </tbody>
        </table>
    </div>
</x-app-layout>
