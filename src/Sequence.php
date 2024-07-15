<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Book sequences.
 */
#[Annotations\XmlNode(
	name: 'sequence',
	namespace: Util\XmlNamespaces::FB2,
)]
class Sequence extends XmlElement {
	/**
	 * Book sequences.
	 * 
	 * @param ?string $name Sequence name.
	 * @param ?string $number Number in sequence.
	 * @param ?string $language Element content's language.
	 * @param Sequence[] $sequences Sequences.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		public string $name,
		
		#[Annotations\XmlAttribute]
		#[Annotations\XmlDefaultValue(null)]
		public ?int $number,
		
		#[Annotations\XmlAttribute('lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $language,
		
		#[Annotations\XmlNode(
			name: 'sequence',
			type: Sequence::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $sequences,
	) {}
}
