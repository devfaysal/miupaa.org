@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form method="POST" action="/admin/members/{{$member->id}}" enctype="multipart/form-data" class="bg-orange-200 shadow-md print:shadow-none rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PATCH')
            
            @include('members.form')

        </form>
    </div>

@endsection