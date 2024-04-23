<x-guest-layout>
    <h2 class="font-semibold mb-4 text-center text-xl text-gray-800 leading-tight">
        {{ __('Add Staff') }}
    </h2>
    <form method="POST" action="{{ route(Auth::user()->roleName . 'staffs.store') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Role')" />
            <select name="role" id="">
                @role('admin')
                    <option value="staff">{{ __('Staff') }}</option>
                @endrole
            </select>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
