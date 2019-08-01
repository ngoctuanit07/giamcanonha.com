<?php

namespace App\Console\Commands;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class PostBlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:blog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Đăng bài tự động';

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
     * @return mixed
     */
    public function handle()
    {
        //
		$tintucs = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('lang_id', 1)->get();
		foreach ($tintucs as $tintuc) {
			$now = new DateTime();
			$timeStamp = $now->getTimestamp();
			$currentTime = date("H:i", $timeStamp);
			$end = $tintuc->ngaydang;
			$ngaydang = date("H:i", strtotime($end));
			if ($currentTime == $ngaydang) {
				DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('lang_id', 1)->where('id', $tintuc->id)
					->update(['b.status' => 1]);
			}
		}
    }
}
