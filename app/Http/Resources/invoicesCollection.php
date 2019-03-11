<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class invoicesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response   =  array();
        foreach($this->collection as $rec){
            $data           =   array();
            $data['code']   =   $rec->code.'-'.$rec->id;
            $data['contact']=   $rec->contact.'-'.$rec->contact_id;
            $data['reference']= $rec->reference;
            $data['date']   =   $rec->date;
            $data['estimated_date']= $rec->estimated_date;
            $data['sub_total']= $rec->sub_total;
            $data['total']  =   $rec->total;
            $data['status'] =   $rec->status;
            $response[]     =   $data;
        }
        return  $response;
        //return parent::toArray($request);
    }
}
