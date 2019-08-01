<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Helper;
use Illuminate\Support\Facades\DB;
class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
		//create new sitemap object
		$sitemap = \App::make("sitemap");
	
		//add items to the sitemap (url, date, priority, freq)
		$sitemap->add(\URL::to('/'), Carbon::now(), '1.0', 'daily');
		$sitemap->add(\URL::to('/daily'), Carbon::now(), '1.0', 'daily');
		$sitemap->add(\URL::to('/chinhsach'), Carbon::now(), '1.0', 'daily');

        //get all posts from db
        //$posts = DB::table('cms_news')->orderBy('created_at', 'desc')->get(); lang_id
		$tintucs = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('lang_id', 1)->where('status', 1)->where('b.type', 'tintuc')->get();

        //add every post to the sitemap
        foreach ($tintucs as $tintuc)
        {
            $sitemap->add($this->getTintucUrl($tintuc->title,$tintuc->id), $tintuc->updated_at, 1, 'daily');
        }
		$videos = DB::table('shop_video as a')->where('status', 1)->get();
	
		//add every post to the sitemap
		foreach ($videos as $tintuc)
		{
			$sitemap->add($this->getVideoUrl($tintuc->title,$tintuc->id), $tintuc->updated_at, 1, 'daily');
		}
		$gioithieus = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('lang_id', 1)->where('status', 1)->where('b.type', 'matxi')->get();
	
		//add every post to the sitemap
		foreach ($gioithieus as $gioithieu)
		{
			$sitemap->add($this->getGioiThieuUrl($gioithieu->title,$gioithieu->id), $gioithieu->updated_at, 1, 'daily');
		}

        //generate your sitemap (format, filename)
        $sitemap->store('xml', 'sitemap');
    }
	public function getTintucUrl($title,$id)
	{
		return route('tintucDetail', ['name' => Helper::strToUrl($title), 'id' => $id]);
	}
	public function getVideoUrl($title,$id)
	{
		return route('videoDetail', ['name' => Helper::strToUrl($title), 'id' => $id]);
	}
	public function getGioiThieuUrl($title,$id)
	{
		return route('gioithieuDetail', ['name' => Helper::strToUrl($title), 'id' => $id]);
	}
}
