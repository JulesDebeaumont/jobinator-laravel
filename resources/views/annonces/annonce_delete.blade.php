<form class="btn" method="post" action="{{ route('annonce_delete', ['id' => $annonce->id]) }}">
    @csrf
    <button class="btn btn-primary" type="submit">Delete</button>
</form>