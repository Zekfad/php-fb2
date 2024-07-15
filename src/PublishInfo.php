<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Information about some paper/other published document,
 * that was used as a source of this xml document.
 */
#[Annotations\XmlNode(
	name: 'publish-info',
	namespace: Util\XmlNamespaces::FB2,
)]
class PublishInfo extends XmlElement {
	/**
	 * Information about some paper/other published document,
	 * that was used as a source of this xml document.
	 * 
	 * @param ?TextField $bookName Original (paper) book name.
	 * @param ?TextField $publisher Original (paper) book publisher.
	 * @param ?TextField $city City where the original (paper) book was published.
	 * @param ?string $year Year of the original (paper) publication.
	 * @param ?TextField $isbn Original (paper) ISBN.
	 * @param Sequence[] $sequences Original (paper) Sequences.
	 */
	public function __construct(
		#[Annotations\XmlNode('book-name')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $bookName,

		#[Annotations\XmlNode('publisher')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $publisher,

		#[Annotations\XmlNode('city')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $city,

		#[Annotations\XmlNode('year')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $year,

		#[Annotations\XmlNode('isbn')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $isbn,

		#[Annotations\XmlNode(
			name: 'sequence',
			type: Sequence::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $sequences,
	) {}
}
