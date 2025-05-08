<?php



namespace App\Http\Controllers\Admin;

use App\Helpers\ParentDetailHelper;
use App\Helpers\SupportTicketHelper;
use App\Helpers\UserHelper;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class DashboardController extends Controller

{

    public function index(){
       $data['totalTutors'] = UserHelper::countTutors();
        $data['totalParents'] = UserHelper::countParents();
        $data['totalofflineBookings'] = ParentDetailHelper::countOfflineBookings();
        $data['totalTickets'] = SupportTicketHelper::countTickets();

        return view('admin.dashboard.dashboard',$data);

    }

}