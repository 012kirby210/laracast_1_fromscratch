<x-layout>
    <x-settings heading="Publish new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />


            <x-form.field>
                <x-form.label name="category" />
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
                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>
                Publish
            </x-form.button>
        </form>
    </x-settings>
</x-layout>
