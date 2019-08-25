@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="print:hidden bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex mb-4">
                <div class="w-1/5">
                    <img class="h-32 w-32 mx-auto" src="{{asset('/images/logo.png')}}" alt="">
                </div>
                <div class="w-3/5">
                    <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
                    <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
                    <p class="text-center pt-5"><span class="inline-block bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Invoice</span></p>
                </div>
                {{-- <div class="w-1/5">
                    <img id="profileImage" class="h-32 w-32 mx-auto" src="{{$member->image? asset('/storage/'. $member->image) : asset('/images/placeholder-person.png')}}" alt="">
                </div> --}}
            </div>
            <table class="w-full mt-3">
                <thead>
                    <tr>
                        <th class="py-3 text-left" width="4%">#</th>
                        <th class="py-3 text-left" width="20%">Date</th>
                        <th class="py-3 text-left" width="40%">For</th>
                        <th class="py-3 text-center" width="13%">Amount</th>
                        <th class="py-3 text-center" width="13%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-3 font-bold">{{$invoice->id}}</td>
                        <td class="py-3">{{$invoice->created_at->format('d-m-Y')}}</td>
                        <td class="py-3">{{$invoice->for}}</td>
                        <td class="py-3 text-center">{{$invoice->amount}}</td>
                        <td class="py-3 text-center">
                            <span class="{{$invoice->status == 1 ? 'bg-green-300 text-green-900' : 'bg-red-300 text-red-900'}} px-2 py-1 rounded-full font-semibold text-xs">{{$invoice->status == 1 ? 'Paid' : 'Unpaid'}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if($invoice->status == 0)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <div>
                        <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
                        <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
                    </div>
                    <div class="flex justify-between mt-3">
                        <p><span class="inline-block text-blue-800 font-bold py-2">Date: {{date('d-m-Y')}} <br/> Invoice: {{$invoice->id}}</span></p>
                        <p><span class="inline-block bg-blue-300 text-blue-800 font-bold py-2 px-4 rounded-full">Money Receipt</span></p>
                        <p><span class="inline-block text-blue-800 font-bold py-2">Amount: {{$invoice->amount}} Taka</span></p>
                    </div>
                    <form method="POST" action="">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-0 md:mb-4 mt-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="miu-label" for="name">
                                    Name
                                </label>
                                <input class="miu-input" value="{{$member->name}}" id="name" name="name" type="text" disabled>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="miu-label" for="batch">
                                    Batch
                                </label>
                                <input class="miu-input" value="{{$member->batch}}" id="batch" name="batch" type="text" disabled>
                            </div>
                        </div>
                        <div class="my-4">
                            <label class="miu-label" for="method">
                                Payment Method<span class="text-red-600">*</span>
                            </label>
                            <div class="mt-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{old('method') == 'Male' ? 'checked' : ''}} name="method" value="Cash" required>
                                    <span class="ml-2">Cash</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{old('method') == 'Cheque' ? 'checked' : ''}} name="method" value="Cheque" required>
                                    <span class="ml-2">Cheque</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{old('method') == 'bKash' ? 'checked' : ''}} name="method" value="Cheque" required>
                                    <span class="ml-2">bKash</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{old('method') == 'Rocket' ? 'checked' : ''}} name="method" value="Cheque" required>
                                    <span class="ml-2">Rocket</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-checkbox h-6 w-6 border-gray-400" {{old('method') == 'Other' ? 'checked' : ''}} name="method" value="Cheque" required>
                                    <span class="ml-2">Other</span>
                                </label>
                            </div>
                            @if ($errors->has('method'))
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $errors->first('method') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="miu-label" for="reference">
                                Reference <span class="text-red-600">*</span>
                            </label>
                            <input class="miu-input" value="{{old('reference')}}" id="reference" name="reference" type="text" required>
                            @if ($errors->has('reference'))
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $errors->first('reference') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="print:hidden flex items-center justify-between pt-3">
                            <button class="miu-button" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection