<x-app-layout>
    <div class="d-flex p-5 flex-column">
        <article class="card justify-content-center align-center">

            <header class="card-header text-center">
                <h1>{{ $annonce->title }}</h1>
                <h2>{{ $annonce->company }}</h2>
            </header>
            <div class="card-body border-bottom p-5">
                <div>
                    {{ $annonce->description }}
                </div>
            </div>

            <div class="card-body my-2 mx-4">
                @if ($annonce->location)
                    <div class="my-1">
                        Location: {{ $annonce->location }}
                    </div>
                @endif

                @if ($annonce->departement)
                    <div class="my-1">
                        Departement: {{ $annonce->departement }}
                    </div>
                @endif

                @if ($annonce->country)
                    <div class="my-1">
                        Country: {{ $annonce->country }}
                    </div>
                @endif

                @if ($annonce->pay)
                    <div class="my-1">
                        Pay: ${{ $annonce->pay }} per year
                    </div>
                @endif

                @if ($annonce->experience)
                    <div class="my-1">
                        Experience needed: {{ $annonce->experience }} year(s)
                    </div>
                @endif

                @if ($annonce->remote)
                    <div class="my-1">
                        {{ $annonce->remote ? 'Remote work' : 'No remote' }}
                    </div>
                @endif
            </div>

            <footer class="card-footer">
                Last update on {{ $annonce->updated_at->format('m/d/Y H:i:s') }}
            </footer>
        </article>

        <div class="container">
            <div class="row">
                <div class="text-center my-5 col-5">
                    <a class="btn btn-primary" href="{{ route('annonce_index') }}">Back</a>
                </div>

                <div class="text-center my-5 col-5">
                    <a class="btn btn-primary" href="{{ route('annonce_edit', ['id' => $annonce->id]) }}">Edit</a>
                    @include('annonces.annonce_delete')
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
