<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'key'   => 'required',
            'value' => 'required'
        ]);

        Option::create($attributes);
    }

    public function update(Request $request, Option $option)
    {
        $attributes = $request->validate([
            'key'   => 'required|unique:options,value,'.$option->id,
            'value' => 'required'
        ]);

        $option->update($attributes);
    }
}
