<x-dropdown>
    <x-slot name="trigger">
        <button class="flex lg:inline-flex w-full lg:w-32 py-2 pl-3 text-sm font-semibold text-left ">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icons name='down-arrow' class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>
    <x-dropdown-item href="/" :active="request()->routeIs('home')">
        All
    </x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{$category->slug}}"
                         :active='request()->is("/?category={$category->slug}")' >
            {{$category->name}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
