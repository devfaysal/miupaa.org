<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('admin.options.index', [
            'options'   => $options
        ]);
    }

    public function create()
    {
        return view('admin.options.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'key'   => 'required|unique:options',
            'value' => 'required'
        ]);

        Option::create($attributes);

        Session::flash('message', 'Option added successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/options');
    }

    public function edit(Option $option)
    {
        return view('admin.options.edit', [
            'option' => $option,
            'values' => json_encode($option->value)
        ]);
    }

    public function update(Request $request, Option $option)
    {
        $attributes = $request->validate([
            'key'   => 'required|unique:options,value,'.$option->id,
            'value' => 'required'
        ]);

        $option->update($attributes);

        Session::flash('message', 'Option updated successfully!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/options');
    }
}
