<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request) {
        if (Auth::guard('karyawan')->check()) {
           return view('dashboardoperator', ['karyawan_nama'=>$request->session()->get('nama')]);
  
        } else {
           return redirect('/login');
        }
      }
  
      public function accessSessionData(Request $request) {
          if($request->session()->has('my_name'))
             echo $request->session()->get('my_name');
          else
             echo 'No data in the session';
       }
       public function storeSessionData(Request $request) {
          $request->session()->put('my_name','Virat Gandhi');
          echo "Data has been added to session";
       }
       public function deleteSessionData(Request $request) {
          $request->session()->forget('my_name');
          echo "Data has been removed from session.";
       }
}
