<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use View;
use App\Report;
use Auth;

class Reports extends Controller
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
        $reports        =   Report::where('status', '=', '1')->get();
        foreach($reports as $report){
            $data[$report->category][]   =   $report;
        }

        $compactData    =   array('data');
        return View::make("reports.balance", compact($compactData));
    }
}
