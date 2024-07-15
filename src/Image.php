<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;

/**
 * An empty element with an image name as an attribute.
 */
#[Annotations\XmlNode(
	name: 'image',
	namespace: Util\XmlNamespaces::FB2,
)]
class Image extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * An empty element with an image name as an attribute.
	 * 
	 * @param string $linkType Link type.
	 * @param string $href Link target.
	 * @param ?string $alt Image alternative text.
	 * @param ?string $title Image title.
	 * @param ?string $id Image ID.
	 */
	public function __construct(
		#[Annotations\XmlAttribute(
			name: 'type',
			namespace: Util\XmlNamespaces::XLINK,
		)]
		public string $linkType,

		#[Annotations\XmlAttribute(
			namespace: Util\XmlNamespaces::XLINK,
		)]
		public string $href,

		#[Annotations\XmlAttribute]
		public ?string $alt = null,

		#[Annotations\XmlAttribute]
		public ?string $title = null,
	
		#[Annotations\XmlAttribute]
		public ?string $id = null,
	) {}
}
