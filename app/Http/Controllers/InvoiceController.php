<?php

namespace App\Http\Controllers;

use App\Member;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show(Member $member, Invoice $invoice)
    {
        return view('invoices.show', [
            'member'    => $member,
            'invoice'   => $invoice
        ]);
    }
}
