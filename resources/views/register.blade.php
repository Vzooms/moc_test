@extends('templates.default')
@section('main')
    <div class="neumorphism max-w-[90vw] px-5 lg:max-w-2xl mx-auto pb-5 pt-10">
        <h1 class="text-center text-3xl font-bold mb-4">REGISTER</h1>
        <form class="max-w-md lg:max-w-xl mx-auto flex flex-col gap-5" action="/register/auth" method="POST">
            @csrf
            <div class="flex flex-col lg:grid lg:grid-cols-3 gap-2">
                @include('components.myInputs', [
                    'text' => 'Nama',
                    'type' => 'nama',
                    'id' => 'nama',
                    'defValue' => old('nama'),
                ])
                @include('components.myInputs', [
                    'text' => 'Email',
                    'type' => 'email',
                    'id' => 'email',
                    'defValue' => old('email'),
                ])
                @include('components.myInputs', [
                    'text' => 'No Handphone',
                    'type' => 'number',
                    'id' => 'handphone',
                    'defValue' => old('handphone'),
                ])
                @include('components.myInputs', [
                    'text' => 'Provinsi',
                    'type' => 'text',
                    'id' => 'provinsi',
                    'defValue' => old('provinsi'),
                ])
                @include('components.myInputs', [
                    'text' => 'Kabupaten/Kota',
                    'type' => 'text',
                    'id' => 'kabupaten_kota',
                    'defValue' => old('kabupaten_kota'),
                ])
                @include('components.myInputs', [
                    'text' => 'Kecamatan',
                    'type' => 'text',
                    'id' => 'kecamatan',
                    'defValue' => old('kecamatan'),
                ])
                @include('components.myInputs', [
                    'text' => 'Password',
                    'type' => 'password',
                    'id' => 'password',
                    'defValue' => old('password'),
                ])
                @include('components.myInputs', [
                    'text' => 'Confirm Password',
                    'type' => 'password',
                    'id' => 'password_confirmation',
                    'defValue' => old('password_confirmation'),
                ])
            </div>
            <Button class="neumorphism neumorphismH w-min px-12 py-2 self-center xl:self-end text-2xl font-semibold"
                type="submit">SUBMIT</Button>

            <p class="pt-5">Already Have An Account?
                <br class="lg:hidden">
                <a class="hover:text-blue-500 duration-200 font-semibold" href="/login">
                    Click Here to Login
                </a>
            </p>
        </form>
    </div>
@endsection
