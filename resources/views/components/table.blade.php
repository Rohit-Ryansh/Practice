<div class="py-2 mt-4 flex-1">
    <div class="bg-white rounded-lg h-full overflow-hidden">
        <div class="relative overflow-x-auto sm:rounded-lg h-full">
            <table class="w-full text-sm">
                <thead>
                    <tr>
                        {{ $head }}
                    </tr>
                </thead>
                <tbody>
                    {{ $body }}
                </tbody>
            </table>
            {{ $slot }}
        </div>
    </div>
</div>
