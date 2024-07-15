<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlText;

/**
 * Markup.
 */
#[Annotations\XmlNode(
	name: [ 'strong', 'emphasis', 'style', 'strikethrough', 'sub', 'sup', 'code', ],
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
class StyleLink extends XmlElement implements XmlNamedElement {
	/**
	 * Markup.
	 * 
	 * @param (XmlText|StyleLink|InlineImage)[] $children Children nodes.
	 * @param StyleType $type Style type.
	 */
	public function __construct(
		#[Annotations\XmlNode(
			name: [ 'strong', 'emphasis', 'style', 'strikethrough', 'sub', 'sup', 'code', 'image', ],
			type: [ XmlText::class, StyleLink::class, InlineImage::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,

		public StyleType $styleType = StyleType::Strong,
	) {}

	public function xmlGetElementName(): string {
		return $this->styleType->value;
	}

	public function xmlSetElementName(string $name): void {
		$this->styleType = StyleType::from($name);
	}
}
