<?php
	
	namespace App\Http\Controllers;
	
	use App\Http\Controllers\Controller;
	use App\Models\Subscribe;
	use App\Models\CmsNews;
	use Illuminate\Http\Request;
	use App\Models\Video;
	use Mail;
	use View;
	
	class VideoController extends Controller
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
		public function video()
		{
			$videos = (new Video)->getAllVideo();
			//$newsList = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			return view(SITE_THEME . '.shop_video',
				array(
					'title' => trans('Video'),
					'description' => $this->configsGlobal['description'],
					'keyword' => $this->configsGlobal['keyword'],
					'videos' => $videos,
					'msg' => "Không tìm thấy trang",
				)
			);
		}
		
		public function videoDetail($name, $id)
		{
			$videoDetail = (new Video)->getVideoDetail($id);// CmsNews::find($id);
			$videoKhac = (new Video)->getBaiVietKhac($id);// CmsNews::find($id);
			$newsGioiThieu = (new CmsNews)->getGioiThieu($limit = 4, $opt = 'paginate');
			if ($videoDetail) {
				$title = ($videoDetail) ? $videoDetail->title : trans('language.not_found');
				return view(SITE_THEME . '.shop_video_detail',
					array(
						'title' => $title,
						'news_currently' => $videoDetail,
						'videoKhac' => $videoKhac,
						'newsGioithieu' => $newsGioiThieu,
						//'description'    => (new CmsNews)->getKeyWordById($id)->metadescription ? (new CmsNews)->getKeyWordById($id)->metadescription : "",
						//'keyword'        => (new CmsNews)->getKeyWordById($id)->keyword ? (new CmsNews)->getKeyWordById($id)->keyword : "",
						//'blogs'          => (new CmsNews)->getItemsNews($limit = 4),
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
