<?php
#app/Modules/Cms/Models/CmsNews.php
	namespace App\Models;
	
	use App\Models\Language;
	use App\Models\CmsNewsDescription;
	use Helper;
	use App\Models\Traits\Cacheable;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Support\Facades\DB;
	
	class CmsNews extends Model
	{
		use Cacheable;
		protected $cacheTime = 10;
		public $table = 'cms_news';
		protected $appends = [
			'title',
			'keyword',
			'description',
			'content',
		];
		public $lang_id = 1;
		
		public function __construct()
		{
			parent::__construct();
			$lang = Language::getArrayLanguages();
			$this->lang_id = $lang[app()->getLocale()];
		}
		
		public function descriptions()
		{
			return $this->hasMany(CmsNewsDescription::class, 'cms_news_id', 'id');
		}
		
		public function getGioiThieu($limit = null, $opt = null)
		{
			$query = (new CmsNews)->where('type', "matxi")->where('status', 1)->sort();
			if (!(int)$limit) {
				return $query->paginate(8);
			} else
				if ($opt == 'paginate') {
					return $query->paginate((int)$limit);
				} else {
					return $query->limit($limit)->get();
				}
			
		}
		
		public function getTintuc($limit = null, $opt = null)
		{
			$query = (new CmsNews)->where('type', "tintuc")->where('status', 1)->sort();
			if (!(int)$limit) {
				return $query->paginate(8);
			} else
				if ($opt == 'paginate') {
					return $query->paginate((int)$limit);
				} else {
					return $query->limit($limit)->get();
				}
			
		}
		
		/**
		 * [getThumb description]
		 * @return [type] [description]
		 */
		public function getThumb()
		{
			if ($this->image) {
				
				if (!file_exists(PATH_FILE . '/thumb/' . $this->image)) {
					return $this->getImage();
				} else {
					if (!file_exists(PATH_FILE . '/thumb/' . $this->image)) {
					} else {
						return PATH_FILE . '/thumb/' . $this->image;
					}
				}
			} else {
				return 'images/no-image.jpg';
			}
			
		}
		
		public function getDaiLy()
		{
			$query = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('b.type', 'daily')->first();
			return $query;
		}
		
		public function getGioiThieuDetail($id)
		{
			$query = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('b.id', $id)->where('b.type', 'matxi')->first();
			return $query;
		}
		public function getTintucDetail($id)
		{
			$query = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('b.id', $id)->where('b.type', 'tintuc')->first();
			return $query;
		}
		public function getChinhSach()
		{
			$query = DB::table('cms_news_description as a')->join('cms_news as b', 'a.cms_news_id', '=', 'b.id')->where('b.type', 'chinhsach')->first();
			return $query;
		}
		
		/**
		 * [getImage description]
		 * @return [type] [description]
		 */
		public function getImage()
		{
			if ($this->image) {
				
				if (!file_exists(PATH_FILE . '/' . $this->image)) {
					return 'images/no-image.jpg';
				} else {
					return PATH_FILE . '/' . $this->image;
				}
			} else {
				return 'images/no-image.jpg';
			}
			
		}
		
		/**
		 * [getUrl description]
		 * @return [type] [description]
		 */
		public function getGioiThieuUrl()
		{
			return route('gioithieuDetail', ['name' => Helper::strToUrl($this->title), 'id' => $this->id]);
		}
		
		public function getTintucUrl()
		{
			return route('tintucDetail', ['name' => Helper::strToUrl($this->title), 'id' => $this->id]);
		}
		
		//Fields language
		public function getTitle()
		{
			return $this->processDescriptions()['title'] ?? '';
		}
		
		public function getKeyword()
		{
			return $this->processDescriptions()['keyword'] ?? '';
		}
		
		public function getDescription()
		{
			return $this->processDescriptions()['description'] ?? '';
		}
		
		public function getContent()
		{
			return $this->processDescriptions()['content'] ?? '';
		}

//Attributes
		public function getTitleAttribute()
		{
			return $this->getTitle();
		}
		
		public function getKeywordAttribute()
		{
			return $this->getKeyword();
			
		}
		
		public function getDescriptionAttribute()
		{
			return $this->getDescription();
			
		}
		
		public function getContentAttribute()
		{
			return $this->getContent();
			
		}

//Scort
		public function scopeSort($query, $column = null)
		{
			$column = $column ?? 'sort';
			return $query->orderBy($column, 'asc')->orderBy('id', 'desc');
		}
		
		public function processDescriptions()
		{
			return $this->descriptions->keyBy('lang_id')[$this->lang_id];
		}

//=========================
		
		public function uninstallExtension()
		{
			if (Schema::hasTable($this->table)) {
				Schema::drop($this->table);
			}
		}
		
		public function installExtension()
		{
			$return = ['error' => 0, 'msg' => 'Install modules success'];
			if (!Schema::hasTable($this->table)) {
				try {
					Schema::create($this->table, function (Blueprint $table) {
						$table->increments('id');
						$table->string('image', 200)->nullable();
						$table->tinyInteger('sort')->default(0);
						$table->tinyInteger('status')->default(0);
						$table->timestamp('created_at')->nullable();
						$table->timestamp('updated_at')->nullable();
					});
				} catch (\Exception $e) {
					$return = ['error' => 1, 'msg' => $e->getMessage()];
				}
			} else {
				$return = ['error' => 1, 'msg' => 'Table ' . $this->table . ' exist!'];
			}
			return $return;
		}
		
	}
