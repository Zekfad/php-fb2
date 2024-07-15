<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Main content of the book, multiple bodies are used for additional
 * information, like footnotes, that do not appear in the main book flow
 * (extended from this class). The first body is presented to the reader
 * by default, and content in the other bodies should be accessible
 * by hyperlinks.
 */
#[Annotations\XmlNode(
	name: 'body',
	namespace: Util\XmlNamespaces::FB2,
)]
class Body extends XmlElement {
	/**
	 * Main content of the book, multiple bodies are used for additional
	 * information, like footnotes, that do not appear in the main book flow
	 * (extended from this class). The first body is presented to the reader
	 * by default, and content in the other bodies should be accessible
	 * by hyperlinks.
	 * 
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
}
