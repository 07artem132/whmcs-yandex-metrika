<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.07.2018
 * Time: 16:27
 */


function YandexMetrika_config() {
	$configarray = [
		"name"        => "Интеграция c яндекс метрикой",
		"description" => "Данное дополнение позволяет интегрировать яндекс метрику с whmcs",
		"version"     => "1",
		"author"      => "service-voice",
		"fields"      => [
			'Note'             => [
				'Description'  => 'Данный модуль не имеет административного вывода',
				'FriendlyName' => 'Заметка:'
			],
			'id'      => array(
				'Type'         => 'text',
				'Size'         => '30',
				'FriendlyName' => 'Номер счетчика'
			),
			"NotAllowIndexing" => [
				"FriendlyName" => "Не индексировать",
				"Type"         => "yesno",
				'Default'      => 'no',
				"Description"  => "Запрет автоматической отправки страниц сайта, на которых установлен счетчик Метрики, на индексацию Яндекс.Поиску.",
			],
			"Alternative cdn"  => [
				"FriendlyName" => "Альтернативный CDN  ",
				"Type"         => "yesno",
				'Default'      => 'no',
				"Description"  => "Позволяет корректно учитывать посещения из регионов, в которых ограничен доступ к ресурсам Яндекса. Использование этой опции может снизить скорость загрузки кода счётчика.",
			],
		]
	];

	return $configarray;
}