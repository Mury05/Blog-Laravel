<div class="flex items-center">
    <h1 class="text-4xl w-1/2 ml-3 text-green-700 font-bold">BLOG</h1>
    <div class="flex w-full justify-around mt-5 mb-5">
        <a href="/contact-us">
            <button class="p-3 bg-green-100 border border-green-600 font-medium rounded-md hover:bg-green-200">
                Contact
            </button>
        </a>
        <a href="/about">
            <button class="p-3 bg-green-100 border border-green-600 font-medium rounded-md hover:bg-green-200">
                About
            </button>
        </a>
        <a href="/articles">
            <button class="p-3 bg-green-100 border border-green-600 font-medium rounded-md hover:bg-green-200">
                Articles
            </button>
        </a>
        @guest
            <a href="{{ route('login') }}">
                <button class="p-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700">
                    Login
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="p-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700">
                    Register
                </button>
            </a>
        @endguest
        @auth
            <a href="{{ route('profile') }}">
                <button class="p-3 border bg-blue-50 border-blue-600 font-medium rounded-md hover:bg-blue-100">
                    Votre profil
                </button>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-3 border bg-red-500 border-red-600 text-white font-medium rounded-md hover:bg-red-700">
                    Se déconnecter
                </button>
            </form>
        @endauth
    </div>

</div>
