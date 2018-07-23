<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Model\{Project,ProjectDetail};
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return Redirect::To('login');
        }else{
            return Redirect::To('dashboard');
        }
    }
    
    public function dashboard(){
        $dashboard=[];
        $dashboard['domain_count']= Project::count();
        $dashboard['domains_with_ssl']= ProjectDetail::projectsHavingSsl();
        $dashboard['domains_with_delegate_access']= ProjectDetail::projectsHavingDelegateAccess();
        $dashboard['domains_expiring_soon']= ProjectDetail::projectExpiresIn(date("Y-m-d", strtotime("+15 day")));
        $dashboard['ssl_expiring_soon']= ProjectDetail::projectSslExpiresIn(date("Y-m-d", strtotime("+15 day")), true);
        $dashboard['hosting_expiring_soon']= ProjectDetail::projectHostingExpiresIn(date("Y-m-d", strtotime("+15 day")));
        
        $dashboard['expired_domains']= Project::expiredFilters('expired_domains','count');
        $dashboard['expired_ssl']= Project::expiredFilters('expired_ssl','count');
        $dashboard['expired_hosting']= Project::expiredFilters('expired_hosting','count');
        return view('dashboard', compact('dashboard')); 
    }
    public function profile(){
     return view('profile'); 
    }
    
}
