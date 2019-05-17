<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;

class InvoiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $user)
    {
        return new Invoice([
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
