<?php
	
	namespace App\Http\Controllers;
	
	use App\Http\Controllers\Controller;
	use App\Models\Subscribe;
	use Illuminate\Http\Request;
	use App\Models\CmsNews;
	use App\Models\CmsNewsDescription;
	use Mail;
	use Helper;
	use View;
	use Spatie\SchemaOrg\Schema;
	
	class NewsController extends Controller
	{
		//
		public $configs;
		public $configsGlobal;
		
		public function __construct()
		{
			//parent::__construct();
			//=======Config====
			$configs = \Helper::configs();
			$configsGlobal = \Helper::configsGlobal();
			//============end config====
			$this->configsGlobal = $configsGlobal;
			$this->configs = $configs;
			
		}
		public function tintuc()
		{
			$news = (new CmsNews)->getTintuc($limit = 4, $opt = 'paginate');
			$newsList = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			return view(SITE_THEME . '.shop_tintuc',
				array(
					'title' => trans('language.blog'),
					'description' => $this->configsGlobal['description'],
					'keyword' => $this->configsGlobal['keyword'],
					'newsTintuc' => $news,
					'newsList' => $newsList,
					'msg' => "Không tìm thấy trang",
				)
			);
		}
		
		public function tintucDetail($name, $id)
		{
			$news_currently = (new CmsNews)->getTintucDetail($id);// CmsNews::find($id);
			$news = (new CmsNews)->getTintuc($limit = 4, $opt = 'paginate');
			$newsGioiThieu = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			if ($news_currently) {
				$title = ($news_currently) ? $news_currently->title : trans('language.not_found');
				$localBusiness = Schema::WebSite()
					->name($title)
					->email('tangthuyanthuyan@gmail.com')
					->url(route('tintucDetail',['name' => Helper::strToUrl($title),'id' => $id]))
					->telephone('0948068327')
					->contactPoint(Schema::contactPoint()->areaServed($title));
				$scheama = $localBusiness->toArray();
				return view(SITE_THEME . '.shop_tintuc_detail',
					array(
						'title' => $title,
						'scheama' => $scheama,
						'news_currently' => $news_currently,
						'news' => $news,
						'newsGioithieu' => $newsGioiThieu,
					)
				)->with('news',$news);
			} else {
				return view(SITE_THEME . '.notfound',
					array(
						'title' => trans('language.not_found'),
						'description' => '',
						'keyword' => $this->configsGlobal['keyword'],
						'msg' => "Không tìm thấy trang",
					)
				);
			}
		}
		
		public function gioithieu()
		{
			$news = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			return view(SITE_THEME . '.shop_gioithieu',
				array(
					'title' => trans('language.blog'),
					'description' => $this->configsGlobal['description'],
					'keyword' => $this->configsGlobal['keyword'],
					'newsGioiThieu' => $news,
				)
			);
		}
		
		public function gioithieuDetail($name, $id)
		{
			$news_currently = (new CmsNews)->getGioiThieuDetail($id);// CmsNews::find($id);
			$news = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			if ($news_currently) {
				$title = ($news_currently) ? $news_currently->title : trans('language.not_found');
				$localBusiness = Schema::WebSite()
					->name($title)
					->email('tangthuyanthuyan@gmail.com')
					->url(route('gioithieuDetail',['name' => Helper::strToUrl($title),'id' => $id]))
					->telephone('0948068327')
					->contactPoint(Schema::contactPoint()->areaServed($title));
				$scheama = $localBusiness->toArray();
				return view(SITE_THEME . '.shop_gioithieu_detail',
					array(
						'title' => $title,
						'news_currently' => $news_currently,
						'newsList' => $news,
						'scheama' => $scheama,
					)
				)->with('news',$news);;
			} else {
				return view(SITE_THEME . '.notfound',
					array(
						'title' => trans('language.not_found'),
						'description' => '',
						'msg' => "Không tìm thấy trang",
						'keyword' => $this->configsGlobal['keyword'],
					)
				);
			}
		}
		
		public function daiLy()
		{
			$news_currently = (new CmsNews)->getDaiLy();
			$newsList = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			// print_r($news_currently); die();
			if ($news_currently) {
				$title = ($news_currently) ? $news_currently->title : trans('language.not_found');
				$localBusiness = Schema::WebSite()
					->name($title)
					->email('tangthuyanthuyan@gmail.com')
					->url(route('daily'))
					->telephone('0948068327')
					->contactPoint(Schema::contactPoint()->areaServed($title));
				$scheama = $localBusiness->toArray();
				return view(SITE_THEME . '.shop_daily',
					array(
						'title' => $title,
						'scheama' => $scheama,
						'news_currently' => $news_currently,
						'description' => $this->configsGlobal['description'],
						'keyword' => $this->configsGlobal['keyword'],
						'newsList' => $newsList,
					)
				);
			} else {
				return view(SITE_THEME . '.notfound',
					array(
						'title' => trans('language.not_found'),
						'description' => '',
						'keyword' => $this->configsGlobal['keyword'],
						'msg' => "Không tìm thấy trang",
					)
				);
			}
		}
		public function chinhsach()
		{
			$news_currently = (new CmsNews)->getChinhSach();
			// print_r($news_currently); die();
			$news = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			if ($news_currently) {
				$title = ($news_currently) ? $news_currently->title : trans('language.not_found');
				$localBusiness = Schema::WebSite()
					->name($title)
					->email('tangthuyanthuyan@gmail.com')
					->url(route('chinhsach'))
					->telephone('0948068327')
					->contactPoint(Schema::contactPoint()->areaServed($title));
				$scheama = $localBusiness->toArray();
				return view(SITE_THEME . '.shop_chinhsach',
					array(
						'title' => $title,
						'scheama' => $scheama,
						'news_currently' => $news_currently,
						'description' => $this->configsGlobal['description'],
						'keyword' => $this->configsGlobal['keyword'],
						'news' => $news,
					)
				);
			} else {
				return view(SITE_THEME . '.notfound',
					array(
						'title' => trans('language.not_found'),
						'description' => '',
						'keyword' => $this->configsGlobal['keyword'],
						'msg' => "Không tìm thấy trang",
					)
				);
			}
		}
		
	}
