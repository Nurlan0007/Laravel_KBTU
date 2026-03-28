<?php
@foreach ($articles as $article)
    <div class="p-6 border-b">
        <h2 class="text-xl font-bold">{{ $article->title }}</h2>
        <p>{{ Str::limit($article->content, 100) }}</p>

        <div class="flex gap-2 mt-4">
            @can('update', $article)
                <a href="{{ route('articles.edit', $article) }}" class="text-blue-500">Edit</a>
            @endcan

            @can('delete', $article)
                <form method="POST" action="{{ route('articles.destroy', $article) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            @endcan
        </div>
    </div>
@endforeach
