<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Staffs') }}
            </h2>
            <a href="{{ route(Auth::user()->roleName . 'staffs.create') }}"
                class="inline-block
    px-6 py-2  text-black font-medium text-base
    leading-snug rounded-lg shadow-md 
    ease-in-out ">
                {{ __('Add Staff') }}
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
                        {{ __('Email') }}
                    </th>
                    <th class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                        {{ __('Status') }}
                    </th>
                    <th class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                        {{ __('Created') }}
                    </th>
                </x-slot>
                <x-slot:body>
                    @forelse($staffs as $key => $staff)
                        <tr class="border-t border-b border-gray-100">
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $staff->name }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $staff->email }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                @livewire('user.status', ['slug' => $staff->slug])
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $staff->created_at->format('d-M-Y') }}
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
