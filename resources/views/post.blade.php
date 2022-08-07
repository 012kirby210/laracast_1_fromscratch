<x-layout>
    <h2>{{ $post->title }}</h2>
    <p>
        by <a href="/users/{{ $post->user->id }}">{{$post->user->name}}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    <article>
        {!! $post->body !!}
    </article>
    <a href="/">Go back</a>
</x-layout>


