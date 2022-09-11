<x-layout>
    <section class="px-6 py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel class="">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="title" >
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           required
                           value="{{ old('title') }}"
                    >
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="slug" >
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           id="slug"
                           required
                           value="{{ old('slug') }}"
                           >
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="thumbnail">
                        Thumbnail
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required
                           >
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="excerpt">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                        name="excerpt"
                        id="excerpt"
                        required
                        >{{old('excerpt')}}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="body">
                        Post body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                        name="body"
                        id="body"
                        required
                        >{{old('body')}}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs"
                           for="category">
                        Category
                    </label>
                    <select name="category_id" id="category">
                        @php
                            $categories = \App\Models\Category::all();

                            @endphp
                        @foreach( $categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{$category->id == old('category_id') ? "selected" : ""}}
                            >{{ ucwords($category->name) }}</option>
                            @endforeach

                    <option></option>
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <x-submit-button>
                    Publish
                </x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
