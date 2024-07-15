<?php

namespace Zekfad\FB2;

use InvalidArgumentException;
use Sabre\Xml\Service;
use Sabre\Xml\ParseException;
use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Root element.
 */
#[Annotations\XmlNode(
	name: 'FictionBook',
	namespace: Util\XmlNamespaces::FB2,
)]
class FictionBook extends XmlElement {
	const ROOT_ELEMENT = '{http://www.gribuser.ru/xml/fictionbook/2.0}FictionBook';

	/**
	 * Root element.
	 * 
	 * @param StyleSheet[] $styleSheets Book stylesheets.
	 * @param Description $description Book description.
	 * @param Body $body Main content of the book, multiple bodies are used for additional information, like footnotes, that do not appear in the main book flow. The first body is presented to the reader by default, and content in the other bodies should be accessible by hyperlinks. Name attribute should describe the meaning of this body, this is optional for the main body.
	 * @param NotesBody[] $notes Main content of the book, multiple bodies are used for additional information, like footnotes, that do not appear in the main book flow. The first body is presented to the reader by default, and content in the other bodies should be accessible by hyperlinks. Name attribute should describe the meaning of this body, this is optional for the main body.
	 * @param Binary[] $binary Any binary data that is required for the presentation of this book in base64 format. Currently only images are used.
	 */
	public function __construct(
		#[Annotations\XmlNode(
			name: 'stylesheet',
			type: StyleSheet::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $styleSheets,

		#[Annotations\XmlNode('description')]
		public Description $description,

		#[Annotations\XmlNode('body')]
		public Body $body,

		#[Annotations\XmlNode(
			name: 'body',
			type: NotesBody::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $notes,

		#[Annotations\XmlNode(
			name: 'binary',
			type: Binary::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $binaries,
	) {}

	/**
	 * Creates Sabre XML Service with mappings to parse FB2.
	 * @return \Sabre\Xml\Service 
	 */
	public static function createXmlService() {
		$service = new \Sabre\Xml\Service();
		$service->elementMap = [
			static::ROOT_ELEMENT => FictionBook::class,
		];
		$service->namespaceMap = [
			Util\XmlNamespaces::FB2 => '',
			Util\XmlNamespaces::FB2_GENRES => 'genre',
			Util\XmlNamespaces::XLINK => 'l',
		];

		return $service;
	}

	/**
	 * Parses XML string to Fiction Book.
	 * @param string $xml XML string.
	 * @param ?Service $service Optional custom Sabre XML Service.
	 * @return FictionBook If data is valid.
	 * @throws ParseException If FB2 is malformed or XML string is not a FB2 file.
	 */
	public static function parseXml(
		string $xml,
		?\Sabre\Xml\Service $service = null,
	): FictionBook {
		$value = ($service ?? static::createXmlService())->parse($xml);
		if (!($value instanceof FictionBook))
			throw new \Sabre\Xml\ParseException('Invalid input: XML is not a valid FB2 file.');
		return $value;
	}

	/**
	 * Writes this book to XML string.
	 * @param ?Service $service Optional custom Sabre XML Service.
	 * @return string XML string.
	 * @throws ParseException If FB2 is malformed.
	 */
	public function writeXml(?\Sabre\Xml\Service $service = null): string {
		$w = ($service ?? static::createXmlService())->getWriter();
		$w->openMemory();
		$w->contextUri = null;
		$w->setIndent(false);
		$w->startDocument();
		$w->writeElement(static::ROOT_ELEMENT, $this);
		return $w->outputMemory();
	}
}

