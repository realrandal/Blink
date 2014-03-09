<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.BBCode
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

// [map type=roadmap zoom=10 control=0]London, UK[/map]

// Display map location.

static $id;
$params = $this->params;

// Load JavaScript API.
if (!isset($id))
{
	$this->addScript('http://maps.google.com/maps/api/js?sensor=true');
	$id = 0;
}

$mapid = 'kgooglemap'.++$id;
$map_type = isset($params['type']) ? strtoupper($params['type']) : 'ROADMAP';
$map_typeId = array('HYBRID', 'ROADMAP', 'SATELLITE', 'TERRAIN');
if (!in_array($map_type, $map_typeId)) $map_type = 'ROADMAP';
$map_zoom = isset($params['zoom']) ? (int) $params['zoom'] : 10;
$map_control = isset($params['control']) ? (int) $params['control'] : 0;
$content = json_encode($this->content);
$contentString = JText::_('COM_KUNENA_GOOGLE_MAP_NO_GEOCODE', true);

$this->addScriptDeclaration("
// <![CDATA[
	var geocoder;
	var {$mapid};

	window.addEvent('domready', function() {
		geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(37.333586,-121.894684);
	var myOptions = {
		zoom: {$map_zoom},
		disableDefaultUI: {$map_control},
		center: latlng,
		mapTypeId: google.maps.MapTypeId.{$map_type}
	};
	$mapid = new google.maps.Map(document.id('{$mapid}'), myOptions);

	var address = {$content};
	if (geocoder) {
		geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			{$mapid}.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				position: results[0].geometry.location,
		        map: {$mapid}
			});
		} else {
			var contentString = '<p><strong>{$contentString} <i>{$content}</i></strong></p>';
			var infowindow{$mapid} = new google.maps.InfoWindow({ content: contentString });
				infowindow{$mapid}.open({$mapid});
		}
		});
	}
	});
// ]]>"
);
?>

<div id="<?php echo $mapid; ?>" class="kgooglemap"><?php echo JText::_('COM_KUNENA_GOOGLE_MAP_NOT_VISIBLE'); ?></div>
