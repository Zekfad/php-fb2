<?php

namespace Zekfad\FB2\Util;

interface XmlNamespaces {
	const FB2        = 'http://www.gribuser.ru/xml/fictionbook/2.0';
	const FB2_GENRES = 'http://www.gribuser.ru/xml/fictionbook/2.0/genres';
	const XLINK      = 'http://www.w3.org/1999/xlink';
		
	const FB2_PREFIX        = '{' . self::FB2 . '}';
	const FB2_GENRES_PREFIX = '{' . self::FB2_GENRES . '}';
	const XLINK_PREFIX      = '{' . self::XLINK . '}';
}
