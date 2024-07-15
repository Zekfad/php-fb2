<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * A title, used in sections, poems and body elements.
 */
#[Annotations\XmlNode(
	name: 'title',
	namespace: Util\XmlNamespaces::FB2,
)]
#[Annotations\XmlElementMap([
	Util\XmlNamespaces::FB2_PREFIX . 'p' => Markup\Paragraph::class,
	Util\XmlNamespaces::FB2_PREFIX . 'empty-line' => Markup\EmptyLine::class,
])]
class Title extends XmlElement {
	/**
	 * A title, used in sections, poems and body elements.
	 * 
	 * @param ?string $language Element content's language.
	 * @param (Markup\Paragraph|Markup\EmptyLine)[] $children Children nodes.
	 */
	public function __construct(
		#[Annotations\XmlNode('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlNode(
			name: [ 'p', 'empty-line', ],
			type: [ Markup\Paragraph::class, Markup\EmptyLine::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,
	) {}
}
