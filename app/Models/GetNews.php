<?php namespace App\Models;	

use CodeIgniter\Model;
 	 	


class GetNews extends Model
{
	protected $table = 'news';
	protected $allowedFields = ['name','name_discription','discription','date','list','status','img']; //Insert into form trong sql

	 

	public function getNews($news = null)
	{
		if (!$news) {
			return $this->findAll();
		}

		return $this->asArray()
					->where(['news' => $news])
					->first(); 
	}
};

?>