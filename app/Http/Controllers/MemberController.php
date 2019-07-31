<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
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
            // 'dob_day' => 'required',
            // 'dob_month' => 'required',
            // 'dob_year' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'image' => 'nullable|image'
        ]);
        // $attributes['dob'] = $attributes['dob_year'] . '-' . $attributes['dob_month'] . '-' . $attributes['dob_day'];
        // unset($attributes['dob_day']);
        // unset($attributes['dob_month']);
        // unset($attributes['dob_year']);
        //dd($attributes);

        $attributes['image'] = $this->uploadImage(
            $request->file('image')
        );

        //Save to DB
        Member::create($attributes);

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

    public function update(Request $request, Member $member)
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
            // 'dob_day' => 'required',
            // 'dob_month' => 'required',
            // 'dob_year' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'image' => 'nullable|image'
        ]);
        //dd($attributes);
        // $attributes['dob'] = $attributes['dob_year'] . '-' . $attributes['dob_month'] . '-' . $attributes['dob_day'];
        // unset($attributes['dob_day']);
        // unset($attributes['dob_month']);
        // unset($attributes['dob_year']);

        if($request->image != null){
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
