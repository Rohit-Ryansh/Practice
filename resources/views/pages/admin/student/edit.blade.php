<x-guest-layout>
    <form method="Post" action="{{ route(Auth::user()->roleName . 'students.update', ['student' => $student->slug]) }}">
        @method('PUT')
        @csrf

        <div>
            <x-input-label for="name" :value="__('Role')" />
            <select name="role" id="">
                <option value="student" @if ($student->roleName == 'student') checked @endif>{{ __('Student') }}</option>
                @role('admin')
                    <option value="staff" @if ($student->roleName == 'staff') checked @endif>{{ __('Staff') }}</option>
                @endrole
            </select>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                value="{{ $student->name }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                value="{{ $student->email }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
