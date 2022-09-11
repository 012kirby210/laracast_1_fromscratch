@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex flex-row items-center space-x-4">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full"
                >
                <h2>Want to participate</h2>
            </header>
            <x-form.field>
                <textarea placeholder="Thing of something to say !"
                          name="body"
                          class="w-full text-sm focus:outline-none focus:ring"
                          cols="30"
                          rows="5"
                          required></textarea>
                <x-form.error name="body" />
            </x-form.field>
            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-form.button>
                    Post
                </x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="font-bold hover:underline">Register</a> or
        <a href="/login" class="font-bold hover:underline">Log in</a> to leave a comment.
    </p>
@endauth
