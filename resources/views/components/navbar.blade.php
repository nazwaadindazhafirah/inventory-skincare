<div class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold">
        Dashboard
    </h1>

    <div class="flex items-center gap-4">
        <span class="text-gray-600">
            {{ Auth::user()->name ?? 'Admin' }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-red-500 hover:underline">
                Logout
            </button>
        </form>
    </div>
</div>
