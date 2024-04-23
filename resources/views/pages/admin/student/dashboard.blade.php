<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Student Dashboard') }}
            </h2>
            {{-- link disabled for now href="{{ route(Auth::user()->roleNames() . 'devices.create', ['devices' => Request::get('devices')]) }}" --}}
        </div>
        <div class="sm:flex gap-3 mb-2 mt-4">
            <a class="text-black border border-[lightgray] mb-1 mb-xl-1 p-4 w-full rounded"
                style="background-color:lightgray">
                <div>
                    <div class="p-3 text-center">
                        <span class="display-5 font-semibold text-5xl">{{ 55 }}</span>
                        <p class="text-xl mt-2">{{ __('Parents') }}</p>
                    </div>
                </div>
            </a>
            <a class="text-black border border-[lightgray] mb-1 mb-xl-1 p-4 w-full rounded"
                style="background-color:lightgray">
                <div>
                    <div class="p-3 text-center">
                        <span class="display-5 font-semibold text-5xl">{{ $teachers }}</span>
                        <p class="text-xl mt-2">{{ __('Teachers') }}</p>
                    </div>
                </div>
            </a>

            <a class="text-black border border-[lightgray] mb-1 mb-xl-1 p-4 w-full rounded"
                style="background-color:lightgray ">
                <div>
                    <div class="p-3 text-center">
                        <span class="display-5 font-semibold text-5xl">{{ $students }}</span>
                        <p class="text-xl mt-2">{{ __('Students') }}</p>
                    </div>
                </div>
            </a>


        </div>
    </x-slot>
</x-app-layout>
