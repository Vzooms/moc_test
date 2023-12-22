@extends('templates.default')
@section('main')
    <div class="neumorphism max-w-[90vw] px-5 lg:max-w-2xl mx-auto pb-5 pt-10">
        <h1 class="text-center text-3xl font-bold mb-4">LOGIN</h1>
        <form class="max-w-md lg:max-w-xl mx-auto flex flex-col gap-5" action="/login/auth" method="POST">
            @csrf
            <div class="flex flex-col lg:grid lg:grid-cols-3 gap-2">
                <label for="email" class="text-lg">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="col-span-2 neumorphism neumorphismH px-4 py-2 outline-none">
                <label for="password" class="text-lg">Password</label>
                <input type="password" id="password" name="password" class="col-span-2 neumorphism neumorphismH px-4 py-2 outline-none">
                @if ($errors->has('email'))
                    <p></p>
                    <p class="text-red-500 col-span-2">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <Button class="neumorphism neumorphismH w-min px-12 py-2 self-center xl:self-end text-2xl font-semibold"
                type="submit">SUBMIT</Button>

            <p class="pt-5">Don&apos;t Have An Account?
                <br class="lg:hidden">
                <a class="hover:text-blue-500 duration-200 font-semibold" href="/register">
                    Click Here to Register
                </a>
            </p>
        </form>
    </div>
@endsection

{{-- nama, email, no. hp, provinsi, kabupaten/kota dan kecamatan --}}
