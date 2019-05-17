<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\InvoiceExport;
use App\Imports\InvoiceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Invoice;

class ExcelController extends Controller
{
    public function importExportView()
    {
       return view('excel');
    }

    public function export() 
    {
        return Excel::download(new InvoiceExport, 'invoice_'.time().'.xlsx');
    }
   
    public function import() 
    {
        $users  =   Excel::toCollection(new InvoiceImport,request()->file('file'));
        foreach($users[0] as $user){
            $invoice    =   Invoice::where('id',$user[0])->first();
            if(isset($invoice->id)){
                
                $invoice->update([
                    'user_id'=>$user[1],
                    'currency_id'=>$user[2],
                    'contact_id'=>$user[3],
                    'code'=>$user[4],
                    'reference'=>$user[5],
                    'date'=>$user[6],
                    'estimated_date'=>$user[7],
                    'amount_tax'=>$user[8],
                    'sub_total'=>$user[9],
                    'discount'=>$user[10],
                    'vat'=>$user[11],
                    'total'=>$user[12],
                    'type'=>$user[13],
                    'amount_paid'=>$user[14],
                    'date_paid'=>$user[15],
                    'paid_to'=>$user[16],
                    'address'=>$user[17],
                    'attention'=>$user[18],
                    'telephone'=>$user[19],
                    'delivery_instructions'=>$user[20],
                    'created_at'=>$user[21],
                    'updated_at'=>$user[22],
                    'status'=>$user[23]
                ]);

            }else{
                $invoice    =   Invoice::create([
                    'id'=>$user[0],
                    'user_id'=>$user[1],
                    'currency_id'=>$user[2],
                    'contact_id'=>$user[3],
                    'code'=>$user[4],
                    'reference'=>$user[5],
                    'date'=>$user[6],
                    'estimated_date'=>$user[7],
                    'amount_tax'=>$user[8],
                    'sub_total'=>$user[9],
                    'discount'=>$user[10],
                    'vat'=>$user[11],
                    'total'=>$user[12],
                    'type'=>$user[13],
                    'amount_paid'=>$user[14],
                    'date_paid'=>$user[15],
                    'paid_to'=>$user[16],
                    'address'=>$user[17],
                    'attention'=>$user[18],
                    'telephone'=>$user[19],
                    'delivery_instructions'=>$user[20],
                    'created_at'=>$user[21],
                    'updated_at'=>$user[22],
                    'status'=>$user[23]
                ]);
            }
        }
        return back();
    }
}