<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Any other information about the book/document that didn't fit in the above groups.
 */
#[Annotations\XmlNode(
	name: 'custom-info',
	namespace: Util\XmlNamespaces::FB2,
)]
class CustomInfo extends XmlElement {
	/**
	 * Any other information about the book/document that didn't fit in the above groups.
	 * 
	 * @param string $infoType Custom info type.
	 * @param ?string $language Custom info content's language.
	 * @param string $content Text content.
	 */
	public function __construct(
		#[Annotations\XmlAttribute('info-type')]
		public string $infoType,

		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlContent]
		public string $content,
	) {}
}
