<?php      

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Torrent extends Entity
{

    public $id;
 		public $owner;
 		public $infohash;
 		public $numfiles;
 		public $size;
 		public $type;
 		public $name;
 		public $descr;
 		public $category;
 		public $poster;
 		public $magnet;
 		public $url;
 		public $file;
 		public $can_comment;
 		public $modded;
 		public $file_name;

    public function setCreatedAt(string $dateString)
    {
        $this->attributes['created_at'] = new Time($dateString, 'UTC');

        return $this;
    }

    public function getCreatedAt(string $format = 'Y-m-d H:i:s')
    {
        // Convert to CodeIgniter\I18n\Time object
        $this->attributes['created_at'] = $this->mutateDate($this->attributes['created_at']);

        $timezone = $this->timezone ?? app_timezone();

        $this->attributes['created_at']->setTimezone($timezone);

        return $this->attributes['created_at']->format($format);
    }
}