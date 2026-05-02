@foreach($articles as $article)
    <h2>{{ $article->title }}</h2>

    @can('update', $article)
        <a href="{{ route('articles.edit', $article) }}">Edit</a>
    @endcan

    @can('delete', $article)
        <form method="POST" action="{{ route('articles.destroy', $article) }}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    @endcan
@endforeach

@can('create', App\Models\Article::class)
    <a href="{{ route('articles.create') }}">Create</a>
@endcan