<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

//表示のみのため、Requestは使わない
class AnalysisController extends Controller
{
    public function index()
    {
        $startDate = '2024-05-01';
        $endDate = '2024-09-10';

        // $period = Order::betweenDate($startDate, $endDate)
        // ->groupBy('id')
        // ->selectRaw('id, sum(subtotal) as total, customer_name, status, created_at')
        // ->orderBy('created_at')
        // ->paginate(50);

        // dd($period);
        //きちんと取れている

        $subQuery = Order::betweenDate($startDate, $endDate)
        ->where('status', true)
        ->groupBy('id')
        ->selectRaw('id, SUM(subtotal) as totalPerPurchase, DATE_FORMAT(created_at, "%Y%m%d") as date');

        $data = DB::table($subQuery)
        ->groupBy('date')
        ->selectRaw('date, SUM(totalPerPurchase) as total')
        ->get();

        // dd($data);

        return Inertia::render('Analysis');
    }
}
