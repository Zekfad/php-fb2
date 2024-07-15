<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Any binary data that is required for the presentation of this book
 * in base64 format. Currently only images are used.
 */
#[Annotations\XmlNode(
	name: 'binary',
	namespace: Util\XmlNamespaces::FB2,
)]
class Binary extends XmlElement {
	/**
	 * Any binary data that is required for the presentation of this book
	 * in base64 format. Currently only images are used.
	 * 
	 * @param string $contentType Content type.
	 * @param string $id ID.
	 * @param string $data Binary data in base64 format.
	 */
	public function __construct(
		#[Annotations\XmlAttribute('content-type')]
		public string $contentType,

		#[Annotations\XmlAttribute('id')]
		public string $id,
	
		#[Annotations\XmlContent]
		public string $data,
	) {}
}
