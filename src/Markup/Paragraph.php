<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;
use Zekfad\Xml\XmlText;

/**
 * A basic paragraph, may include simple formatting inside.
 * 
 * Internally extends Style.
 */
#[Annotations\XmlNode(
	name: 'p',
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
class Paragraph extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * A basic paragraph, may include simple formatting inside.
	 * 
	 * @param ?string $language Element content's language.
	 * @param ?string $id Element ID.
	 * @param ?string $style Element style.
	 * @param (XmlText|Style|StyleNamed|Link|InlineImage)[] $children Children nodes.
	 */
	public function __construct(
		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $id,

		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $style,

		#[Annotations\XmlNode(
			name: [ 'strong', 'emphasis', 'style', 'a', 'strikethrough', 'sub', 'sup', 'code', 'image', ],
			type: [ XmlText::class, Style::class, StyleNamed::class, Link::class, InlineImage::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,
	) {}
}
