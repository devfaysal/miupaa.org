@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-3">
        <form method="POST" action="/members" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            
            @include('members.form', [
                'member' => new App\Member
            ])

        </form>
    </div>

@endsection