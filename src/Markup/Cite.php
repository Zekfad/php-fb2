<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\UnimplementedError;
use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;

/**
 * A citation with an optional citation author at the end.
 */
#[Annotations\XmlNode(
	name: 'cite',
	namespace: Util\XmlNamespaces::FB2,
)]
class Cite extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * A citation with an optional citation author at the end.
	 */
	public function __construct() {}

	public function xmlSerialize(\Sabre\Xml\Writer $writer): void {
		throw new UnimplementedError();
	}

	public static function xmlDeserialize(\Sabre\Xml\Reader $reader): static {
		throw new UnimplementedError();
	}
}
