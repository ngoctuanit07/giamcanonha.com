<?php
	
	namespace App\Http\Controllers;
	
	use App\Http\Controllers\Controller;
	use App\Models\Subscribe;
	use Illuminate\Http\Request;
	use App\Models\CmsNews;
	use App\Models\CmsNewsDescription;
	use Mail;
	use View;
	
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
		
		/* public function tintuc(){
			 $news = (new CmsNews)->getItemsNews($limit = 12, $opt = 'paginate');
			 //print_r($news); die('33');
			 return view(SITE_THEME  . '.cms_news',
				 array(
					 'title'       => trans('language.blog'),
					 'description' => (new CmsNews)->getMetaDescription(),
					 'keyword'     => (new CmsNews)->getKeyword(),
					 'news'        => $news,
				 )
			 );
		 }*/
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
			//print_r($news_currently); die();
			// $keyword = (new CmsNews)->getKeyWordById($id)->keyword;
			
			//print_r($keyword->keyword); die();
			if ($news_currently) {
				$title = ($news_currently) ? $news_currently->title : trans('language.not_found');
				return view(SITE_THEME . '.shop_tintuc_detail',
					array(
						'title' => $title,
						'news_currently' => $news_currently,
						'news' => $news,
						'newsGioithieu' => $newsGioiThieu,
						//'description'    => (new CmsNews)->getKeyWordById($id)->metadescription ? (new CmsNews)->getKeyWordById($id)->metadescription : "",
						//'keyword'        => (new CmsNews)->getKeyWordById($id)->keyword ? (new CmsNews)->getKeyWordById($id)->keyword : "",
						//'blogs'          => (new CmsNews)->getItemsNews($limit = 4),
						//'og_image'       => url(SITE_PATH_FILE . '/' . $news_currently->image),
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
			//print_r($news_currently); die();
			// $keyword = (new CmsNews)->getKeyWordById($id)->keyword;
			
			//print_r($keyword->keyword); die();
			if ($news_currently) {
				$title = ($news_currently) ? $news_currently->title : trans('language.not_found');
				return view(SITE_THEME . '.shop_gioithieu_detail',
					array(
						'title' => $title,
						'news_currently' => $news_currently,
						'newsList' => $news,
						//'description'    => (new CmsNews)->getKeyWordById($id)->metadescription ? (new CmsNews)->getKeyWordById($id)->metadescription : "",
						//'keyword'        => (new CmsNews)->getKeyWordById($id)->keyword ? (new CmsNews)->getKeyWordById($id)->keyword : "",
						//'blogs'          => (new CmsNews)->getItemsNews($limit = 4),
						//'og_image'       => url(SITE_PATH_FILE . '/' . $news_currently->image),
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
				return view(SITE_THEME . '.shop_daily',
					array(
						'title' => $title,
						'news_currently' => $news_currently,
						'description' => $this->configsGlobal['description'],
						'keyword' => $this->configsGlobal['keyword'],
						'newsList' => $newsList,
						//  'blogs'          => (new CmsNews)->getItemsNews($limit = 4),
						//'og_image'       => url(SITE_PATH_FILE . '/' . $news_currently->image),
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
				return view(SITE_THEME . '.shop_chinhsach',
					array(
						'title' => $title,
						'news_currently' => $news_currently,
						'description' => $this->configsGlobal['description'],
						'keyword' => $this->configsGlobal['keyword'],
						'news' => $news,
						//  'blogs'          => (new CmsNews)->getItemsNews($limit = 4),
						//'og_image'       => url(SITE_PATH_FILE . '/' . $news_currently->image),
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
