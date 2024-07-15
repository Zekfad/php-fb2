<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Book genre, with the optional match percentage.
 */
#[Annotations\XmlNode(
	name: 'genre',
	namespace: Util\XmlNamespaces::FB2,
)]
class Genre extends XmlElement {
	/**
	 * Book genre, with the optional match percentage.
	 * 
	 * @param int $match Optional match percentage.
	 * @param string $content Genre value.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(100)]
		public int $match,

		#[Annotations\XmlContent]
		public string $content,
	) {}
}
