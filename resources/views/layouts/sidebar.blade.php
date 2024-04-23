<nav x-data="{ open: false }" class="{{ Auth::user()->color }} h-full flex flex-col w-64 relative z-20"
    @click.outside="open = false">
    <!-- Primary Navigation Menu -->
    <div class="inline-flex flex-col justify-between">

        <div class="px-4 flex-1 overflow-auto">
            <div class="flex flex-col">
                <!-- Sidebar Dashboard -->
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'dashboard') }}">

                    {{ __('Dashboard') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'courses.index') }}">

                    {{ __('Course') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'subjects.index') }}">

                    {{ __('Subjects') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'staffs.index') }}">

                    {{ __('Staffs') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'students.index') }}">

                    {{ __('Students') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'dashboard', ['reminder' => true]) }}">

                    {{ __('Reminder') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'dashboard') }}">

                    {{ __('Attendence') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'dashboard') }}">

                    {{ __('Assign Role') }}
                </a>
                <a class="p-4" href="{{ route(Auth::user()->roleName . 'dashboard') }}">

                    {{ __('Roles & Permissions') }}
                </a>
            </div>
        </div>

        <!-------------------------- Logout Form----------------->
        <form method="POST" class="mt-auto px-4 border-t py-2" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" class="hover:bg-orange-500 hover:text-white rounded-lg"
                onclick="event.preventDefault();this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</nav>
