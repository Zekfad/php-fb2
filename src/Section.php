<?php

namespace Zekfad\FB2;

use Sabre\Xml\ParseException;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * A basic block of a book, can contain more child sections or textual content.
 */
#[Annotations\XmlNode(
	name: 'section',
	namespace: Util\XmlNamespaces::FB2,
)]
#[Annotations\XmlElementMap([
	Util\XmlNamespaces::FB2_PREFIX . 'p' => Markup\Paragraph::class,
	Util\XmlNamespaces::FB2_PREFIX . 'image' => Image::class,
	Util\XmlNamespaces::FB2_PREFIX . 'poem' => Markup\Poem::class,
	Util\XmlNamespaces::FB2_PREFIX . 'cite' => Markup\Cite::class,
	Util\XmlNamespaces::FB2_PREFIX . 'subtitle' => Markup\Paragraph::class,
	Util\XmlNamespaces::FB2_PREFIX . 'table' => Markup\Table::class,
	Util\XmlNamespaces::FB2_PREFIX . 'empty-line' => Markup\EmptyLine::class,
])]
class Section extends XmlElement {
	/**
	 * A basic block of a book, can contain more child sections or textual content.
	 * 
	 * Must have either children sections or children elements.
	 * Children elements cannot start with an image.
	 * 
	 * @param ?string $id Element ID.
	 * @param ?string $language Element content's language.
	 * @param ?Title $title Section's title.
	 * @param Epigraph[] $epigraphs Epigraph(s) for this section.
	 * @param ?Image $image Image to be displayed at the top of this section.
	 * @param ?Annotation $annotation Annotation for this section, if any.
	 * @param Section[] $sections Child sections.
	 * @param (Markup\Paragraph|Image|Markup\Poem|Markup\EmptyLine)[] $children Children elements. Cannot start with an Image.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $id,

		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlNode('title')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Title $title,

		#[Annotations\XmlNode(
			name: 'epigraph',
			type: Epigraph::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL
		)]
		public array $epigraphs,

		#[Annotations\XmlNode('image')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Image $image,

		#[Annotations\XmlNode('annotation')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Annotation $annotation,

		#[Annotations\XmlNode(
			name: 'section',
			type: Section::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL
		)]
		public array $sections,

		// #[Annotations\XmlNode(
		// 	name: [ 'p', 'poem', 'subtitle', 'cite', 'empty-line', 'table', ],
		// 	type: [ Markup\Paragraph::class, Markup\Poem::class, Markup\EmptyLine::class, ],
		// 	repeating: Annotations\XmlNode::REPEATING,
		// )]
		// public array $firstChild,
		
		#[Annotations\XmlNode(
			name: [ 'p', 'image', 'poem', 'subtitle', 'cite', 'empty-line', 'table', ],
			type: [ Markup\Paragraph::class, Image::class, Markup\Poem::class, Markup\Cite::class, Markup\Table::class, Markup\EmptyLine::class, ],
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $children,
	) {}

	/**
	 * Validates instance of a section.
	 * @template T of Section
	 * @param T $section 
	 * @return T 
	 */
	protected static function xmlValidateInstance(Section $section): static {
		if (empty($section->sections)) {
			if (empty($section->children))
				throw new \Sabre\Xml\ParseException('Section must have at least a single child or subsection.');
			elseif ($section->children[0] instanceof Image)
				throw new \Sabre\Xml\ParseException('Section cannot start with an Image.');
		} elseif (!empty($section->children))
			throw new \Sabre\Xml\ParseException('Section cannot have both subsections and children.');
		return $section;
	}

	public function xmlSerialize(\Sabre\Xml\Writer $writer): void {
		\Zekfad\XML\XmlProcessor::xmlSerialize($writer, static::xmlValidateInstance($this));
	}

	public static function xmlDeserialize(\Sabre\Xml\Reader $reader): static {
		return static::xmlValidateInstance(\Zekfad\XML\XmlProcessor::xmlDeserialize($reader, static::class));
	}
}
