<x-app-layout>

    <div class="max-w-6xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">
            Мои ссылки
        </h2>

        @if($links->isEmpty())
            <p>У вас еще нет ссылок</p>
        @else

            <table class="w-full border">
                <thead>
                <tr class="border-b">
                    <th>Оригинальный URL</th>
                    <th>Короткий URL</th>
                    <th>Кол-во переходов</th>
                    <th> </th>
                </tr>
                </thead>

                <tbody>

                @foreach($links as $link)
                    <tr class="border-b">
                        <td>
                            <a href="{{ url($link->original_url) }}" class="underline text-blue-500">
                                {{ url($link->original_url) }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ url($link->short_code) }}" class="underline text-blue-500">
                                {{ url($link->short_code) }}
                            </a>
                        </td>
                        <td>
                            {{ $link->clicks_count }}
                        </td>
                        <td>
                            <a>
                                Подробнее
                            </a>

                            <form action="{{ route('links.destroy', $link) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="text-red-600 hover:underline"
                                >
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif

    </div>
</x-app-layout>
