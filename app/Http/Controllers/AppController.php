<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return redirect()->route('login');
    }
    public function delete($table, $id){
        $param=array('is_deleted'=>1);

        DB::table($table)->where("id", $id)->update($param);
        return redirect()->back()->withStatus("Bill Deleted successfully");

    }
}
