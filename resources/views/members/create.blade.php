@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-3">
        <form method="POST" action="/members" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="flex mb-4">
                <div class="w-1/5 bg-gray-400 h-40">
                    <img src="{{asset('/images/dummy-logo.png')}}" alt="">
                </div>
                <div class="w-3/5">
                    <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
                    <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
                    <p class="text-center pt-5"><span class="inline-block bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Membership Application Form</span></p>
                </div>
                <div class="w-1/5 bg-gray-400 h-40">
                    <img src="{{asset('/images/placeholder-person.png')}}" alt="">
                </div>
            </div>
            <div class="pb-3">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('status') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif
            </div>
            <div class="mb-4">
                <label class="miu-label" for="name">
                    Full Name <span class="text-red-600">*</span>
                </label>
                <input class="miu-input" value="{{old('name')}}" id="name" name="name" type="text" required>
                @if ($errors->has('name'))
                    <span class="text-red-500 text-sm">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="batch">
                        Batch <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="miu-select" name="batch" id="batch" required>
                            <option value="">-- Select Batch --</option>
                            @foreach ($batches as $batch)
                                <option value="{{$batch}}" {{$batch == old('batch') ? 'selected':''}}>{{$batch}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    @if ($errors->has('batch'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('batch') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="passing_year">
                        Passing Year <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" name="passing_year" id="passing_year" type="text" placeholder="2000" required>
                    @if ($errors->has('passing_year'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('passing_year') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="university_id">
                        University ID <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" name="university_id" id="university_id" type="text" placeholder="0812BPM00282" required>
                    @if ($errors->has('university_id'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('university_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="email">
                        Email Address <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{old('email')}}" id="email" name="email" type="email" required>
                    @if ($errors->has('email'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="phone">
                        Phone <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{old('phone')}}" id="phone" name="phone" type="text" required>
                    @if ($errors->has('phone'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="mb-4">
                <label class="miu-label" for="address">
                    Address <span class="text-red-600">*</span>
                </label>
                <input class="miu-input" value="{{old('address')}}" id="address" name="address" type="text" required>
                @if ($errors->has('address'))
                    <span class="text-red-500 text-sm">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="organization">
                        Organization
                    </label>
                    <input class="miu-input" value="{{old('organization')}}" id="organization" name="organization" type="text">
                    @if ($errors->has('organization'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('organization') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="designation">
                        Designation
                    </label>
                    <input class="miu-input" value="{{old('designation')}}" id="designation" name="designation" type="text">
                    @if ($errors->has('designation'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="dob">
                        Date of Birth <span class="text-red-600">*</span>
                    </label>
                    <div class="flex">
                        <div class="mr-2">
                            <input class="miu-input" name="dob_day" id="dob" type="text" placeholder="DD" required>
                        </div>
                        <div class="mr-2">
                            <input class="miu-input" name="dob_month" id="dob" type="text" placeholder="MM" required>
                        </div>
                        <div>
                            <input class="miu-input" name="dob_year" id="dob" type="text" placeholder="YYYY" required>
                        </div>
                    </div>
                    @if ($errors->has('dob_day'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('dob_day') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('dob_month'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('dob_month') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('dob_year'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('dob_year') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="gender">
                        Gender <span class="text-red-600">*</span>
                    </label>
                    <div class="mt-3">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-checkbox h-8 w-8 border-gray-400" name="gender" value="Male" required>
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-checkbox h-8 w-8 border-gray-400" name="gender" value="Female" required>
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                    @if ($errors->has('gender'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="blood_group">
                        Blood Group <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" name="blood_group" id="blood_group" type="text" placeholder="AB+" required>
                    @if ($errors->has('blood_group'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('blood_group') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex items-center justify-between pt-3">
                <button class="miu-button" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>

@endsection