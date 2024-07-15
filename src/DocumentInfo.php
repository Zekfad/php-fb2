<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Information about this particular (xml) document.
 */
#[Annotations\XmlNode(
	name: 'document-info',
	namespace: Util\XmlNamespaces::FB2,
)]
class DocumentInfo extends XmlElement {
	/**
	 * Information about this particular (xml) document.
	 * 
	 * @param (AuthorFullName|AuthorNickname)[] $authors Author(s) of this particular document.
	 * @param ?TextField $programUsed Any software used in preparation of this document, in free format.
	 * @param ?Date $date Date this document was created, same guidelines as in the <title-info> section apply.
	 * @param string[] $sourceUrl Source URL if this document is a conversion of some other (online) document.
	 * @param ?TextField $sourceOcr Author of the original (online) document, if this is a conversion.
	 * @param string $id Unique identifier for a document. Must not change.
	 * @param float $version Document version, in free format, should be incremented if the document is changed and re-released to the public.
	 * @param ?Annotation $history Short description for all changes made to this document, like "Added missing chapter 6", in free form.
	 * @param (AuthorFullName|AuthorNickname)[] $publishers Owner of the fb2 document copyright.
	 */
	public function __construct(
		#[Annotations\XmlNode(
			name: 'author',
			type: BaseAuthor::REPARSE_TYPES,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $authors,

		#[Annotations\XmlNode('program-used')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $programUsed,

		#[Annotations\XmlNode('date')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Date $date,

		#[Annotations\XmlNode(
			name: 'src-url',
			type: 'string',
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $sourceUrl,

		#[Annotations\XmlNode('src-ocr')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $sourceOcr,

		#[Annotations\XmlNode('id')]
		#[Annotations\XmlDefaultValue(null)]
		public string $id,

		#[Annotations\XmlNode('version')]
		#[Annotations\XmlDefaultValue(null)]
		public float $version,

		#[Annotations\XmlNode('history')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Annotation $history,

		#[Annotations\XmlNode(
			name: 'publisher',
			type: BaseAuthor::REPARSE_TYPES,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $publishers,
	) {}
}
