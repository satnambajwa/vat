<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use View;
use App\User;
use App\Invoice;
use App\Contact;

class Users extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $instructors="satnam";
        $instituitions="satnam singh";
        $compactData=array('students', 'instructors', 'instituitions');
        return View::make("users.index", compact($compactData));
    }


    public function invoices(){
        $instructors="satnam";
        $instituitions="satnam singh";
        $compactData=array('students', 'instructors', 'instituitions');
        return View::make("users.invoices", compact($compactData));
    }

    public function invoice(){
        $instructors="satnam";
        $instituitions="satnam singh";
        $compactData=array('students', 'instructors', 'instituitions');
        return View::make("users.invoice", compact($compactData));
    }

    public function store(Request $request)
    {
        Invoice::create($request->all());
        return redirect()->route('invoices');        
    }

    public function editInvoice($id){
        $instructors="satnam";
        $instituitions="satnam singh";
        $compactData=array('students', 'instructors', 'instituitions');
        return View::make("users.invoice", compact($compactData));
    }

    public function client(){
        return Datatables::of(Contact::select('contact_name')->where('status', '=', '1')->get())->make(true);
    }
    
    public function quotes(){
        $instructors="satnam";
        $instituitions="satnam singh";
        $compactData=array('students', 'instructors', 'instituitions');
        return View::make("users.index", compact($compactData));
    }


    public function getData($type){

        switch ($type) {
            case 'draft':
                return Datatables::of(Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get())->make(true);
                break;    
            case 'approval':
                return Datatables::of(Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get())->make(true);
                break;
            case 'awaiting':
                return Datatables::of(Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get())->make(true);
                break;
            case 'paid':
                return Datatables::of(Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get())->make(true);
                break;
            case 'payment':
                return Datatables::of(Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get())->make(true);
                break;        
            default:
                return Datatables::of(Invoice::where(['type','=','Invoice'])->get())->make(true);
        }   
        
    }
}
