<?php

// Hinweis: allow_url_fopen muss auf on gesetzt sein
$allowurlfopen = ini_get('allow_url_fopen');
if ($allowurlfopen != 1) {
	echo "In der php.ini ist allow_url_fopen ausgeschaltet. Mit dieser Einstellung funktioniert das Einlesen des Feeds leider nicht.";
	exit;
}

date_default_timezone_set("Europe/Berlin");

libxml_use_internal_errors(true);

function rss2htmlPlan($url,$anz,$length,$target) {
	$n=1;
	if ($target == 1) {$target = ' target="_blank"';} else {$target = '';} 
	$output = '<ul>';

	if ($rss = @simplexml_load_file($url)) {
		foreach($rss->channel->item as $item) {
			$title = str_replace ("& ","&amp; ",$item->title);
			$wort = explode(" ", $title);  //erstes Wort 
			if (!isset($wort[1])) { $wort[1] = null; }
		  
			$output .= '<class="item_link">';
			$output .= '<h4>'.$item->title.'</h4> ';
			//$output .= '<h3><a href = "'.$item->link.'" '.$target.'>'.$item->title.'</a></h3> ';

			if (isset($item->pubDate)) {
				$output .= '<span class="it_date">';
				$output .= date("d.m.Y H:i",strtotime($item->pubDate)).' Uhr</span><br>';
			} 
		
			$string = $item->description;

			
			/*if($length && strlen($string) > $length) {
				$string = substr($string,0,$length)."...";
				$string_ende = strrchr($string, " ");
				$string = str_replace($string_ende," ... ", $string);
			}*/
			
			$output .= $string;
			//$output .= ' <span class="weiter"><a href="'.$item->link.'" '.$target.'>weiterlesen:&nbsp;"'.$wort[0].'&nbsp;'.$wort[1].'&nbsp;..."</a></span>';
			//$output .= '</li>';

			if($n>=$anz){break;}
			$n++;
		}
		return $output.'</ul>';
	  
	} elseif ($rss === false) {
		echo "Laden des XML fehlgeschlagen\n";
		foreach(libxml_get_errors() as $error) {
			echo "\t", $error->message;
		}
	} else {return "Fehler beim Einlesen der Datei $url";}
}
?>


