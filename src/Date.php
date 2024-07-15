<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * A human readable date, maybe not exact,
 * with an optional computer readable variant.
 */
#[Annotations\XmlNode(
	name: 'date',
	namespace: Util\XmlNamespaces::FB2,
)]
class Date extends XmlElement {
	/**
	 * A human readable date, maybe not exact,
	 * with an optional computer readable variant.
	 * 
	 * @param ?string $value Computer readable date in format of YYYY-MM-DD.
	 * @param ?string $language Element content's language.
	 * @param string $content A human readable date.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $value,

		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlContent]
		public string $content,
	) {}
}
