@extends('templates.default')
@section('main')
    <div class="neumorphism max-w-[90vw] px-5 lg:max-w-2xl mx-auto pb-5 pt-10">
        <label for="otp" class="block text-center text-3xl font-bold mb-4">
            OTP
        </label>
        <form class="max-w-md lg:max-w-xl mx-auto flex flex-col gap-5" action="/otp/validate" method="POST">
            @csrf
            <input type="hidden" value="{{ old('nama') }}" name="nama">
            <input type="hidden" value="{{ old('email') }}" name="email">
            <input type="hidden" value="{{ old('handphone') }}" name="handphone">
            <input type="hidden" value="{{ old('provinsi') }}" name="provinsi">
            <input type="hidden" value="{{ old('kabupaten_kota') }}" name="kabupaten_kota">
            <input type="hidden" value="{{ old('kecamatan') }}" name="kecamatan">
            <input type="hidden" value="{{ old('password') }}" name="password">
            <div class="flex flex-col gap-2">
                <input id="otp" name="otp" type="number" maxlength="6"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="text-4xl text-center tracking-widest col-span-2 neumorphism neumorphismH px-4 py-2 outline-none">
                @if ($errors)
                    <p></p>
                    <p class="text-red-500 col-span-2">{{ $errors->first('errors') }}</p>
                @endif
            </div>
            <Button class="neumorphism neumorphismH w-min px-12 py-2 self-center xl:self-end text-2xl font-semibold"
                type="submit">SUBMIT</Button>
        </form>
    </div>
@endsection
