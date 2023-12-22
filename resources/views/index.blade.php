@extends('templates.default')
@section('main')
    <div class="text-center neumorphism max-w-2xl mx-auto py-10 text-5xl">
        HALLO {{ Auth::user()->nama }}
    </div>
    <div class="flex justify-center pt-10">
        <form method="POST" action="/logout">
            @csrf
            <Button class="neumorphism neumorphismH w-min px-12 py-2 self-center xl:self-end text-2xl font-semibold"
                type="submit">LOGOUT</Button>
        </form>
    </div>
@endsection
