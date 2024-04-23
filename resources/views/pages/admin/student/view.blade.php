<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Student Details') }}
            </h2>
            @role('admin')
                <a href="{{ route(Auth::user()->roleName . 'pdf-download', ['student' => $student->slug]) }}"
                    class="inline-block
    px-6 py-2  text-black font-medium text-base
    leading-snug rounded-lg shadow-md 
    ease-in-out ">
                    {{ __('Download PDF') }}
                </a>
            @endrole
        </div>
        <div>{{ __('Name : ') }}{{ ucfirst($student->name) }}</div>
        <div>{{ __('Email : ') }}{{ $student->email }}</div>
        <div>{{ __('Registration Expiry Date : ') }}{{ $student->expiry_date }}</div>
    </x-slot>

</x-app-layout>
