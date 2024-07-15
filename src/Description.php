<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Book description.
 */
#[Annotations\XmlNode(
	name: 'description',
	namespace: Util\XmlNamespaces::FB2,
)]
class Description extends XmlElement {
	/**
	 * Book description.
	 * 
	 * @param TitleInfo $titleInfo Generic information about the book.
	 * @param ?TitleInfo $sourceTitleInfo Generic information about the original book (for translations).
	 * @param DocumentInfo $documentInfo Information about this particular (xml) document.
	 * @param ?PublishInfo $publishInfo Information about some paper/other published document, that was used as a source of this xml document.
	 * @param CustomInfo[] $customInfo Any other information about the book/document that didn't fit in the above groups.
	 * @param UnimplementedElement[] $outputs Describes, how the document should be presented to end-user, what parts are free, what parts should be sold and what price should be used.
	 */
	public function __construct(
		public TitleInfo $titleInfo,

		#[Annotations\XmlNode('src-title-info')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TitleInfo $sourceTitleInfo,

		#[Annotations\XmlNode('document-info')]
		#[Annotations\XmlDefaultValue(null)]
		public DocumentInfo $documentInfo,

		#[Annotations\XmlNode('publish-info')]
		#[Annotations\XmlDefaultValue(null)]
		public ?PublishInfo $publishInfo,

		#[Annotations\XmlNode(
			name: 'custom-info',
			type: CustomInfo::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $customInfo,

		#[Annotations\XmlNode(
			name: 'output',
			type: UnimplementedElement::class,
			repeating: [ 0, 2, ],
		)]
		public array $outputs,
	) {}
}
