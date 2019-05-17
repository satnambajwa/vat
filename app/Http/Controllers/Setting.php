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
use App\TaxComponent;
use App\Item;
use App\Groups;
use App\Company;
use App\Currency;
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

        $orders     =   Invoice::where([['status', '=', '1'],['type','=','Order'],['user_id','=',Auth::user()->id]])->get();
        $invoices   =   Invoice::where([['status', '=', '1'],['type','=','Invoice'],['user_id','=',Auth::user()->id]])->get();

        $compactData=array('invoices', 'orders');
        return View::make("users.index", compact($compactData));
    }

    public function advanced(){
        return View::make("setting.advanced");
    }

    public function taxRate(){
        $taxes          =   Taxes::where('user_id','=',Auth::user()->id)->get();
        //dd($taxes);
        $compactData    =   array('taxes');
        return View::make("setting.tax",compact($compactData));
    }
    public function taxSave(Request $request)
    {
        if($request->id){
            $tax                    =   Taxes::findorfail($request->id);
        }else{
            $tax                    =   new Taxes;
        }
        $tax->name              =   $request->name;
        $tax->status            =   1;
        $tax->user_id           =   Auth::user()->id;
        $tax->save();
        $total                  =   0;
        foreach($request->title as $key=>$title){
            if($title){
                if($request->iid[$key])
                    $comp        =   TaxComponent::findorfail($request->iid)[$key];
                else
                    $comp       =   new TaxComponent;
                $comp->title    =   $title;
                $comp->user_id  =   Auth::user()->id;
                $comp->taxes_id =   $tax->id;
                $comp->value    =   $request->value[$key];
                $comp->compound =   0;
                $comp->save();
                $total          +=   $comp->value;
            }
        }
        $tax->total_tax_rate    =   $total;
        $tax->save();
        return redirect()->route('taxRate');
    }

    public function ajaxTaxData(Request $request)
    {
        $tax    =   Taxes::findOrFail($request->id);
        $data['id']         =   $tax->id;
        $data['name']       =   $tax->name;
        $data['component']  =   $tax->components;
        return response()->json($data);
    }
    
    public function accounts(){
        $accounts   =   Account::where('user_id','=',Auth::user()->id)->get();
        $data       =   AccountGroups::all();
        $accountGroup=array();
        foreach($data as $ag)
            $accountGroup[$ag->type][]  =   $ag;

        $taxes          =   Taxes::where('user_id','=',Auth::user()->id)->get();
        $compactData    =   array('accounts','accountGroup','taxes');
        return View::make("setting.accounts",compact($compactData));
    }

    public function ajaxAccountData(Request $request)
    {
        $data   =   Account::findOrFail($request->id);
        return response()->json($data);
    }

    public function accountSave(Request $request)
    {
        if($request->id)
            $account                        =   Account::findorfail($request->id);
        else
            $account                        =   new Account;

        $account->account_groups_id         =   $request->account_groups_id;
        $account->code                      =   $request->code;
        $account->name                      =   $request->name;
        $account->description               =   $request->description;
        $account->taxes_id                  =   $request->taxes_id;
        $account->show_dashboard_watchlist  =   $request->show_dashboard_watchlist?1:0;
        $account->show_expense_claims       =   $request->show_expense_claims?1:0;
        $account->enable_payments           =   $request->enable_payments?1:0;
        $account->status                    =   1;
        $account->user_id                   =   Auth::user()->id;
        //dd($account);
        $account->save();
        return redirect()->route('accounts');
    }

    public function financial()
    {
        $company        =   Company::where('user_id','=',Auth::user()->id)->first();
        $currency       =   Currency::where('user_id','=',1)->get();
        $accounts       =   Account::where('user_id','=',Auth::user()->id);
        $accountGroup   =   AccountGroups::where('user_id','=',Auth::user()->id);
        $taxes          =   Taxes::where('user_id','=',Auth::user()->id);
        $compactData    =   array('company','currency','accounts','accountGroup','taxes');
        return View::make("setting.financial",compact($compactData));
    }

    public function conversion()
    {
        $taxes  =   Taxes::where('user_id','=',Auth::user()->id);
        $compactData=array('taxes');
        return View::make("setting.conversion",compact($compactData));
    }
    
    public function assets(){
        $taxes  =   Taxes::where('user_id','=',Auth::user()->id);
        $compactData=array('taxes');
        return View::make("setting.conversion",compact($compactData));
    }

    public function tax()
    {
        
    }

    
}
