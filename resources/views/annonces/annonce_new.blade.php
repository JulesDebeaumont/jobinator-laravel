<x-app-layout>
    <section class="px-5 py-5">
        <main class="max-w-lg max-auto mt-5 bg-gray-100 border border-grey-200 p-5 rounded">
            <h1 class="text-center font-bold text-xl">Create a new annonce</h1>
            <form method="POST" action="{{ route('annonce_index') }}">
                @include('annonces.annonce_form')
            </form>
        </main>
    </section>
</x-app-layout>
