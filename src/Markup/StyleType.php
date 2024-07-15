<?php

namespace Zekfad\FB2\Markup;

use Zekfad\FB2\Util\XmlNamespaces;

/**
 * Types for style elements.
 */
enum StyleType: string {
	case Strong = XmlNamespaces::FB2_PREFIX . 'strong';
	case Emphasis = XmlNamespaces::FB2_PREFIX . 'emphasis';
	case NamedStyle = XmlNamespaces::FB2_PREFIX . 'style';
	case Strikethrough = XmlNamespaces::FB2_PREFIX . 'strikethrough';
	case Subscript = XmlNamespaces::FB2_PREFIX . 'sub';
	case Superscript = XmlNamespaces::FB2_PREFIX . 'sup';
	case Code = XmlNamespaces::FB2_PREFIX . 'code';
}
