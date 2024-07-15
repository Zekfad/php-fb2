<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\Util;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlNamedElement;
use Zekfad\Xml\XmlPreserveNameTrait;

/**
 * Empty line.
 */
#[Annotations\XmlNode(
	name: 'empty-line',
	namespace: Util\XmlNamespaces::FB2,
)]
class EmptyLine extends XmlElement implements XmlNamedElement {
	use XmlPreserveNameTrait;

	/**
	 * Empty line.
	 */
	public function __construct() {}
}
