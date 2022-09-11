<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <div class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border-gray-200">
            <h1 class="text-center font-bold text-xl">
                Register
            </h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <x-form.input name="name" />
                <x-form.input name="username" />
                <x-form.input name="email" type="email" autocomplete="username"/>
                <x-form.input name="password" type="password" autocomplete="new-password"/>

                <x-form.button >
                    Register
                </x-form.button>

            </form>
        </div>
    </main>
</x-layout>
