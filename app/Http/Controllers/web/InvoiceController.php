<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class InvoiceController extends Controller
{
    
    public function index(){
        return view('invoice');
    }
    public function date(){
        return view('datep');
    }
    public function invoicedetails(){
        return view('invoice_details');
    }
}
