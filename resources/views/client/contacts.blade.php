@extends('templates.main')

@section('content')
    <h1>Contacts</h1>

    @include('templates._errors')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sendEmail') }}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>

@endsection
