@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <form method="POST" action="/members" enctype="multipart/form-data" class="bg-orange-200 shadow-md print:shadow-none rounded px-10 pt-8 pb-8 mb-4">
            @csrf
            
            @include('members.form', [
                'member' => new App\Member
            ])

        </form>
    </div>

@endsection