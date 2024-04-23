<x-guest-layout>
    <h2 class="font-semibold mb-4 text-center text-xl text-gray-800 leading-tight">
        {{ __('Add Course') }}
    </h2>
    <form method="POST" action="{{ route(Auth::user()->roleName . 'courses.store') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
