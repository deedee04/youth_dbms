<?php

namespace App\Http\Controllers;

use App\Models\CommunityEngagement;
use Illuminate\Http\Request;
use App\User;
use App\Models\Partners;
use App\Models\YouthInfo;
use App\Models\YouthOrg;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countUser = User::count();
        $countPartners = Partners::count();
        $countYouthInfo = YouthInfo::count();
        $countYouthOrg = YouthOrg::count();
        $countCom = CommunityEngagement::count();


        return view('home', compact('countUser', 'countPartners', 'countYouthOrg', 'countYouthInfo', 'countCom'));
    }
}
