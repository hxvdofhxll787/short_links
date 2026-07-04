<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 my-10">

        <form action="{{ route('links.store') }}" method="POST">
            @csrf

            <div>
                <label>Введите ссылку для сокращения</label>

                <input
                    type="url"
                    name="original_url"
                    class="w-full border rounded p-2 mt-2"
                    placeholder="https://example.com"
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
                <strong>Ваша сокращенная ссылка:</strong>

                <a
                    href="{{ session('short_url') }}"
                    class="text-blue-600 underline"
                >
                    {{ session('short_url') }}
                </a>
            </div>
        @endif

    </div>
</x-app-layout>
