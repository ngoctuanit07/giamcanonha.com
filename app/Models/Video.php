<?php
#app/Models/Subscribe.php
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	
	class Video extends Model
	{
		public $table = 'shop_video';
		
		public function getAllVideo($limit = null, $opt = null)
		{
			$query = (new Video)->where('status', 1);
			if (!(int)$limit) {
				return $query->get();
			} else {
				if ($opt == 'paginate') {
					return $query->paginate((int)$limit);
				} else {
					return $query->limit($limit)->get();
				}
			}
			
		}
		
		public function getVideoDetail($id)
		{
			$query = DB::table('shop_video as a')->where('a.id', $id)->first();
			return $query;
		}
		public function getBaiVietKhac($id)
		{
			$query = DB::table('shop_video as a')->where('a.id','<>', $id)->get();
			return $query;
		}
		
	}
