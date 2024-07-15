<?php

namespace Zekfad\FB2;

use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;

/**
 * Unimplemented element.
 */
class UnimplementedElement extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * Unimplemented element.
	 */
	public function __construct() {}

	public function xmlSerialize(\Sabre\Xml\Writer $writer): void {
		throw new UnimplementedError();
	}

	public static function xmlDeserialize(\Sabre\Xml\Reader $reader): static {
		throw new UnimplementedError();
	}
}
