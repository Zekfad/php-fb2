<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Any cover page items, currently only images.
 */
#[Annotations\XmlNode(
	name: 'coverpage',
	namespace: Util\XmlNamespaces::FB2,
)]
class CoverPage extends XmlElement {
	/**
	 * Any cover page items, currently only images.
	 * 
	 * @param InlineImage[] $images Images.
	 */
	public function __construct(
		#[Annotations\XmlNode(
			name: 'image',
			type: Markup\InlineImage::class,
			repeating: Annotations\XmlNode::REPEATING,
		)]
		public array $images,
	) {}
}
