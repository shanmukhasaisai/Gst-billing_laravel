<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartyController extends Controller
{
    public function addParty()
    {
        return view("party.add");
    }
    public function manageParties()
    {
        $parties = Party::select(
            'id',
            'party_type',
            'full_name',
            'phone_no',
            'address',
            'account_holder_name',
            'account_no',
            'bank_name',
            'ifsc_code',
            'branch_address',
            'created_at'
        )->get();

        return view("party.manage",compact('parties'));
    }
    public function createParty(Request $request)
    {

        $request->validate([
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:20',
            'phone_no' => 'required',
            'address' => 'required|max:255',

            'account_holder_name' => 'required|string|min:2|max:20',
            'account_no' => 'required',
            'bank_name' => 'required|max:255',
            'ifsc_code' => 'required|max:50',
            'branch_address' => 'required|max:255',
        ]);

        $param = request()->all();
        unset($param["_token"]);

        Party::create($param);
        return redirect()->route('add-party')->withStatus("Party successfully created");
    }
    public function editParty($party_id){
        
        $data['party'] = Party::find($party_id);
        return view("party.edit",$data);
    }
    public function updateParty($id,Request $request){
        $request->validate([
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:20',
            'phone_no' => 'required',
            'address' => 'required|max:255',

            'account_holder_name' => 'required|string|min:2|max:20',
            'account_no' => 'required',
            'bank_name' => 'required|max:255',
            'ifsc_code' => 'required|max:50',
            'branch_address' => 'required|max:255',
        ]);
        $param = request()->all();
        unset($param["_token"]);
        unset($param["_method"]);
        Party::where('id',$id)-> update($param);
        return redirect()->route('manage-parties')->withStatus('Party Updated successfully');
    }
    public function deleteParty(Party $party){
        $party ->delete();
        return redirect()->route('manage-parties')->withStatus('Party deleted successfully');
    }
}
