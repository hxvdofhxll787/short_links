<x-app-layout>
    <div class="max-w-3xl p-5 bg-white rounded-md grid gap-5" style="margin: 20px">

        <form action="{{ route('links.store') }}" method="POST">
            @csrf

            <div>
                <label>Введите ссылку для сокращения</label>

                <input
                    type="url"
                    name="original_url"
                    class="w-full border rounded-md p-2 mt-2"
                    placeholder="https://example.com/page"
                    required
                >
            </div>

            <button
                class="mt-4 px-5 py-2 bg-blue-600 text-white rounded"
            >
                Сократить
            </button>

        </form>

        @if(session('short_url'))
            <div class="rounded">
                <strong class="text-green-600">Ваша сокращенная ссылка</strong>

                <span> -> </span>

                <a
                    href="{{ session('short_url') }}"
                    class="text-blue-500 underline"
                    target="_blank"
                >
                    {{ session('short_url') }}
                </a>
            </div>
        @endif

    </div>
</x-app-layout>
