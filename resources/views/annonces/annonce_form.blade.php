@csrf

<div class="mb-5">
    <label for="title">Title</label>
    <input id="title" class="block mt-1 w-full @error('title') is-invalid @enderror" type="text" name="title" required
        autofocus value="{{ old('title', $annonce->title ?? '') }}" />

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-5">
    <label for="description">Description</label>
    <textarea id="description" class="block mt-1 w-full @error('description') is-invalid @enderror" type="text"
        name="description" rows="8" required>{{ old('description', $annonce->description ?? '') }}</textarea>

    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="container">
    <div class="row">
        <div class="mb-5 col">
            <label for="location">Location</label>
            <input id="location" class="block mt-1 w-full @error('location') is-invalid @enderror" type="text"
                name="location" value="{{ old('location', $annonce->location ?? '') }}" />

            @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 col">
            <label for="departement">Departement</label>
            <input id="departement" class="block mt-1  w-full @error('departement') is-invalid @enderror" type="text"
                name="departement" value="{{ old('departement', $annonce->departement ?? '') }}" />

            @error('departement')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 col">
            <label for="country">Country</label>
            <input id="country" class="block mt-1  w-full @error('country') is-invalid @enderror" type="text"
                name="country" required value="{{ old('country', $annonce->country ?? '') }}" />

            @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 col">
            <label for="remote">Remote</label>
            <input id="remote" class="block mt-1 @error('remote') is-invalid @enderror" type="checkbox" name="remote"
                value="{{ old('remote', $annonce->country ?? '') }}" />

            @error('remote')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="mb-5 col">
            <label for="company">Company</label>
            <input id="company" class="block mt-1 w-full @error('company') is-invalid @enderror" type="text"
                name="company" required value="{{ old('company', $annonce->company ?? '') }}" />

            @error('company')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 col">
            <label for="pay">Pay</label>
            <input id="pay" class="block mt-1 w-full @error('pay') is-invalid @enderror" type="text" name="pay"
                value="{{ old('pay', $annonce->pay ?? '') }}" />

            @error('pay')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 col">
            <label for="experience">Required experience</label>
            <input id="experience" class="block mt-1 w-full @error('experience') is-invalid @enderror" type="number"
                min="0" step="1" name="experience" value="{{ old('experience', $annonce->experience ?? '') }}" />

            @error('experience')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-5 d-flex">
    <button type="submit" class="btn btn-primary mx-2">Submit</button>
    <a class="btn btn-primary" href="{{ route('annonce_index') }}">Back</a>
</div>
