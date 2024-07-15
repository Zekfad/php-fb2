<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Body for footnotes, content is mostly similar to base type and
 * may (!) be rendered in the pure environment "as is".
 * Advanced reader should treat section[2]/section as endnotes,
 * all other stuff as footnotes.
 */
#[Annotations\XmlNode(
	name: 'body',
	namespace: Util\XmlNamespaces::FB2,
)]
class NotesBody extends XmlElement {
	/**
	 * Body for footnotes, content is mostly similar to base type and
	 * may (!) be rendered in the pure environment "as is".
	 * Advanced reader should treat section[2]/section as endnotes,
	 * all other stuff as footnotes.
	 * 
	 * @param ?string $name Optional name. MUST be `notes`.
	 * @param ?string $language Element content's language.
	 * @param ?Image $image Image to be displayed at the top of this section.
	 * @param ?Title $title A fancy title for the entire book, should be used
	 *                      if the simple text version in <description>
	 *                      is not adequate, e.g. the book title has multiple
	 *                      paragraphs and/or character styles.
	 * @param Epigraph[] $epigraphs Epigraph(s) for the entire book, if any.
	 * @param Section[] $sections Book sections.
	 */
	public function __construct(
		#[Annotations\XmlNode('name')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $name,

		#[Annotations\XmlNode('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,

		#[Annotations\XmlNode('image')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Image $image,

		#[Annotations\XmlNode('title')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Title $title,

		#[Annotations\XmlNode(
			name: 'epigraph',
			type: Epigraph::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL
		)]
		public array $epigraphs,

		#[Annotations\XmlNode(
			name: 'section',
			type: Section::class,
			repeating: Annotations\XmlNode::REPEATING
		)]
		public array $sections,
	) {}

	/**
	 * Validates instance of a section.
	 * @template T of NotesBody
	 * @param T $section 
	 * @return T 
	 */
	protected static function xmlValidateInstance(NotesBody $notesBody): static {
		if ($notesBody->name !== null && $notesBody->name !== 'notes')
			throw new \Sabre\Xml\ParseException('NotesBody must have a name of "notes" or none at all.');
		return $notesBody;
	}

	public function xmlSerialize(\Sabre\Xml\Writer $writer): void {
		\Zekfad\XML\XmlProcessor::xmlSerialize($writer, static::xmlValidateInstance($this));
	}

	public static function xmlDeserialize(\Sabre\Xml\Reader $reader): static {
		return static::xmlValidateInstance(\Zekfad\XML\XmlProcessor::xmlDeserialize($reader, static::class));
	}
}
