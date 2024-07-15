<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;

/**
 * Book (as a book opposite a document) description.
 */
#[Annotations\XmlNode(
	name: 'title-info',
	namespace: Util\XmlNamespaces::FB2,
)]
class TitleInfo extends XmlElement {
	/**
	 * Book (as a book opposite a document) description.
	 * 
	 * @param Genre[] $genres Genres of this book, with the optional match percentage.
	 * @param (AuthorFullName|AuthorNickname)[] $authors Author(s) of this book.
	 * @param TextField $bookTitle Book title.
	 * @param ?Annotation $annotation Annotation for this book.
	 * @param ?TextField $keywords Any keywords for this book, intended for use in search engines.
	 * @param ?Date $date Date this book was written, can be not exact, e.g. 1863-1867. If an optional attribute is present, then it should contain some computer-readable date from the interval for use by search and indexing engines.
	 * @param ?CoverPage $coverPage Any cover page items, currently only images.
	 * @param string $language Book's language.
	 * @param ?string $sourceLanguage Book's source language if this is a translation.
	 * @param (AuthorFullName|AuthorNickname)[] $translators Translators if this is a translation.
	 * @param Sequence[] $sequences Any sequences this book might be part of.
	 */
	public function __construct(
		#[Annotations\XmlNode(
			name: 'genre',
			type: Genre::class,
			repeating: Annotations\XmlNode::REPEATING,
		)]
		public array $genres,

		#[Annotations\XmlNode(
			name: 'author',
			type: BaseAuthor::REPARSE_TYPES,
			repeating: Annotations\XmlNode::REPEATING,
		)]
		public array $authors,

		#[Annotations\XmlNode('book-title')]
		public TextField $bookTitle,

		#[Annotations\XmlNode('annotation')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Annotation $annotation,

		#[Annotations\XmlNode('keywords')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $keywords,

		#[Annotations\XmlNode('date')]
		#[Annotations\XmlDefaultValue(null)]
		public ?Date $date,

		#[Annotations\XmlNode('coverpage')]
		#[Annotations\XmlDefaultValue(null)]
		public ?CoverPage $coverPage,

		#[Annotations\XmlNode('lang')]
		public string $language,

		#[Annotations\XmlNode('src-lang')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $sourceLanguage,

		#[Annotations\XmlNode(
			name: 'translator',
			type: BaseAuthor::REPARSE_TYPES,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $translators,

		#[Annotations\XmlNode(
			name: 'sequence',
			type: Sequence::class,
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $sequences,
	) {}
}
