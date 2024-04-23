<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Students') }}
            </h2>
            <a href="{{ route(Auth::user()->roleName . 'students.create') }}"
                class="inline-block
    px-6 py-2  text-black font-medium text-base
    leading-snug rounded-lg shadow-md 
    ease-in-out ">
                {{ __('Add Student') }}
            </a>
        </div>
        @role('admin')
            <div class="flex justify-end">
                <form action="{{ route(Auth::user()->roleName . 'import') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="students" required>
                    <button type="submit"
                        class="inline-block
                px-6 py-2  text-black font-medium text-base
                leading-snug rounded-lg shadow-md 
                ease-in-out ">Import</button>
                </form>
                <a href="{{ route(Auth::user()->roleName . 'export') }}"
                    class="inline-block
    px-6 py-2  text-black font-medium text-base
    leading-snug rounded-lg shadow-md 
    ease-in-out ">
                    {{ __('Export') }}
                </a>
            </div>
        @endrole
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
                    @forelse($students as $key => $student)
                        <tr class="border-t border-b border-gray-100">
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $key + 1 }}
                            </td>

                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $student->name }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $student->email }}
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                @livewire('user.status', ['slug' => $student->slug])
                            </td>
                            <td class="px-6 py-4 font-medium tracking-wider text-sm truncate text-center">
                                {{ $student->created_at->format('d-M-Y') }}
                            </td>
                            <td>
                                <div class="flex justify-between">
                                    <a
                                        href="{{ route(Auth::user()->roleName . 'students.edit', ['student' => $student->slug]) }}">
                                        edit
                                    </a>
                                    <a
                                        href="{{ route(Auth::user()->roleName . 'students.show', ['student' => $student->slug]) }}">
                                        view
                                    </a>
                                    <form
                                        action="{{ route(Auth::user()->roleName . 'students.destroy', ['student' => $student->slug]) }}"
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
