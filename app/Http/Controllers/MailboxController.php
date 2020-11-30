<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Email;

class MailboxController extends Controller
{
  public function index(Request $request){
    //echo $request->search;
    if($request->search!="Undefined" && isset($request->search)){
      $emails = DB::table('emails')
            ->orWhere(function($emails) use ($request){
                $emails->where('from','=', $request->search)
                ->orWhere('to', $request->search)
                ->orWhere('subject', $request->search)
                ->orWhere('sent_date', $request->search);
            })->simplePaginate(3);
    }else{
    $emails = DB::table('emails')->simplePaginate(3);
  }

		return view('mailbox', ['emails' => $emails]);
  }
public function destroy($id)
{
  $affectedRows = Email::where('uid', '=', $id)->delete();
  return redirect()->route('mailbox.index')->with('Deleted','User Deleted successfully.');
}
}
