@extends('articles.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>{{ $article->title }}</h4>
        </div>
        <div class="card-body">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mb-3" style="max-width: 50%;">
            @endif
            <p>{{ $article->content }}</p>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Articles</a>
        </div>
    </div>
</div>
@endsection
