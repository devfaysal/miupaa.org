<div class="hidden md:flex mb-4 ">
    <div class="w-1/5">
        <img class="h-32 w-32 mx-auto" src="{{asset('/images/logo.png')}}" alt="">
    </div>
    <div class="w-3/5">
        <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
        <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
        <p class="text-center pt-5"><span class="inline-block bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Membership Application Form</span></p>
    </div>
    <div class="w-1/5">
        <img id="profileImage" class="h-32 w-32 mx-auto" src="{{$member->image? asset('/storage/'. $member->image) : asset('/images/person.png')}}" alt="">
    </div>
</div>
<div class="mb-4 md:hidden">
    <img class="w-2/3 mx-auto" src="{{asset('/images/logo.png')}}" alt="">
    <h1 class="text-xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
    <h1 class="text-blue-700 text-center">Manarat International University</h1>
    <p class="text-center pt-5"><span class="inline-block bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Membership Application Form</span></p>
    <img id="profileImage" class="h-40 w-40 mx-auto" src="{{asset('/images/person.png')}}" alt="">
</div>
@if (session('status'))
    <div class="pb-3">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    </div>
@endif
<div class="border-b border-gray-400 mb-3">
    <h1 class="text-2xl text-center py-3">Personal Details</h1>
</div>
<div class="flex flex-wrap -mx-3">
    <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
        <label class="miu-label" for="title">
            {{ __('member.title') }}
        </label>
        <input class="miu-input" value="{{ old('title', $member->title)}}" id="title" name="title" type="text" >
        @if ($errors->has('title'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
        <label class="miu-label" for="first_name">
            {{ __('member.first_name') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('first_name', $member->first_name)}}" id="first_name" name="first_name" type="text" >
        @if ($errors->has('first_name'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
        <label class="miu-label" for="last_name">
            {{ __('member.last_name') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('last_name', $member->last_name)}}" id="last_name" name="last_name" type="text" >
        @if ($errors->has('last_name'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
    <div class="w-full print:hidden md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="image">
            {{ __('member.image') }}
        </label>
        <input class="miu-input-file" id="image" name="image" type="file">
        @if ($errors->has('image'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="print:hidden w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="dob">
            {{ __('member.dob') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('dob', $member->dob)}}" id="dob" name="dob" type="date" >
        @if ($errors->has('dob'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
        @endif
    </div>
    <div class="hidden print:block w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="dob">
            {{ __('member.dob') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" type="text" >
        @if ($errors->has('dob'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
        @endif
    </div>
    <div class="print:hidden w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="blood_group">
            {{ __('member.blood_group') }} <span class="text-red-600">*</span>
        </label>
        <div class="relative">
            <select class="miu-select" name="blood_group" id="blood_group" >
                @php
                    $blood_groups = ['A+', 'A-', 'AB+', 'AB-', 'B+', 'B-', 'O+', 'O-'];
                @endphp
                <option value="">--Select--</option>
                @foreach ($blood_groups as $blood_group)
                    <option value="{{$blood_group}}" {{$blood_group == old('blood_group', $member->blood_group) ? 'selected':''}}>{{$blood_group}}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        @if ($errors->has('blood_group'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('blood_group') }}</strong>
            </span>
        @endif
    </div>
    <div class="hidden print:block w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label">
            {{ __('member.blood_group') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{$member->blood_group ?? ''}}" type="text">
    </div>
    <div class="w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="gender">
            {{ __('member.gender') }} <span class="text-red-600">*</span>
        </label>
        <div class="mt-4">
            <label class="inline-flex items-center">
                <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{$member->gender == 'Male' ? 'checked' : ''}} {{old('gender') == 'Male' ? 'checked' : ''}} name="gender" value="Male" >
                <span class="ml-2">Male</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{$member->gender == 'Female' ? 'checked' : ''}} {{old('gender') == 'Female' ? 'checked' : ''}} name="gender" value="Female" >
                <span class="ml-2">Female</span>
            </label>
        </div>
        @if ($errors->has('gender'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="email">
            {{ __('member.email') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('email', $member->email)}}" id="email" name="email" type="email" >
        @if ($errors->has('email'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="phone">
            {{ __('member.phone') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('phone', $member->phone)}}" id="phone" name="phone" type="text" >
        @if ($errors->has('phone'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="present_address">
            {{ __('member.present_address') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('present_address', $member->present_address)}}" id="present_address" name="present_address" type="text" >
        @if ($errors->has('present_address'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('present_address') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="permanent_address">
            {{ __('member.permanent_address') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('permanent_address', $member->permanent_address)}}" id="permanent_address" name="permanent_address" type="text" >
        @if ($errors->has('permanent_address'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('permanent_address') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="border-b border-gray-400 mb-3 mt-3">
    <h1 class="text-2xl text-center py-3">MIU Details</h1>
</div>
<div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
    <div class="print:hidden w-full md:w-1/4 px-3 mb-6 md:mb-0">
        <label class="miu-label" for="batch">
            {{ __('member.batch') }} <span class="text-red-600">*</span>
        </label>
        <div class="relative">
            <select class="miu-select" name="batch" id="batch" >
                <option value="">--Select--</option>
                @foreach ($batches as $batch)
                    <option value="{{$batch}}" {{$batch == old('batch', $member->batch) ? 'selected':''}}>{{$batch}}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        @if ($errors->has('batch'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('batch') }}</strong>
            </span>
        @endif
    </div>
    <div class="hidden print:block w-full md:w-1/4 px-3 mb-6 md:mb-0">
        <label class="miu-label">
            {{ __('member.batch') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{$member->batch ?? ''}}" type="text">
    </div>
    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
        <label class="miu-label" for="passing_year">
            {{ __('member.passing_year') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('passing_year', $member->passing_year)}}" name="passing_year" id="passing_year" type="text" >
        @if ($errors->has('passing_year'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('passing_year') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-2/4 px-3 mb-6 md:mb-0">
        <label class="miu-label" for="university_id">
            {{ __('member.university_id') }} <span class="text-red-600">*</span>
        </label>
        <input class="miu-input" value="{{ old('university_id', $member->university_id)}}" name="university_id" id="university_id" type="text" >
        @if ($errors->has('university_id'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('university_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="border-b border-gray-400 mb-3 mt-10">
    <h1 class="text-2xl text-center py-3">Career Details</h1>
</div>
<div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="organization">
            {{ __('member.organization') }}
        </label>
        <input class="miu-input" value="{{ old('organization', $member->organization)}}" id="organization" name="organization" type="text">
        @if ($errors->has('organization'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('organization') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="designation">
            {{ __('member.designation') }}
        </label>
        <input class="miu-input" value="{{ old('designation', $member->designation)}}" id="designation" name="designation" type="text">
        @if ($errors->has('designation'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('designation') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="department">
            {{ __('member.department') }}
        </label>
        <input class="miu-input" value="{{ old('department', $member->department)}}" id="department" name="department" type="text">
        @if ($errors->has('department'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('department') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="office_email">
            {{ __('member.office_email') }}
        </label>
        <input class="miu-input" value="{{ old('office_email', $member->office_email)}}" id="office_email" name="office_email" type="email" >
        @if ($errors->has('office_email'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('office_email') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="office_phone">
            {{ __('member.office_phone') }}
        </label>
        <input class="miu-input" value="{{ old('office_phone', $member->office_phone)}}" id="office_phone" name="office_phone" type="text" >
        @if ($errors->has('office_phone'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('office_phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="w-1/2 px-3 mb-6 md:mb-0 mt-3">
        <label class="miu-label" for="office_address">
            {{ __('member.office_address') }}
        </label>
        <input class="miu-input" value="{{ old('office_address', $member->office_address)}}" id="office_address" name="office_address" type="text" >
        @if ($errors->has('office_address'))
            <span class="text-red-500 text-xs">
                <strong>{{ $errors->first('office_address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="print:hidden flex items-center justify-between pt-3">
    <button class="miu-button" type="submit">
        Submit
    </button>
</div>

@section('javascript')
    <script>
        input = document.querySelector('#image');
        
        input.addEventListener('change', function(){
            preview = document.querySelector('#profileImage');
            file    = input.files[0];
            reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        });
    </script>
@endsection