<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Text field element with optional language.
 */
#[Annotations\XmlNode]
class TextField extends XmlElement {
	/**
	 * Text field element with optional language.
	 * 
	 * @param ?string $language Element content's language.
	 * @param string $content Text content.
	 */
	public function __construct(
		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlContent]
		public string $content,
	) {}
}
