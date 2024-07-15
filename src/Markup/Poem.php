<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\UnimplementedError;
use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;

/**
 * A poem.
 */
#[Annotations\XmlNode(
	name: 'poem',
	namespace: Util\XmlNamespaces::FB2,
)]
class Poem extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * A poem.
	 */
	public function __construct() {}

	public function xmlSerialize(\Sabre\Xml\Writer $writer): void {
		throw new UnimplementedError();
	}

	public static function xmlDeserialize(\Sabre\Xml\Reader $reader): static {
		throw new UnimplementedError();
	}
}
