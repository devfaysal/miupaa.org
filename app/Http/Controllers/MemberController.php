<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', [
            'members'   => $members
        ]);
    }

    public function create()
    {
        $batches = config('batch');
        return view('members.create',[
            'batches'   => $batches
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $attributes = $request->validate([
            'name'  => 'required',
            'batch' => 'required',
            'passing_year' => 'required',
            'university_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'organization' => 'nullable|string',
            'designation' => 'nullable|string',
            'dob_day' => 'required',
            'dob_month' => 'required',
            'dob_year' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
        ]);
        $attributes['dob'] = $attributes['dob_year'] . '-' . $attributes['dob_month'] . '-' . $attributes['dob_day'];
        unset($attributes['dob_day']);
        unset($attributes['dob_month']);
        unset($attributes['dob_year']);
        //dd($attributes);

        Member::create($attributes);

        Session::flash('message', 'Information submitted successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/');
    }
}
