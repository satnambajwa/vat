<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

//use Illuminate\Support\Facades\URL;

use Yajra\Datatables\Datatables;
use View;
use App\User;
use App\Invoice;
use App\InvoiceDetails;
use App\Contact;
use App\Company;
use App\Currency;
use App\Payment;
use App\PaymentType;
use App\Person;
use App\Taxes;
use App\Item;
use App\Groups;
use App\Account;
use App\Note;
use Auth;

class Users extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function api()
    {
        
        $url            =   'https://test-api.service.hmrc.gov.uk/oauth/authorize';
        $response_type  =   'code';
        $client_id      =   'nCUu5iDW9StxunrWd7cn19nyYR0a';
        $scope          =   'read:vat+write:vat';
        $redirect_uri   =   'http://localhost:8000/satnam';

        $compactData    =   array('url','response_type','client_id','scope','redirect_uri');
        return View::make("users.api", compact($compactData));
    }

    public function apiresponse(Request $request)
    {
        if(isset($request['code'])){
            $endpoint = "https://test-api.service.hmrc.gov.uk/oauth/token";
            $headers[] = 'Accept: application/json';
            $headers[] = 'Content-Type: application/json';
            //$headers[] = 'Content-length: 0';

            $post = [
                'grant_type' => 'authorization_code',
                'client_id' => 'nCUu5iDW9StxunrWd7cn19nyYR0a',
                'client_secret' => '0c7fce1e-2e39-4b2e-987f-84a3341aad15',
                'redirect_uri' => 'http://localhost:8000/satnam',
                'code'   => $request['code'],
            ];


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$endpoint);
            // SSL important
            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $output = curl_exec($ch);
            
            if (curl_error($ch)) {
                $error_msg = curl_error($ch);
                dd($error_msg);
            }else{
                $response   =  (array) json_decode($output);
                if(!isset($response['error'])){
                    //print_r($response);die;
                    Session::put('access_token', $response['access_token']);
                    Session::put('refresh_token', $response['refresh_token']);
                    Session::put('scope', $response['scope']);
                    Session::put('token_type', $response['token_type']);
                }else
                    return redirect()->route('api');
            }
            curl_close($ch);
        }
        else{
            echo 'OUT';
            dd($request);
        }
        return redirect()->route('vatTax');
    }   

    public function vatTax()
    {
        //dd(Session::get('access_token'));
        
        return View::make("users.vat");
    }

    public function index()
    {
        $invoices   =   Invoice::where([['status', '=', '1'],['type','=','Invoice']])->get();
        $bills      =   Invoice::where([['status', '=', '1'],['type','=','bill']])->get();
        $data          = array();
        $bdata          = array();
        foreach($invoices as $invoice){
            $key        =   date("M d", strtotime($invoice->estimated_date));
            $data[$key] =   $invoice->total;
        }
        foreach($bills as $bill){
            $key        =   date("M d", strtotime($bill->estimated_date));
            $bdata[$key] =   $bill->total;
        }
        $compactData=array('data','bdata');
        return View::make("users.index", compact($compactData));
    }

    public function companies()
    {
        $companies      =   Company::where('user_id','=',Auth::user()->id)->get();
        $compactData    =   array('companies');
        return View::make("setting.companies", compact($compactData));
    }
    
    public function company($id='')
    {
        if(!empty($id))
            $company        =   Company::where([['id','=',$id],['user_id','=',Auth::user()->id]])->first();
        else
            $company        =   new Company;

        $phone          =   explode('-',$company->phone);
        $fax            =   explode('-',$company->fax);
        $mobile         =   explode('-',$company->mobile);
        $currencies     =   Currency::all();

        $compactData    =   array('company','phone','fax','mobile','currencies');
        return View::make("setting.company", compact($compactData));
    }

    public function companySave(Request $request)
    {
        $phone              =   implode('-',$request->get('phone'));
        $request['phone']   =   $phone;
        $fax                =   implode('-',$request->get('fax'));
        $request['fax']     =   $fax;
        $mobile             =   implode('-',$request->get('mobile'));
        $request['mobile']  =   $mobile;
        $request['user_id'] =   Auth::user()->id;

        if(empty($request->get('id'))){
            $add    =   Company::create(['user_id' => Auth::user()->id] + $request->all());
        }
        else{
            $id     =   $request->get('id');
            $add    =   Company::find($id);
            $add->update($request->all());
        }
        
        
        return redirect()->route('financial');
    }

    public function profile()
    {
        $contact        =   array();
        $isProfile      =   1;
        $contact        =   Company::where([['status','=',2],['user_id','=',Auth::user()->id]])->first();
        
        $id             =   $contact->id;
        $accountGroup   =   Account::where('user_id','=',Auth::user()->id);
        $taxes          =   Taxes::where('user_id','=',Auth::user()->id);

        $compactData    =   array('accountGroup','taxes','contact','id','isProfile');

        return View::make("users.financial", compact($compactData));
    }
    public function invoices()
    {  
        return View::make("users.invoices",['type'=>'invoice']);
    }

    public function quotes()
    {
        return View::make("users.invoices",['type'=>'quote']);
    }

    public function purchases()
    {  
        return View::make("users.invoices",['type'=>'purchase']);
    }

    public function bills()
    {
        return View::make("users.invoices",['type'=>'bill']);
    }
    
    public function expenses()
    {
        return View::make("users.invoices",['type'=>'expense']);
    }

    public function invoice(Request $request,$id)
    {
        $dat                =   Invoice::findOrFail($id);
        $currencies         =   Currency::all();
        $data['id']         =   $dat->id;
        $data['contact_id'] =   $dat->contact_id;
        $data['date']       =   $dat->date;
        $data['estimated_date'] =   $dat->estimated_date;
        $data['code']       =   $dat->code;
        $data['reference']  =   $dat->reference;
        $data['sub_total']  =   $dat->sub_total;
        $data['vat']        =   $dat->vat;
        $data['type']       =   $dat->type;
        $data['dicount']    =   $dat->dicount;
        $data['total']      =   $dat->total;
        $data['currency_id']=   $dat->currency_id;
        $data['amount_tax'] =   $dat->amount_tax;
        $data['status']     =   $dat->status;
        $items              =   array();
        foreach($dat->items as $item){
            $temp['id']             =   $item->id;
            $temp['item_id']        =   $item->item_id;
            $temp['description']    =   $item->description;
            $temp['quantity']       =   $item->quantity;
            $temp['unit_price']     =   $item->unit_price;
            $temp['discount']       =   $item->discount;
            $temp['account_id']     =   $item->account_id;
            $temp['amount']         =   $item->amount;
            $Tax                    =   Taxes::find($item->taxes_id);
            $temp['tax_id']         =   $Tax->id;
            $temp['tax_rate']       =   $Tax->total_tax_rate;
            $temp['tax_name']       =   $Tax->name;
            $amount                 =   $item->unit_price*$item->quantity;
            $discount               =   $amount*$item->discount/100;
            $taxableAmount          =   $amount-$discount;
            $tax1                   =   $taxableAmount*$Tax->total_tax_rate/100;
            $temp['tax']            =   $tax1;
            $items[]                =   $temp;
        }
        $dat                =   $dat;
        $data['items']      =   $items;
        $itemList           =   Item::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['ItemList']   =   $itemList;
        
        $url   =   explode('/',$request->path());
        if($url[0]=='invoice'||$url[0]=='quote')
            $data['contact']        =   Contact::where([['status', '=', '1'],['type','=','customer'],['user_id','=',Auth::user()->id]])->get();
        else
            $data['contact']        =   Contact::where([['status', '=', '1'],['type','=','supplier'],['user_id','=',Auth::user()->id]])->get();
        
        //$data['contact']    =   Contact::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['accounts']   =   Account::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['taxes']      =   Taxes::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $compactData        =   array('data','dat','currencies');
        $view   =  ($dat->status<2)?"users.invoice":"users.invoiceA";
        return View::make($view, compact($compactData));
    }
    
   
    public function create(Request $request)
    {
        $currencies             =   Currency::all();
        $data['currency_id']    =   1;
        $data['type']           =   $request->path();
        $data['amount_tax']     =   'No Tax';
        $data['items']          =   array();
        $data['ItemList']       =   Item::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['accounts']       =   Account::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['taxes']          =   Taxes::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        if($request->path()=='invoice'||$request->path()=='quote')
            $data['contact']        =   Contact::where([['status', '=', '1'],['type','=','customer'],['user_id','=',Auth::user()->id]])->get();
        else
            $data['contact']        =   Contact::where([['status', '=', '1'],['type','=','supplier'],['user_id','=',Auth::user()->id]])->get();
        
        $compactData            =   array('data','currencies');
        return View::make("users.invoice", compact($compactData));
    }

    public function update(Request $request, $id=null)
    {
        $id     =   (empty($id))?$request->get('id'):$id;
        $type   =   $request->get('type');
        $action =   array(); 
       
        if(!empty($id)){
            $share = Invoice::find($id);
            $action['action'] = 'Edited';
        }else{
            $share = new Invoice;
            $action['action'] = 'Created';
        }
        $link   = 0;
        if($request->get('save')>2){
            $status =   2;
            $link   =   $request->get('save');
        }else
            $status =   $request->get('save');

        $share->contact_id  =   $request->get('contact_id');
        $share->user_id     =   Auth::user()->id;
        $share->type        =   $type;
        $share->date        =   $request->get('date');
        $share->estimated_date =$request->get('estimated_date');
        $share->code        =   $request->get('code');
        $share->reference   =   $request->get('reference');
        $share->currency_id =   $request->get('currency_id');
        $share->amount_tax  =   $request->get('amount_tax');
        $share->sub_total   =   $request->get('sub_total');
        $share->vat         =   $request->get('vat');
        $share->total       =   $request->get('total');
        $share->status      =   $status;
        //dd($share);
        $share->save();
        $totalAmount    =   0;
        $action['message']  =   $share->code.' to '.$share->contact->contact_name.' for '.$share->sub_total;

        $log                =   new Note;
        $log->user_id       =   Auth::user()->id;
        $log->link_type_id  =   $share->id;
        $log->note          =   $action['message'];
        $log->action        =   $action['action'];
        $log->save();

        if(empty($id))
            $id =   $share->id;
        
        if(!empty($request->get('items'))){
            //Deleting
            if(!empty($request->get('iid')))
                InvoiceDetails::where('invoice_id','=',$id)->whereNotIn('id',$request->get('iid'))->delete();
            foreach($request->get('items') as $key=>$item){
                $nid         =   isset($request->get('iid')[$key])?$request->get('iid')[$key]:0;
            
                if($nid)
                    $InvoiceDetails = InvoiceDetails::find($nid); 
                else
                    $InvoiceDetails = new InvoiceDetails;
                    
                if(!is_numeric($request->get('accounts')[$key])){
                    $acco   =   Account::whereName($request->get('accounts')[$key])->first();
                    $InvoiceDetails->account_id =   $acco->id;
                }else
                    $InvoiceDetails->account_id =   $request->get('accounts')[$key];
    
                if(!is_numeric($request->get('taxes')[$key])){
                    $ta   =   Taxes::whereName($request->get('taxes')[$key])->first();
                    $InvoiceDetails->taxes_id =   $ta->id;
                    $taxrate    =   $ta->total_tax_rate;
                }else{
                    $InvoiceDetails->taxes_id   =   $request->get('taxes')[$key];
                    $dat    =   Taxes::where('id',$InvoiceDetails->taxes_id)->first();
                    $taxrate    =   $dat->total_tax_rate;
                }

                $InvoiceDetails->item_id    =   $item;
                $InvoiceDetails->invoice_id =   $id;                
                $InvoiceDetails->description=   $request->get('description')[$key];
                $InvoiceDetails->quantity   =   $request->get('quantity')[$key];
                $InvoiceDetails->unit_price =   $request->get('unit_price')[$key];
                $InvoiceDetails->discount   =   $request->get('discount')[$key];
                $InvoiceDetails->amount     =   $request->get('amount')[$key];
                if($share->amount_tax=='Tax Exclusive'){
                    $totalAmount    += $InvoiceDetails->amount+($InvoiceDetails->amount*$taxrate)/100;
                }else if($share->amount_tax=='Tax Inclusive'){
                    $totalVat    = $InvoiceDetails->amount-($InvoiceDetails->amount*100)/(100+$taxrate);
                    $totalAmount += $InvoiceDetails->amount; 
                }else
                    $totalAmount    += $InvoiceDetails->amount;
                $InvoiceDetails->save();
            }
        }
        $share->total    =   $totalAmount;
        $share->save();
        
        
        if($type=='invoice'){
            $url    = ($link==0)?'invoices':'invoice';
        }elseif($type=='quote'){
            $url    =   ($link==0)?'quotes':'quote';
        }elseif($type=='purchase'){
            if($share->contact->type =='customer')
            {
                $contact    =   Contact::find($share->contact_id);
                $contact->type='supplier';
                $contact->save();
            }
            $url    =   ($link==0)?'purchases':'purchase';
        }
        elseif($type=='expense'){
            $url    =   ($link==0)?'expenses':'expense';
        }else{
            $url    =   ($link==0)?'bills':'bill';
        }
        return redirect()->route($url);        
    }
    
    public function items()
    {
        $data           =   Item::where('user_id','=',Auth::user()->id)->get();
        //dd($data);
        $compactData    =   array('data');
        return View::make("users.items", compact($compactData));
    }
    
    public function item($id=null)
    {
        $data['item']       =   Item::find($id);
        $data['accounts']   =   Account::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $data['taxes']      =   Taxes::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $compactData=array('data');
        return View::make("users.item", compact($compactData));
    }

    public function itemSave(Request $request)
    {
        $id =   $request->get('id');
        if(!empty($id))
            $item = Item::find($id);
        else
            $item = new Item;

        $item->name =   $request->get('name');
        $item->code =   $request->get('code');
        $ipur       =   $request->get('is_purchase');
        $isel       =   $request->get('is_sell');
        
        if($ipur){
            $item->is_purchase          = $request->get('is_purchase');
            $item->purchase_unit_price  = $request->get('purchase_unit_price');
            $item->purchase_account_id  = $request->get('purchase_account_id');
            $item->purchase_tax_id      = $request->get('purchase_tax_id');
            $item->purchase_description = $request->get('purchase_description');
        }else{
            $item->is_purchase          = 0;
            $item->purchase_unit_price  = '';
            $item->purchase_account_id  = 0;
            $item->purchase_tax_id      = 0;
            $item->purchase_description = '';
        }

        if($isel){
            $item->is_sell          = $request->get('is_sell');
            $item->sell_unit_price  = $request->get('sell_unit_price');
            $item->sell_account_id  = $request->get('sell_account_id');
            $item->sell_tax_id      = $request->get('sell_tax_id');
            $item->sell_description = $request->get('sell_description');
        }else{
            $item->is_sell          = 0;
            $item->sell_unit_price  = '';
            $item->sell_account_id  = 0;
            $item->sell_tax_id      = 0;
            $item->sell_description = '';
        }
        $item->user_id              =   Auth::user()->id;
        $item->save();
        return redirect()->route('products');
    }

    public function store(Request $request)
    {
        
        Invoice::create(['user_id' => Auth::user()->id] + $request->all());
        return redirect()->route('invoices');        
    }

    public function client()
    {
        return Datatables::of(Contact::select('contact_name')->where('status', '=', '1')->get())->make(true);
    }    

    public function contacts()
    {
        $all        =   Contact::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
        $customer   =   Contact::where([['status', '=', '1'],['type','=','customer'],['user_id','=',Auth::user()->id]])->get();
        $supplier   =   Contact::where([['status', '=', '1'],['type','=','supplier'],['user_id','=',Auth::user()->id]])->get();
        $employee   =   Contact::where([['status', '=', '1'],['type','=','employee'],['user_id','=',Auth::user()->id]])->get();
        $archived   =   Contact::where([['status', '=', '1'],['type','=','archived'],['user_id','=',Auth::user()->id]])->get();
        
        $groups     =   Groups::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();

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
        foreach($archived as $user){
            foreach($user->persons as $person){
                if($person->is_primary){
                    $user['first_name']    =   $person->first_name;
                    $user['last_name']    =   $person->last_name;
                    $user['email']    =   $person->email;
                }
            }
        }
        $compactData=array('all','customer','supplier','employee','archived','groups');
        return View::make("users.contacts", compact($compactData));
    }

    public function contact($id=null)
    {
        $contact    =   array();
        $isProfile  =   0;
        if(!empty($id))
            $contact    =   Contact::findOrFail($id);
        $accountGroup   =   Account::where('user_id','=',Auth::user()->id);
        $taxes          =   Taxes::where('user_id','=',Auth::user()->id);
        $compactData=array('accountGroup','taxes','contact','id','isProfile');
        return View::make("users.contact", compact($compactData));
    }

    public function contactUpdate(Request $request)
    {
        $phone              =   implode('-',$request->get('phone'));
        $request['phone']   =   $phone;
        $fax                =   implode('-',$request->get('fax'));
        $request['fax']     =   $fax;
        $mobile             =   implode('-',$request->get('mobile'));
        $request['mobile']  =   $mobile;
        $directDail         =   implode('-',$request->get('direct_dail'));
        $request['direct_dail'] = $directDail;
        
       
        if(empty($request->get('id'))){
            $add    =   Contact::create(['user_id' => Auth::user()->id] + $request->all());
        }
        else{
            $id     =   $request->get('id');
            $add    =   Contact::find($id);
            $add->update($request->all());
        }
        foreach($request->get('first_name') as $key=>$val)
        {
            if(!empty($val)||!empty($request->get('last_name')[$key])||!empty($request->get('email')[$key])) {
                $pid    = '';
                if(!empty($request->get('personId')[$key]))
                    $pid    =   $request->get('personId')[$key];
               
                if(empty($pid))
                    Person::create(['contact_id' => $add->id,'first_name'=>$val,'last_name'=>$request->get('last_name')[$key],'email'=>$request->get('email')[$key],'is_primary'=>$request->get('is_primary')[$key]]);
                else{
                    $padd    =   Person::find($pid);
                    $padd->update(['contact_id' => $add->id,'first_name'=>$val,'last_name'=>$request->get('last_name')[$key],'email'=>$request->get('email')[$key],'is_primary'=>$request->get('is_primary')[$key]]);
                }
            }
        }
        
        return redirect()->route('contacts');
    }

    public function payments()
    {
        $payments       =   Payment::where('user_id','=',Auth::user()->id)->get();
        $compactData    =   array('payments','id');
        return View::make("users.payments", compact($compactData));
    }

    public function payment($id=null)
    {
        $payment        =   Payment::find($id);
        $payments       =   PaymentType::all();
        $accounts       =   Account::where('user_id','=',Auth::user()->id)->get();

        $compactData    =   array('payment','id','payments','accounts');
        return View::make("users.payment", compact($compactData));
    }

    public function savePayment(Request $request)
    {
        $id        =   $request->get('id');
        if($id){
            $log    =   Payment::find($id);
            $log->update($request->all());
        }
        else{
            $log    =  Payment::create(['user_id' => Auth::user()->id] + $request->all());
        }
        return redirect()->route('payments');
    }

    public function overview($type)
    {
        if($type=='sales'){
            $invoice        =   Invoice::where([['type', '=', 'invoice'],['user_id','=',Auth::user()->id],['status','>','0']])->get();
            $quote          =   Invoice::where([['type', '=', 'quote'],['user_id','=',Auth::user()->id]])->get();
            $data           =   array();

            foreach($invoice as $invo){
            if(isset($data['Invoices'][$invo->status]['count'])){
                    $data['Invoices'][$invo->status]['count']  +=   1;
                    $data['Invoices'][$invo->status]['amount']  +=   $invo->total;
                }
                else{
                    $data['Invoices'][$invo->status]['count']     =   1;
                    $data['Invoices'][$invo->status]['amount']    =   $invo->total;
                
                }
            }
            foreach($quote as $invo){
                if(isset($data['Quotes'][$invo->status]['count'])){
                    $data['Quotes'][$invo->status]['count']  +=   1;
                    $data['Quotes'][$invo->status]['amount']  +=   $invo->total;
                }
                else{
                    $data['Quotes'][$invo->status]['count']     =   1;
                    $data['Quotes'][$invo->status]['amount']    =   $invo->total;
                
                }
            }
        }
        else{
            $pur    =   Invoice::where([['type', '=', 'purchase'],['user_id','=',Auth::user()->id],['status','>','0']])->get();
            $bill   =   Invoice::where([['type', '=', 'bill'],['user_id','=',Auth::user()->id],['status','>','0']])->get();
            $data   =   array();

            foreach($bill as $invo){
                if(isset($data['Bills'][$invo->status]['count'])){
                    $data['Bills'][$invo->status]['count']  +=   1;
                    $data['Bills'][$invo->status]['amount']  +=   $invo->total;
                }
                else{
                    $data['Bills'][$invo->status]['count']     =   1;
                    $data['Bills'][$invo->status]['amount']    =   $invo->total;
                
                }
            }

            foreach($pur as $invo){
            if(isset($data['Purchase orders'][$invo->status]['count'])){
                    $data['Purchase orders'][$invo->status]['count']  +=   1;
                    $data['Purchase orders'][$invo->status]['amount']  +=   $invo->total;
                }
                else{
                    $data['Purchase orders'][$invo->status]['count']     =   1;
                    $data['Purchase orders'][$invo->status]['amount']    =   $invo->total;
                
                }
            }
            
        }
        $compactData    =   array('data','type');
        return View::make("users.overview", compact($compactData));
    }

    public function noteSave(Request $request)
    {
        $log                =   new Note;
        $log->note          =   $request->get('value');
        $log->link_type_id  =   $request->get('id');
        $log->user_id       =   Auth::user()->id;
        $log->action        =   'Note';
        $log->save();
    }

    public function addContact(Request $request)
    {
        $type       =   $request->get('type');
        if( $type=='purchase' || $type =='bill' || $type =='expense')
            $dat    =   'supplier';
        else
            $dat    =   'customer';
    
        $contact                =   new Contact;
        $contact->type          =   $dat;
        $contact->user_id       =   Auth::user()->id;
        $contact->contact_name  =   $request->get('value');
        $contact->save();
        return $contact->id;
    }
    
    

    public function getData($type,$view)
    {
        switch ($view) {
            case 'draft':
                return Datatables::of(Invoice::where([['status', '=', '0'],['type','=',$type],['user_id','=',Auth::user()->id]])->get())->make(true);
                break;    
            case 'approval':
                return Datatables::of(Invoice::where([['status', '=', '1'],['type','=',$type],['user_id','=',Auth::user()->id]])->get())->make(true);
                break;
            case 'awaiting':
                return Datatables::of(Invoice::where([['status', '=', '2'],['type','=',$type],['user_id','=',Auth::user()->id]])->get())->make(true);
                break;
            case 'paid':
                return Datatables::of(Invoice::where([['status', '=', '3'],['type','=',$type],['user_id','=',Auth::user()->id]])->get())->make(true);
                break;
            case 'payment':
                return Datatables::of(Invoice::where([['status', '=', '4'],['type','=',$type],['user_id','=',Auth::user()->id]])->get())->make(true);
                break;        
            default:
                return Datatables::of(Invoice::where([['type','=',$type],['user_id','=',Auth::user()->id]])->get())->make(true);
        }   
        
    }
}
