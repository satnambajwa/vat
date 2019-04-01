<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use View;
use App\User;
use App\Invoice;
use App\Contact;
use App\Person;
use App\Taxes;
use App\Item;
use App\Groups;
use App\Account;
use App\AccountGroups;
use Auth;

class Setting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $orders     =   Invoice::where([['status', '=', '1'],['type','=','Order']])->get();
        $invoices   =   Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get();

        $compactData=array('invoices', 'orders');
        return View::make("users.index", compact($compactData));
    }

    public function advanced(){
        return View::make("setting.advanced");
    }

    public function taxRate(){
        $taxes  =   Taxes::all();
        $compactData=array('taxes');
        return View::make("setting.tax",compact($compactData));
    }

    public function accounts(){
        $accounts  =   Account::all();
        $accountGroup   =   AccountGroups::all();
        $taxes  =   Taxes::all();
        $compactData=array('accounts','accountGroup','taxes');
        return View::make("setting.accounts",compact($compactData));
    }

    public function financial(){
        $accounts  =   Account::all();
        $accountGroup   =   AccountGroups::all();
        $taxes  =   Taxes::all();
        $compactData=array('accounts','accountGroup','taxes');
        return View::make("setting.financial",compact($compactData));
    }

    public function conversion(){
        $taxes  =   Taxes::all();
        $compactData=array('taxes');
        return View::make("setting.conversion",compact($compactData));
    }
    
    public function assets(){
        $taxes  =   Taxes::all();
        $compactData=array('taxes');
        return View::make("setting.conversion",compact($compactData));
    }

    
}
