<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <form action="{{ route('links.store') }}" method="POST">
            @csrf

            <div>
                <label>Original URL</label>

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
                Shorten
            </button>

        </form>

    </div>
</x-app-layout>
