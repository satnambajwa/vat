<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use View;
use App\Report;
use App\Payment;
use App\Invoice;
use Auth;


class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $reports        =   Report::where('status', '=', '1')->get();
        foreach($reports as $report){
            $data[$report->category][]   =   $report;
        }
        $compactData    =   array('data');
        return View::make("reports.index", compact($compactData));
    }
    public function balanceSheet()
    {
        $cPayment    =   Payment::select("payments.*","accounts.id as accountsId","account_groups.id as groupId","account_groups.type")
                            ->join("accounts","accounts.id","=","cr_account_id")
                            ->join("account_groups",function($join){
                                    $join->on("account_groups.id","=","accounts.account_groups_id");
                            })
                            ->where('payments.user_id','=',Auth::user()->id)->get();
        
        $data       =  array();
        foreach($cPayment as $itm){
            if(isset($data[$itm->type]))
                $data[$itm->type]   +=  $itm->cr_amount;
            else
                $data[$itm->type]  =  $itm->cr_amount;

            if(isset($data['Total']))
                $data['Total']     +=   $itm->dr_amount;
            else
                $data['Total']     =   $itm->dr_amount;
        }
        
        $dtotal =   isset($data['Total'])?$data['Total']:0;
        unset($data['Total']);
        $data['Total']  =   $dtotal;

        $dPayment    =   Payment::select("payments.*","accounts.id as accountsId","account_groups.id as groupId","account_groups.type")
                            ->join("accounts","accounts.id","=","dr_account_id")
                            ->join("account_groups",function($join){
                                    $join->on("account_groups.id","=","accounts.account_groups_id");
                            })
                            ->where('payments.user_id','=',Auth::user()->id)->get();
        
        $ddata       =  array();
        foreach($dPayment as $itm){
            if(isset($ddata[$itm->type]))
                $ddata[$itm->type]  +=  $itm->dr_amount;
            else
                $ddata[$itm->type]  =  $itm->dr_amount;
            
            if(isset($ddata['Total']))
                $ddata['Total']     +=   $itm->dr_amount;
            else
                $ddata['Total']     =   $itm->dr_amount;
        }

        $total =   isset($ddata['Total'])?$ddata['Total']:0;
        unset($ddata['Total']);
        $ddata['Total']  =   $total;

        $compactData    =   array('data','ddata');
        return View::make("reports.balance", compact($compactData));
    }

    public function cashSummary()
    {
        $cPayment   =   Payment::select("payments.*","accounts.id as accountsId","account_groups.id as groupId","accounts.name as accountName","account_groups.type")
                            ->join('accounts', function ($join) {
                                $join->on('accounts.id', '=', 'cr_account_id');
                                    //->orOn('accounts.id', '=', 'dr_account_id');
                            })
                            ->join("account_groups",function($join){
                                $join->on("account_groups.id","=","accounts.account_groups_id");
                            })
                            ->where('payments.user_id','=',Auth::user()->id)->get();
        
        $data       =  array();
        foreach($cPayment as $itm){
            if(isset($data[$itm->accountName]))
                $data[$itm->accountName]   +=  $itm->cr_amount;
            else
                $data[$itm->accountName]  =  $itm->cr_amount;

            if(isset($data['Total']))
                $data['Total']     +=   $itm->dr_amount;
            else
                $data['Total']     =   $itm->dr_amount;
        }
        
        $dtotal =   isset($data['Total'])?$data['Total']:0;
        unset($data['Total']);
        $data['Total']  =   $dtotal;


        $cPayment   =   Payment::select("payments.*","accounts.id as accountsId","account_groups.id as groupId","accounts.name as accountName","account_groups.type")
                            ->join('accounts', function ($join) {
                                $join->on('accounts.id', '=', 'dr_account_id');
                            })
                            ->join("account_groups",function($join){
                                $join->on("account_groups.id","=","accounts.account_groups_id");
                            })
                            ->where('payments.user_id','=',Auth::user()->id)->get();
        
        $edata  =   array();
        foreach($cPayment as $itm){
            if(isset($edata[$itm->accountName]))
                $edata[$itm->accountName]   +=  $itm->cr_amount;
            else
                $edata[$itm->accountName]  =  $itm->cr_amount;

            if(isset($edata['Total']))
                $edata['Total']     +=   $itm->dr_amount;
            else
                $edata['Total']     =   $itm->dr_amount;
        }
        
        $ddtotal =   isset($edata['Total'])?$edata['Total']:0;
        unset($edata['Total']);
        $edata['Total']  =   $ddtotal;

        $compactData    =   array('data','edata');
        return View::make("reports.cash", compact($compactData));
    }

    public function profitLoss()
    {
        $cPayment   =   Payment::select("payments.*","accounts.id as accountsId","account_groups.id as groupId","accounts.name as accountName","account_groups.type")
                            ->join('accounts', function ($join) {
                                $join->on('accounts.id', '=', 'cr_account_id');
                                    //->orOn('accounts.id', '=', 'dr_account_id');
                            })
                            ->join("account_groups",function($join){
                                $join->on("account_groups.id","=","accounts.account_groups_id");
                            })
                            ->where('payments.user_id','=',Auth::user()->id)->get();
        
        $data       =  array();
        foreach($cPayment as $itm){
            if(isset($data[$itm->accountName]))
                $data[$itm->accountName]   +=  $itm->cr_amount;
            else
                $data[$itm->accountName]  =  $itm->cr_amount;

            if(isset($data['Total']))
                $data['Total']     +=   $itm->dr_amount;
            else
                $data['Total']     =   $itm->dr_amount;
        }
        
        $dtotal =   isset($data['Total'])?$data['Total']:0;
        unset($data['Total']);
        $data['Total']  =   $dtotal;


        $cPayment   =   Payment::select("payments.*","accounts.id as accountsId","account_groups.id as groupId","accounts.name as accountName","account_groups.type")
                            ->join('accounts', function ($join) {
                                $join->on('accounts.id', '=', 'dr_account_id');
                            })
                            ->join("account_groups",function($join){
                                $join->on("account_groups.id","=","accounts.account_groups_id");
                            })
                            ->where('payments.user_id','=',Auth::user()->id)->get();
        
        $edata  =   array();
        foreach($cPayment as $itm){
            if(isset($edata[$itm->accountName]))
                $edata[$itm->accountName]   +=  $itm->cr_amount;
            else
                $edata[$itm->accountName]  =  $itm->cr_amount;

            if(isset($edata['Total']))
                $edata['Total']     +=   $itm->dr_amount;
            else
                $edata['Total']     =   $itm->dr_amount;
        }
        
        $ddtotal =   isset($edata['Total'])?$edata['Total']:0;
        unset($edata['Total']);
        $edata['Total']  =   $ddtotal;

        $compactData    =   array('data','edata');
        return View::make("reports.profitLoss", compact($compactData));
    }

    public function generatePDF(Request $request)
    {
        $type   =   $request->type;
        $action =   $request->action;
        $id     =   $request->id;
        switch ($type) {
            case 'invoice':
                $dat                =   Invoice::findOrFail($id);
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
                    $temp['tax_id']         =   $Tax->name;
                    $temp['tax_rate']       =   $Tax->total_tax_rate;
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
                $data['contact']    =   Contact::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
                $data['accounts']   =   Account::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
                $data['taxes']      =   Taxes::where([['status', '=', '1'],['user_id','=',Auth::user()->id]])->get();
                $compactData        =   array('data','dat');

                if($action === 'download') {
                    $pdf = PDF::loadView('users.invoice', $compactData);
                    $pdf->save(storage_path().'_filename.pdf');
                    return $pdf->download('users.pdf');
                } else {
                    $view = View('users.invoice', $compactData);
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view->render());
                    return $pdf->stream();
                }
                break;
            
            case 'report':
                # code...
                break;
            
            default:
                # code...
                break;
        }
        

        
 
    }
}
