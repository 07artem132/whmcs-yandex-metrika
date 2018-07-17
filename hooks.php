<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.07.2018
 * Time: 16:27
 */

use  WHMCS\Module\Addon\YandexMetrika\ConfigController;

add_hook( 'ClientAreaFooterOutput', 1, function ( $vars ) {
	$Config = new ConfigController();

	$return = '<!-- Yandex.Metrika counter -->';
	$return .= '<script type="text/javascript" >';
	$return .= '(function (d, w, c) {';
	$return .= '(w[c] = w[c] || []).push(function() {';
	$return .= 'try {';
	$return .= 'w.yaCounter' . $Config['id'] . ' = new Ya.Metrika({';
	$return .= 'id:' . $Config['id'] . ',';
	$return .= 'clickmap:true,';
	$return .= 'trackLinks:true,';
	$return .= 'accurateTrackBounce:true,';
	$return .= 'webvisor:true,';
	$return .= 'trackHash:true';
	if ( $Config['NotAllowIndexing'] === 'on' ) {
		$return .= '                ,ut:"noindex"';
	}
	$return .= '});';
	$return .= '} catch(e) { }';
	$return .= '});';
	$return .= 'var n = d.getElementsByTagName("script")[0],';
	$return .= 's = d.createElement("script"),';
	$return .= 'f = function () { n.parentNode.insertBefore(s, n); };';
	$return .= 's.type = "text/javascript";';
	$return .= 's.async = true;';

	if ( $Config['Alternative cdn'] === 'on' ) {
		$return .= 's.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js";';
	} else {
		$return .= 's.src = "https://mc.yandex.ru/metrika/watch.js";';
	}

	$return .= 'if (w.opera == "[object Opera]") {';
	$return .= 'd.addEventListener("DOMContentLoaded", f, false);';
	$return .= '} else { f(); }';
	$return .= '})(document, window, "yandex_metrika_callbacks");';
	$return .= '</script>';
	$return .= '<noscript><div><img src="https://mc.yandex.ru/watch/43216909?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>';
	$return .= '<!-- /Yandex.Metrika counter -->';

	return $return;
} );