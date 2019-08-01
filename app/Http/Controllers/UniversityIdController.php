<?php

namespace App\Http\Controllers;

use App\UniversityId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UniversityIdController extends Controller
{
    public function index()
    {
        $ids = UniversityId::all();

        return view('admin.universityIds.index', [
            'ids'   => $ids
        ]);
    }

    public function create()
    {
        return view('admin.universityIds.create');
    }

    public function store(Request $request)
    {
        for($i=$request->start; $i<=$request->end; $i++){
            $prefix = $i<1000 ? '00' : '0';
            //0812BPM00282
            $university_id = $request->year.$request->batch.'BPM'.$prefix.$i;

            $id = new UniversityId;
            $id->number = $university_id;
            $id->save();
        }
        
        Session::flash('message', 'University Ids added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/university-ids');
    }

    public function edit(UniversityId $universityId)
    {
        return view('admin.universityIds.edit', [
            'universityId' => $universityId
        ]);
    }

    public function update(Request $request, UniversityId $universityId)
    {
        $request->validate([
            'number'    => 'required|unique:university_ids,number,'.$universityId->id
        ]);
        $universityId->number = $request->number;
        $universityId->save();

        Session::flash('message', 'University Id updated successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/university-ids');
    }
}
