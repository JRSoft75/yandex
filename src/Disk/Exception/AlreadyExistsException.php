<?php

/**
 * Часть библиотеки для работы с сервисами Яндекса
 *
 * @package    Globosphere\Yandex\Disk\Exception
 * @version    2.0
 * @author     Arhitector
 * @license    MIT License
 * @copyright  2016 Arhitector
 * @link       https://github.com/jack-theripper
 */
namespace Globosphere\Yandex\Disk\Exception;

use Http\Client\Exception;

/**
 * Исключение ресурс существует
 *
 * @package    Globosphere\Yandex\Disk\Exception
 */
class AlreadyExistsException extends \RuntimeException implements Exception
{
	
}