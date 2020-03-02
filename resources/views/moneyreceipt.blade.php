@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-orange-200 shadow-md print:shadow-none rounded pl-10 py-3">
            <div class="flex">
                <div class="w-1/2 px-3 border-r border-gray-700">
                    <div class="pb-3">
                        <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
                        <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
                    </div>
                    <div class="flex items-center justify-around pb-2">
                        <p class="text-center"><span class="inline-block bg-blue-300 text-blue-800 font-bold py-1 px-4 rounded-full">Money Receipt</span></p>
                        <p class="text-center text-gray-700 text-sm font-semibold pt-1">Office Copy</p>
                    </div>
                    <label class="miu-label">Name: </label>
                    <label class="miu-label">Miupaa Number: </label>
                    <label class="miu-label">Amount Received: </label>
                    <label class="miu-label">In Word: </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Male" >
                        <span class="ml-2 text-gray-700 text-sm">Cash</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Female" >
                        <span class="ml-2 text-gray-700 text-sm">bKash</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Female" >
                        <span class="ml-2 text-gray-700 text-sm">Bank</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Female" >
                        <span class="ml-2 text-gray-700 text-sm">Other:</span>
                    </label>
                    <label class="miu-label">Date: </label>
                    <div class="text-right pt-6">
                        <p class="text-gray-700 text-sm font-semibold">-------------------------</p>
                        <p class="text-gray-700 text-sm font-semibold">Received By</p>
                    </div>
                </div>
                <div class="w-1/2 px-3 border-l border-gray-700">
                    <div class="pb-3">
                        <h1 class="text-2xl text-blue-700 font-bold text-center">Pharmacy Alumni Association</h1>
                        <h1 class="text-xl text-blue-700 text-center">Manarat International University</h1>
                    </div>
                    <div class="flex items-center justify-around pb-2">
                        <p class="text-center"><span class="inline-block bg-blue-300 text-blue-800 font-bold py-1 px-4 rounded-full">Money Receipt</span></p>
                        <p class="text-center text-gray-700 text-sm font-semibold pt-1">Member's Copy</p>
                    </div>
                    <label class="miu-label">Name: </label>
                    <label class="miu-label">Miupaa Number: </label>
                    <label class="miu-label">Amount Received: </label>
                    <label class="miu-label">In Word: </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Male" >
                        <span class="ml-2 text-gray-700 text-sm">Cash</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Female" >
                        <span class="ml-2 text-gray-700 text-sm">bKash</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Female" >
                        <span class="ml-2 text-gray-700 text-sm">Bank</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-checkbox h-4 w-4 border-gray-400" name="gender" value="Female" >
                        <span class="ml-2 text-gray-700 text-sm">Other:</span>
                    </label>
                    <label class="miu-label">Date: </label>
                    <div class="text-right pt-6">
                        <p class="text-gray-700 text-sm font-semibold">-------------------------</p>
                        <p class="text-gray-700 text-sm font-semibold">Received By</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection