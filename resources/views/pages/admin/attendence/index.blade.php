<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Attendence') }}
            </h2>
            <a href="{{ route(Auth::user()->roleName . 'attendences.create') }}"
                class="inline-block
    px-6 py-2  text-black font-medium text-base
    leading-snug rounded-lg shadow-md 
    ease-in-out ">
                {{ __('Add Attendence') }}
            </a>
        </div>
        <div>
            <x-table>
                <x-slot:head>
                    <th class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                        {{ __('S.No') }}
                    </th>
                    <th class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                        {{ __('Name') }}
                    </th>
                    <th class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                        {{ __('Created') }}
                    </th>
                    <th class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                        {{ __('Actions') }}
                    </th>
                </x-slot>
                <x-slot:body>
                    @forelse($courses as $key => $course)
                        <tr class="border-t border-b border-gray-100">
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $course->name }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $course->created_at->format('d-M-Y') }}
                            </td>
                            <td>
                                <div class="flex">
                                    <a
                                        href="{{ route(Auth::user()->roleName . 'courses.edit', ['course' => $course->slug]) }}">
                                        edit
                                    </a>
                                    <form
                                        action="{{ route(Auth::user()->roleName . 'courses.destroy', ['course' => $course->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="border-t border-b border-gray-100">
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ __('No Record Found') }}
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
    </x-slot>
</x-app-layout>
