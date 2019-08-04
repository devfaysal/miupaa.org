<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use Intervention\Image\Facades\Image;
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

    public function store(MemberRequest $request)
    {
        $attributes = $request->validated();
        $attributes['image'] = $this->uploadImage(
            $request->file('image')
        );

        //Save to DB
        $member = Member::create($attributes);

        //Generate Invoice
        $member->invoices()->create([
            'for'       => 'Registration Fee',
            'amount'    => '1000',
        ]);

        Session::flash('message', 'Information submitted successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/');
    }

    public function show(Member $member)
    {
        return view('admin.members.show', [
            'member'    => $member,
            'batches'   => []
        ]);
    }

    public function edit(Member $member)
    {
        $batches = config('batch');
        return view('admin.members.edit', [
            'member'    => $member,
            'batches'   => $batches
        ]);
    }

    public function update(MemberRequest $request, Member $member)
    {
        $attributes = $request->validated();

        if($request->hasFile('image')){
            $attributes['image'] = $this->uploadImage(
                $request->file('image')
            );
        }

        $member->update($attributes);

        Session::flash('message', 'Information updated successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/members');
    }


    public function uploadImage($image)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image = Image::make($image->getRealPath());

        $image->resize(200, 200, function ($constraint) {
		    $constraint->aspectRatio();
        })->save(storage_path('app/public/').$imageName);
        
        return $imageName;
    }
}
