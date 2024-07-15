<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * An epigraph.
 */
#[Annotations\XmlNode(
	name: 'epigraph',
	namespace: Util\XmlNamespaces::FB2,
)]
#[Annotations\XmlElementMap([
	Util\XmlNamespaces::FB2_PREFIX . 'p' => Markup\Paragraph::class,
	Util\XmlNamespaces::FB2_PREFIX . 'poem' => Markup\Poem::class,
	Util\XmlNamespaces::FB2_PREFIX . 'cite' => Markup\Cite::class,
	Util\XmlNamespaces::FB2_PREFIX . 'empty-line' => Markup\EmptyLine::class,
])]
class Epigraph extends XmlElement {
	/**
	 * An epigraph.
	 * 
	 * @param ?string $id Element ID.
	 * @param ?string $language Element content's language.
	 * @param (Markup\Paragraph|Markup\Poem|Markup\EmptyLine)[] $children Children elements.
	 * @param Markup\Paragraph[] $textAuthors Text authors.
	 * @return void 
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $id,

		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlNode(
			name: [ 'p', 'poem', 'cite', 'empty-line', ],
			type: [ Markup\Paragraph::class, Markup\Poem::class, Markup\Cite::class, Markup\EmptyLine::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,
		
		#[Annotations\XmlNode(
			name: 'text-author',
			type: Markup\Paragraph::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $textAuthors,
	) {}
}
