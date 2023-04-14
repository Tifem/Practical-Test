<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index(Request $request){
        $date = date('Y-m-d', strtotime(Auth::user()->created_at));
        $data['now'] = Carbon::now();
        $data['activities'] = Activity::where('is_global', '=', 1)
        ->where('created_at', '>=', $date)
        ->orwhere(
            function($query) {
              return $query
                     ->where('user_id', Auth::user()->id);
             })
             ->get();
        return view('member.index', $data);
    }
}
