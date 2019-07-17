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
            'email' => 'required|email',
            'phone' => 'required',
            'organization' => 'nullable|alpha_num',
            'designation' => 'nullable|alpha_num',
        ]);
        //dd($attributes);

        Member::create($attributes);

        Session::flash('message', 'Information submitted successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/');
    }
}
