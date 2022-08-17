<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $start_time = null;
        $rest_start_time = null;
        $uid = Auth::user()->id;
        $dt = Carbon::now()->format('ymd');
        $item = attendance::where('users_id',$uid)->where('date',$dt)->first();
        if($item != null){
           // $name = $item->start_time;//Carbon::now();//Auth::user()->name;
            $start_time = $item->start_time;
            $rest_start_time = $item->rest_start_time;
        }
        // $start_time = null;
        return View('index',compact('name','start_time','rest_start_time'));
    }

    public function start()
    {
        $uid = Auth::user()->id;
        $dt = Carbon::now()->format('ymd');
        $cnt = attendance::where('users_id',$uid)->where('date',$dt)->count();
        $item = $cnt;
        if($cnt==0){
            $item = attendance::create([
                'users_id' => Auth::user()->id,
                'date' => Carbon::now()->format('ymd'),
                'start_time' => Carbon::now(),
                'rest_time_total' => 0,
            ]);
        }
        return redirect()->route('index');
    }

    public function end()
    {
        $uid = Auth::user()->id;
        $today = Carbon::now()->format('ymd');
        $item = attendance::where('users_id', $uid)->where('date',$today)
        ->update(['end_time' => Carbon::now()]);
        
        return redirect()->route('index');
    }

        public function view($target = null)
        {
            if($target == null) $target = Carbon::now()->format('ymd');
            $dt = new Carbon("20".$target);
            $prev = $dt->addDays(-1)->format('ymd');
            $next = $dt->addDays(2)->format('ymd');
            $dt = $dt->addDays(-1)->format('ymd');
            $items = attendance::where('date', $target)->paginate(5);
            foreach($items as $item){
                $dt1 = new Carbon($item->start_time);
                $dt2 = new Carbon($item->end_time);
                $sec = $dt1->diffInSeconds($dt2);
                if($item->end_time==null) {
                    $dt2 = Carbon::create($dt1->year,$dt1->month,$dt1->day, 23, 59,59);
                    $item->end_time = "23:59:59";
                $sec = $dt1->diffInSeconds($dt2);
                }
                else{
                    $end_str = $dt2->format("h:m:s");
                    
                }
                $item->work_time = sprintf("%02d:%02d:%02d",$sec/3600,($sec /60) % 60,$sec % 60);
                $item->test = sprintf("%02d:%02d:%02d",2,59,59);
            }
            return View('view',compact('items','dt','prev','next'));
        }
}
