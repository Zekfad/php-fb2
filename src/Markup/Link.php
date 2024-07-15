<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;
use Zekfad\Xml\XmlText;

/**
 * Generic hyperlinks. Cannot be nested. Footnotes should be implemented
 * by links referring to additional bodies in the same document.
 */
#[Annotations\XmlNode(
	name: 'a',
	namespace: Util\XmlNamespaces::FB2,
)]
#[Annotations\XmlElementMap([
	Util\XmlNamespaces::FB2_PREFIX . 'strong' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'emphasis' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'style' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'strikethrough' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'sub' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'sup' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'code' => StyleLink::class,
	Util\XmlNamespaces::FB2_PREFIX . 'image' => InlineImage::class,
])]
class Link extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * Generic hyperlinks. Cannot be nested. Footnotes should be implemented
	 * by links referring to additional bodies in the same document.
	 * 
	 * @param ?string $type Link FB2 type token.
	 * @param ?string $linkType Link XLINK type.
	 * @param string $href Link address.
	 * @param (XmlText|StyleLink|InlineImage)[] $children Child elements.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $type,
		
		#[Annotations\XmlAttribute(
			name: 'type',
			namespace: Util\XmlNamespaces::XLINK,
		)]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $linkType,

		#[Annotations\XmlAttribute(
			namespace: Util\XmlNamespaces::XLINK,
		)]
		public string $href,

		#[Annotations\XmlNode(
			name: [ 'strong', 'emphasis', 'style', 'strikethrough', 'sub', 'sup', 'code', 'image', ],
			type: [ XmlText::class, StyleLink::class, InlineImage::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,
	) {}
}
