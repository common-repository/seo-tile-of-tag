<?php

class ModelTagTile {

		public function getLinks($url) {
			global $wpdb;
			$fullurl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$fullurl = $this->checkUrlSlash($fullurl);
			$sql = sprintf("SELECT * FROM %stagtile_links_page WHERE page_type='%s' AND url LIKE '%s' OR url LIKE '%s'",$wpdb->prefix,'url','%'.$fullurl,'%'.$fullurl.'/');

			$results = $wpdb->get_results($sql);

			return $results;

		}

		public function checkUrlSlash($url)
		{
			if(strpos(substr($url,strlen($url)-2,strlen($url)-1),'/') !== false)
				return substr($url,1,strlen($url)-2);
					else return substr($url,1,strlen($url)-1);
		}
		
}?>
