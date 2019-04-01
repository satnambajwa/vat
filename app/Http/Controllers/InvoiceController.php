<?php
namespace App\Http\Controllers;

ini_set('memory_limit', -1);
use Illuminate\Http\Request;


use App\Invoice;
use App\Taxes;
use App\Account;
use App\Item;
use App\Http\Resources\Invoice as InvoiceResource;
use App\Http\Resources\InvoiceCollection;

class InvoiceController extends Controller
{
    public function index()
    {
        return new InvoiceCollection(Invoice::all());
    }

    public function show($id)
    {
        if($id!=0){
            $dat=   Invoice::findOrFail($id);
            $data['id'] =   $dat->id;
            $data['contact_id'] =   $dat->contact_id;
            $data['date'] =   $dat->date;
            $data['estimated_date'] =   $dat->estimated_date;
            $data['code'] =   $dat->code;
            $data['reference'] =   $dat->reference;
            $data['sub_total'] =   $dat->sub_total;
            $data['vat'] =   $dat->vat;
            $data['dicount'] =   $dat->dicount;
            $data['total'] =   $dat->total;
            $data['currency_id'] =   $dat->currency_id;
            $data['amount_tax'] =   $dat->amount_tax;
            $items = array();
            foreach($dat->items as $item){
                $temp['item_id']        =   $item->id;
                $temp['item_name']      =   $item->name;
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
            $data['items']      =   $items;
        }else{
            
            $data['items']      =  [];
        }
        $itemList           =   Item::where([['status', '=', '1'],['user_id','=','1']])->get();//Auth::user()->id
        $itemLi   =   array();
        foreach($itemList as $iteml){
            $temp2                  =   array();
            $quantity               =   1;
            $ddiscount              =   0;
            $temp2['id']            =   $iteml->id;
            $temp2['name']          =   $iteml->name;
            $temp2['description']   =   $iteml->description;
            $temp2['quantity']      =   $quantity;
            $temp2['unit_price']    =   $iteml->sell_unit_price;
            $temp2['discount']      =   $ddiscount;
            $temp2['account_id']    =   $iteml->sell_account_id;

            $Tax    =   Taxes::find($iteml->sell_tax_id);
            $temp2['tax_id'] =   $Tax->id;
            $temp2['tax_rate'] =   $Tax->total_tax_rate;

            $amount = $iteml->sell_unit_price*$quantity;
            
            $discount = $amount*$ddiscount/100;
            $taxableAmount = $amount-$discount;
            $tax1 = $taxableAmount*$Tax->total_tax_rate/100;
            $temp2['tax'] =  $tax1;
            $temp2['amount']         =   $taxableAmount+$tax1;
            $itemLi[]=$temp2;
        }
        $data['ItemList']   =   $itemLi;
        $data['taxes']      =   Taxes::all();
        $data['accounts']   =   Account::all();
        return new InvoiceResource($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $invoice = Invoice::create($request->all());

        return (new InvoiceResource($invoice))
                ->response()
                ->setStatusCode(201);
    }

    public function save($id, Request $request)
    {
        echo '<pre>';
        echo $id;
        dd($request->get('data'));
        die;
        
        $invoice = Invoice::findOrFail($id);
       
        $invoice->save();

        return new InvoiceResource($invoice);
    }

    public function delete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return response()->json(null, 204);
    }

    public function resetAnswers($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->answers = 0;
        $invoice->points = 0;

        return new InvoiceResource($invoice);
    }
}