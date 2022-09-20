<?php

/**
 * Часть библиотеки для работы с сервисами Яндекса
 *
 * @package    Globosphere\Yandex\Disk
 * @version    2.0
 * @author     Arhitector
 * @license    MIT License
 * @copyright  2016 Arhitector
 * @link       https://github.com/jack-theripper
 */
namespace Globosphere\Yandex\Disk\Resource;

use Globosphere\Yandex\Client\Container\Collection as CollectionContainer;
use Globosphere\Yandex\Disk\Filter\MediaTypeTrait;
use Globosphere\Yandex\Disk\FilterTrait;

/**
 * Коллекция ресурсов.
 *
 * @package Globosphere\Yandex\Disk\Resource
 */
class Collection extends CollectionContainer
{
	use FilterTrait, MediaTypeTrait;

	/**
	 * @var    Callable
	 */
	protected $closure;

	/**
	 * @var array   какие параметры доступны для фильтра
	 */
	protected $parametersAllowed = ['limit', 'media_type', 'offset', 'preview_crop', 'preview_size', 'sort'];


	/**
	 *	Конструктор
	 */
	public function __construct(\Closure $data_closure = null)
	{
		$this->closure = $data_closure;
	}

	/**
	 *	Получает информацию
	 *
	 *	@return	array
	 */
	public function toArray(array $allowed = null)
	{
		if ( ! parent::toArray() || $this->isModified())
		{
			$this->setContents(call_user_func($this->closure, $this->getParameters($this->parametersAllowed)));
			$this->isModified = false;
		}

		return parent::toArray();
	}

}