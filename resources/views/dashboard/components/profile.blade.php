<div class="dropdown relative md:static">

    <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
        <div class="ml-2 capitalize flex ">
            <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{ auth()->user()->nama }}</h1>
            <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
        </div>
    </button>

    <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

    <div
        class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

        <form action="{{ route('logout') }}" method="POST">
            @csrf @method('post')
            <button type="submit"
                class="px-4 py-2 block capitalize w-full text-left font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                href="">
                <i class="fad fa-user-times text-xs mr-1"></i>
                log out
            </button>
        </form>

    </div>
</div>
