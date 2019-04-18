<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use View;
use App\Report;
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
        $invoice    =   Invoice::where('user_id','=',Auth::user()->id)->whereIn('type',['invoice'])->get();
        $data       =  array();
        foreach($invoice as $itm){
            $data['assets']=array('cash');
        }

        //$invoice    =   Invoice::where('user_id','=',Auth::user()->id)->whereIn('type',['invoice'])->get();
        //dd($invoice);

        $compactData    =   array('data');
        return View::make("reports.balance", compact($compactData));
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
