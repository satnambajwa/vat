<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use View;
use App\User;
use App\Invoice;
use App\Contact;
use App\Taxes;
use App\Item;
use Auth;

class Users extends Controller
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

    public function invoices(){
       
        return View::make("users.invoices");
    }

    public function invoice($id){        
        $dat=   Invoice::findOrFail($id);
        $data['id'] =   $dat->id;
        $data['contact_id'] =   $dat->contact_id;
        $data['date'] =   $dat->date;
        $data['estimated_date'] =   $dat->estimated_date;
        $data['code'] =   $dat->code;
        $data['reference'] =   $dat->reference;
        $data['sub_total'] =   $dat->sub_total;
        $data['vat'] =   $dat->vat;
        $data['type'] =   $dat->type;
        $data['dicount'] =   $dat->dicount;
        $data['total'] =   $dat->total;
        $data['currency_id'] =   $dat->currency_id;
        $data['amount_tax'] =   $dat->amount_tax;
        $items = array();
        foreach($dat->items as $item){
            $temp['item_id']        =   $item->id;
            $temp['description']    =   $item->description;
            $temp['quantity']       =   $item->quantity;
            $temp['unit_price']     =   $item->unit_price;
            $temp['discount']       =   $item->discount;
            $temp['account_id']     =   $item->account_id;
            $temp['amount']         =   $item->amount;
            
            $Tax    =   Taxes::find($item->taxes_id);
            $temp['tax_id'] =   $Tax->name;
            $temp['tax_rate'] =   $Tax->total_tax_rate;
            $amount = $item->unit_price*$item->quantity;
            $discount = $amount*$item->discount/100;
            $taxableAmount = $amount-$discount;
            $tax1 = $taxableAmount*$Tax->total_tax_rate/100;
            $temp['tax'] =  $tax1;
            $items[]=$temp;
        }
        $data['items'] =   $items;
        $itemList       =   Item::where([['status', '=', '1'],['user_id','=','1']])->get();//Auth::user()->id
        
        $data['ItemList']   =   $itemList;
        $compactData=array('data');
        //users.invoice
        return View::make("home", compact($compactData));
    }

    public function store(Request $request)
    {
        
        Invoice::create(['user_id' => Auth::user()->id] + $request->all());
        return redirect()->route('invoices');        
    }

    public function create()
    {
        $data['currency_id']    =   1;
        $data['type']           =   'Invoice';
        $data['amount_tax']     =   'No Tax';
        $data['ItemList']       =   Item::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['items']          =   array();
        $compactData=array('data');
        //users.invoice
        return View::make("home", compact($compactData));
    }
    public function update(Request $request, $id)
    {
        $share = Invoice::find($id);
        $share->contact_id = $request->get('contact_id');
        $share->date = $request->get('date');
        $share->estimated_date = $request->get('estimated_date');
        $share->code = $request->get('code');
        $share->reference = $request->get('reference');
        $share->currency_id = $request->get('currency_id');
        $share->amount_tax = $request->get('amount_tax');
        $share->sub_total = $request->get('sub_total');
        $share->save();
        return redirect()->route('invoices');        
    }

    public function client(){
        return Datatables::of(Contact::select('contact_name')->where('status', '=', '1')->get())->make(true);
    }
    

    public function contacts()
    {
        $all         =   Contact::where('status', '=', '1')->get();
        $customer    =   Contact::where([['status', '=', '1'],['type','=','customer']])->get();
        $supplier    =   Contact::where([['status', '=', '1'],['type','=','supplier']])->get();
        $employee    =   Contact::where([['status', '=', '1'],['type','=','employee']])->get();
        foreach($all as $user){
            foreach($user->persons as $person){
                if($person->is_primary){
                    $user['first_name']    =   $person->first_name;
                    $user['last_name']    =   $person->last_name;
                    $user['email']    =   $person->email;
                }
            }
        }

        foreach($customer as $user){
            foreach($user->persons as $person){
                if($person->is_primary){
                    $user['first_name']    =   $person->first_name;
                    $user['last_name']    =   $person->last_name;
                    $user['email']    =   $person->email;
                }
            }
        }

        foreach($supplier as $user){
            foreach($user->persons as $person){
                if($person->is_primary){
                    $user['first_name']    =   $person->first_name;
                    $user['last_name']    =   $person->last_name;
                    $user['email']    =   $person->email;
                }
            }
        }
        foreach($employee as $user){
            foreach($user->persons as $person){
                if($person->is_primary){
                    $user['first_name']    =   $person->first_name;
                    $user['last_name']    =   $person->last_name;
                    $user['email']    =   $person->email;
                }
            }
        }
        $compactData=array('all','customer','supplier','employee');
        return View::make("users.contacts", compact($compactData));
    }

    public function contact()
    {
        $compactData=array();
        return View::make("users.contact", compact($compactData));
    }

    public function contactUpdate(Request $request)
    {
        $phone              =   implode('-',$request->get('phone'));
        $request['phone']   =   $phone;
        $fax                =  implode('-',$request->get('fax'));
        $request['fax']     =   $fax;
        $mobile = implode('-',$request->get('mobile'));
        $request['mobile']  =   $mobile;
        $directDail = implode('-',$request->get('direct_dail'));
        $request['direct_dail'] =   $directDail;
        Contact::create(['user_id' => Auth::user()->id] + $request->all());
        return redirect()->route('contacts');
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
                return Datatables::of(Invoice::where([['status', '=', '3'],['type','=','Invoice']])->get())->make(true);
                break;
            case 'awaiting':
                return Datatables::of(Invoice::where([['status', '=', '2'],['type','=','Invoice']])->get())->make(true);
                break;
            case 'paid':
                return Datatables::of(Invoice::where([['status', '=', '4'],['type','=','Invoice']])->get())->make(true);
                break;
            case 'payment':
                return Datatables::of(Invoice::where([['status', '=', '5'],['type','=','Invoice']])->get())->make(true);
                break;        
            default:
                return Datatables::of(Invoice::where('type','=','Invoice')->get())->make(true);
        }   
        
    }
}
