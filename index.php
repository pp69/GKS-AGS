<?php
/* =========================== CONFIG =========================== */
$feed_url = '';

//GET = ANIME
$cats['ANIME']   	= array("Anime");

//GET = CONCERT
$cats['CONCERT'] 	= array("Concerts");

//GET = DIVERS
$cats['DIVERS'] 	= array("Divers");

//GET = FILMS
$cats['FILMS'] 		= array("Full BluRay", "HD 1080p", "HD 720p", "DVDR", "DVDRip/BDRip", "DVDRip/BDRip VOSTFR");

//GET = SPORT
$cats['SPORT'] 		= array("Sport");

//GET = TV
$cats['TV'] 		= array("TV HD VF", "TV HD VOSTFR", "TV PACK", "TV VF", "TV VO", "TV VOSTFR", "DVDR Series", "Emissions TV");

//GET = JEUX
$cats['JEUX']		= array("Wii", "Xbox 360", "Nintendo DS", "PC Games", "PSP", "PSX/PS2/PS3");

//GET = EBOOKS
$cats['EBOOKS'] 	= array("eBooks");

//GET = APPS
$cats['APPS'] 		= array("Windows", "Mac");

//GET = FLAC
$cats['FLAC'] 		= array("Flac");

//GET = DOCS
$cats['DOCS'] 		= array("Docs", "Docs HD");
/* =========================== CONFIG =========================== */


// ---------------------
// DO NOT MODIFY BELOW 
// ---------------------
$rawFeed = file_get_contents($feed_url);
$xml = new SimpleXmlElement($rawFeed);

$get_cat = key($_GET);
if(!$_GET || !in_array($get_cat, array_keys($cats)))
{
	$xml->channel->title = $xml->channel->title . ' ERROR';
	$xml->channel->image->title = $xml->channel->image->title . ' ERROR';
	unset($xml->channel->item);
	foreach ($cats as $key => $value)
	{
		$item = $xml->channel->addChild('item');
		$valid_url = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) .'?'. $key; 
		$item->addChild('title', 'ERREUR : Ajoutez l\'URL suivante : ' . $valid_url);
		$item->addChild('link', $valid_url);
	}
	
	echo $xml->asXML();
}
else
{
	$array_cats = $cats[$get_cat];


	for($i = 0; $i < count($array_cats); $i++ )
	{
		$array_cats[$i] = "Categorie : " . $array_cats[$i];
	}

	$xml->channel->title = $xml->channel->title . ' ' . $get_cat;
	$xml->channel->image->title = $xml->channel->image->title . ' ' . $get_cat;

	$total = count($xml->channel->item);
	for($i = 0; $i < $total; $i++ )
	{
		foreach ($xml->channel->item as $item)
		{
			if(!in_array($item->description, $array_cats))
			{
				$dom=dom_import_simplexml($item);
				$dom->parentNode->removeChild($dom);
			}
		}
	}

	echo $xml->asXML();
}
?>
