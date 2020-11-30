<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Email;
use DB;
class fetchEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch email according to settings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $uid_array=array();
      $uids = DB::table('emails')->select('uid')->get();
      if($uids){
        foreach($uids as $uid){
        $uid_array[]=$uid->uid;
        }
      }
      $mbox = imap_open('{imap.gmail.com:993/imap/ssl}', 'harveyspect60@gmail.com', 'zwukybktspqnzwqk');
      $MC = imap_check($mbox);
      $result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
      foreach ($result as $overview) {
          if(!in_array($overview->uid,$uid_array)){
            Email::create([
              'from'=>$overview->from,
              'to'=>$overview->to,
              'sent_date'=>$overview->date,
              'subject'=>$overview->subject,
              'uid'=>$overview->uid,
              'msgno'=>$overview->msgno,
              'seen'=>$overview->seen,
              'mbox'=>$mbox
            ]);
        }
      }
        return 1;
    }
}
