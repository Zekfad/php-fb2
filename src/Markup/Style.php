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
	name: [ 'strong', 'emphasis', 'strikethrough', 'sub', 'sup', 'code', ],
	namespace: Util\XmlNamespaces::FB2,
)]
#[Annotations\XmlElementMap([
	Util\XmlNamespaces::FB2_PREFIX . 'strong' => Style::class,
	Util\XmlNamespaces::FB2_PREFIX . 'emphasis' => Style::class,
	Util\XmlNamespaces::FB2_PREFIX . 'style' => StyleNamed::class,
	Util\XmlNamespaces::FB2_PREFIX . 'a' => Link::class,
	Util\XmlNamespaces::FB2_PREFIX . 'strikethrough' => Style::class,
	Util\XmlNamespaces::FB2_PREFIX . 'sub' => Style::class,
	Util\XmlNamespaces::FB2_PREFIX . 'sup' => Style::class,
	Util\XmlNamespaces::FB2_PREFIX . 'code' => Style::class,
	Util\XmlNamespaces::FB2_PREFIX . 'image' => InlineImage::class,
])]
class Style extends XmlElement implements XmlNamedElement {
	/**
	 * Markup.
	 * 
	 * @param ?string $language Element content's language.
	 * @param (XmlText|Style|StyleNamed|Link|InlineImage)[] $children Children nodes.
	 * @param StyleType $type Style type.
	 */
	public function __construct(
		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlNode(
			name: [ 'strong', 'emphasis', 'style', 'a', 'strikethrough', 'sub', 'sup', 'code', 'image', ],
			type: [ XmlText::class, Style::class, StyleNamed::class, Link::class, InlineImage::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children = [],

		public StyleType $styleType = StyleType::Strong,
	) {}

	public function xmlGetElementName(): string {
		return $this->styleType->value;
	}

	public function xmlSetElementName(string $name): void {
		$this->styleType = StyleType::from($name);
	}
}
