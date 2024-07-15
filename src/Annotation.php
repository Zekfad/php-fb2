<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * A cut-down version of <section> used in annotations.
 */
#[Annotations\XmlNode(
	name: 'annotation',
	namespace: Util\XmlNamespaces::FB2,
)]
#[Annotations\XmlElementMap([
	Util\XmlNamespaces::FB2_PREFIX . 'p' => Markup\Paragraph::class,
	Util\XmlNamespaces::FB2_PREFIX . 'poem' => Markup\Poem::class,
	Util\XmlNamespaces::FB2_PREFIX . 'cite' => Markup\Cite::class,
	Util\XmlNamespaces::FB2_PREFIX . 'subtitle' => Markup\Paragraph::class,
	Util\XmlNamespaces::FB2_PREFIX . 'table' => Markup\Table::class,
	Util\XmlNamespaces::FB2_PREFIX . 'empty-line' => Markup\EmptyLine::class,
])]
class Annotation extends XmlElement {
	/**
	 * A cut-down version of <section> used in annotations.
	 * 
	 * @param ?string $id Element ID.
	 * @param ?string $language Element content's language.
	 * @param (Markup\Paragraph)[] $children Children elements.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $id,
		
		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlNode(
			name: [ 'p', 'poem', 'cite', 'subtitle', 'table', 'empty-line', ],
			type: [ Markup\Paragraph::class, Markup\Poem::class, Markup\Cite::class, Markup\Table::class, Markup\EmptyLine::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,
	) {}
}
