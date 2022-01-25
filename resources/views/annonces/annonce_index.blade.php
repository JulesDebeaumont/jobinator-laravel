<x-app-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($annonces as $annonce)
                <div class="col-3 py-3">
                    <article class="card card-hover article-annonce">
                        <a href="{{ route('annonce_show', ['id' => $annonce->id]) }}" class="text-dark card-hover">

                            <header class="card-header text-center">
                                <h1>{{ $annonce->title }}</h1>
                            </header>
                            <div class="card-body">
                                <div>
                                    {{ Str::limit($annonce->description, 200, $end="..") }}
                                </div>
                            </div>
                            <footer class="card-footer text-center">
                                {{ $annonce->created_at->format('d/m/Y') }}
                            </footer>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
