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
            <div class="mt-6">
                            <textarea placeholder="Thing of something to say !"
                                      name="body"
                                      class="w-full text-sm focus:outline-none focus:ring"
                                      cols="30"
                                      rows="5"
                                      required></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="font-bold hover:underline">Register</a> or
        <a href="/login" class="font-bold hover:underline">Log in</a> to leave a comment.
    </p>
@endauth
