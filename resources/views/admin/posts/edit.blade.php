<x-layout>
    <x-settings :heading="'Edit post ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" value="{{ $post->title }}"/>
            <x-form.input name="slug" value="{{ $post->slug }}"/>
            <div class="flex mt-6">
                <div class="flex-auto">
                    <x-form.input name="thumbnail" value="{{ $post->thumbnail }}" type="file"/>
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>


            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category">
                    @php
                        $categories = \App\Models\Category::all();

                    @endphp
                    @foreach( $categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{$category->id == old('category_id', $post->category_id ) ? "selected" : ""}}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach

                    <option></option>
                </select>
                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>
                Update
            </x-form.button>
        </form>
    </x-settings>
</x-layout>
