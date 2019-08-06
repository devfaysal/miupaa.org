@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex mb-4">
                <div class="w-1/5">
                    <img class="h-32 w-32 mx-auto" src="{{asset('/images/dummy-logo.png')}}" alt="">
                </div>
                <div class="w-3/5">
                    <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
                    <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
                    <p class="text-center pt-5"><span class="inline-block bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Membership Application Form</span></p>
                </div>
                <div class="w-1/5">
                    <img id="profileImage" class="h-32 w-32 mx-auto" src="{{$member->image? asset('/storage/'. $member->image) : asset('/images/placeholder-person.png')}}" alt="">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="name">
                        Full Name <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->name ?? ''}}" id="name" name="name" type="text">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="batch">
                        Batch <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->batch ?? ''}}" id="batch" name="batch" type="text">
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="passing_year">
                        Passing Year <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->passing_year ?? ''}}" name="passing_year" id="passing_year" type="text">
                </div>
                <div class="w-full md:w-2/4 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="university_id">
                        University ID <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->university_id ?? ''}}" name="university_id" id="university_id" type="text">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="email">
                        Email Address <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->email ?? ''}}" id="email" name="email" type="email">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="phone">
                        Phone <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->phone ?? ''}}" id="phone" name="phone" type="text">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-0 md:mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="organization">
                        Organization
                    </label>
                    <input class="miu-input" value="{{$member->organization ?? ''}}" id="organization" name="organization" type="text">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="designation">
                        Designation
                    </label>
                    <input class="miu-input" value="{{$member->designation ?? old('designation')}}" id="designation" name="designation" type="text">
                    @if ($errors->has('designation'))
                        <span class="text-red-500 text-sm">
                            <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="mb-4">
                <label class="miu-label" for="address">
                    Address <span class="text-red-600">*</span>
                </label>
                <input class="miu-input" value="{{$member->address ?? ''}}" id="address" name="address" type="text">
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                {{-- <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="dob">
                        Date of Birth <span class="text-red-600">*</span>
                    </label>
                    <div class="flex">
                        <div class="mr-2">
                            <input class="miu-input" value="{{$member->dob_day ?? '' }}" name="dob_day" id="dob" type="text" placeholder="DD" required>
                        </div>
                        <div class="mr-2">
                            <input class="miu-input" value="{{$member->dob_month ?? '' }}" name="dob_month" id="dob" type="text" placeholder="MM" required>
                        </div>
                        <div>
                            <input class="miu-input" value="{{$member->dob_year ?? '' }}" name="dob_year" id="dob" type="text" placeholder="YYYY" required>
                        </div>
                    </div>
                </div> --}}
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="blood_group">
                        Blood Group <span class="text-red-600">*</span>
                    </label>
                    <input class="miu-input" value="{{$member->blood_group ?? ''}}" name="blood_group" id="blood_group" type="text">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="miu-label" for="gender">
                        Gender <span class="text-red-600">*</span>
                    </label>
                    <div class="mt-5">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-checkbox h-5 w-5 border-gray-400" {{$member->gender == 'Male' ? 'checked' : ''}} {{old('gender') == 'Male' ? 'checked' : ''}} name="gender" value="Male" required>
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-checkbox h-5 w-5 border-gray-400" {{$member->gender == 'Female' ? 'checked' : ''}} {{old('gender') == 'Female' ? 'checked' : ''}} name="gender" value="Female" required>
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <p class="text-center pt-5"><span class="inline-block bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Invoices</span></p>
                <table class="w-full mt-3">
                    <thead>
                        <tr class="text-left">
                            <th class="py-3" width="5%">#</th>
                            <th class="py-3" width="20%">Date</th>
                            <th class="py-3" width="45%">For</th>
                            <th class="py-3" width="15%">Amount</th>
                            <th class="py-3" width="15%">Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member->invoices as $invoice)
                            <tr>
                                <td class="py-3 font-bold">{{$invoice->id}}</td>
                                <td class="py-3">{{$invoice->created_at->format('d-m-Y')}}</td>
                                <td class="py-3">{{$invoice->for}}</td>
                                <td class="py-3">{{$invoice->amount}}</td>
                                <td class="py-3">
                                    <span class="{{$invoice->status == 1 ? 'bg-green-300 text-green-900' : 'bg-red-300 text-red-900'}} px-2 py-1 rounded-full font-semibold text-xs">{{$invoice->status == 1 ? 'Paid' : 'Unpaid'}}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection