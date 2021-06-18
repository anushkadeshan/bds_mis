<x-guest-layout>
    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            <div class="w-full px-24 z-10">

                <h1 class="text-5xl font-bold text-left tracking-wide">Keep it special</h1>
                <p class="text-3xl my-4">{{ \Illuminate\Foundation\Inspiring::quote() }}</p>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0" style="background-color: #161616;">
            <div class="w-full lg:w-2/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Forgot Your Password?</h3>
                    <p class="mb-4 text-sm text-gray-700">
                        We get it, stuff happens. Just enter your email address below and we'll send you a
                        link to reset your password!
                    </p>
                </div>
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-jet-validation-errors class="mb-4" />
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input :value="old('email')" required autofocus
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email"
                            type="email"
                            name="email"
                            placeholder="Enter Email Address..."
                        />
                    </div>
                    <div class="mb-6 text-center">
                        <button type="submit"
                            class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
                            type="button"
                        >
                            Reset Password
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a
                            class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{route('register')}}"
                        >
                            Create an Account!
                        </a>
                    </div>
                    <div class="text-center">
                        <a
                            class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{route('login')}}"
                        >
                            Already have an account? Login!
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </section>
</x-guest-layout>
