@extends('articles.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Create Article</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ Str::limit($article->content, 50) }}</td>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" width="100" height="100" alt="Article Image">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>
@endsection
