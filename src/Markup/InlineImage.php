<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;

/**
 * Inline image link.
 */
#[Annotations\XmlNode(
	name: 'image',
	namespace: Util\XmlNamespaces::FB2,
)]
class InlineImage extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * Inline image link.
	 * 
	 * @param ?string $type Link type.
	 * @param ?string $href Link target.
	 * @param ?string $alt Link alternate description.
	 */
	public function __construct(
		#[Annotations\XmlAttribute(
			namespace: Util\XmlNamespaces::XLINK,
		)]
		public ?string $type = null,

		#[Annotations\XmlAttribute(
			namespace: Util\XmlNamespaces::XLINK,
		)]
		public ?string $href = null,

		#[Annotations\XmlAttribute]
		public ?string $alt = null,
	) {}
}
