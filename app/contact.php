<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['user_id','contact_name','account_number','phone','fax','mobile',
        'direct_dail','skype','website','address','address1','address2','city','state','postal_code',
        'country','street_address','street_address1','street_address2','street_city','street_state',
        'street_postal_code','street_country','vat_eu_num','company_registration_number','sales_discount_per',
        'bank_account_number','bank_account_name','bank_detials','bills_due_date','bills_due_date_suggestions',
        'invoices_due_date','invoices_due_date_suggestions','xero_network_key','status'
    ];

    public function invoices()
    {
        return $this->hasMany('App\Invoices');
    }

    public function persons()
    {
        return $this->hasMany('App\Person');
    }
}
