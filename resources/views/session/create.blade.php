<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <div class="max-w-lg mx-auto mt-10">
            <x-panel class="bg-gray-100">
                <h1 class="text-center font-bold text-xl">
                    Login
                </h1>
                <form method="POST" action="/sessions" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="current-password"/>

                    <x-form.button>
                        Log in
                    </x-form.button>
                </form>
            </x-panel>
        </div>
    </main>
</x-layout>
