<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * This element contains an arbitrary stylesheet that is interpreted by a some
 * processing programs, e.g. text/css stylesheets can be used by XSLT
 * stylesheets to generate better looking HTML.
 */
#[Annotations\XmlNode(
	name: 'stylesheet',
	namespace: Util\XmlNamespaces::FB2,
)]
class StyleSheet extends XmlElement {
	/**
	 * This element contains an arbitrary stylesheet that is interpreted by
	 * a some processing programs, e.g. text/css stylesheets can be used by XSLT
	 * stylesheets to generate better looking HTML.
	 * 
	 * @param string $type Stylesheet type.
	 * @param string $content Text content.
	 */
	public function __construct(
		#[Annotations\XmlAttribute]
		public string $type,

		#[Annotations\XmlContent]
		public string $content,
	) {}
}
