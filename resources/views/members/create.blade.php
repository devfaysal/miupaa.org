@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form method="POST" action="/members" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 print:px-0 pt-6 pb-8 mb-4">
            @csrf
            
            @include('members.form', [
                'member' => new App\Member
            ])

        </form>
    </div>

@endsection