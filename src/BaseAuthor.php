<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;
use Zekfad\Xml\XmlElement;
use Zekfad\Xml\XmlReparsePoint;

/**
 * Information about a single author.
 * 
 * Common interface.
 */
#[Annotations\XmlNode(
	name: 'author',
	type: self::REPARSE_TYPES,
	namespace: Util\XmlNamespaces::FB2,
)]
class BaseAuthor extends XmlElement {
	public const REPARSE_TYPES = [
		XmlReparsePoint::class,
		AuthorFullName::class,
		AuthorNickname::class,
	];

	/**
	 * Information about a single author.
	 * 
	 * @param ?TextField $firstName Author first name.
	 * @param ?TextField $middleName Author middle name.
	 * @param ?TextField $lastName Author last name.
	 * @param ?TextField $nickname Author nickname.
	 * @param string[] $homepages Author's web page URLs.
	 * @param string[] $emails Author E-mail addresses.
	 * @param ?string $id Author ID.
	 */
	public function __construct(
		#[Annotations\XmlNode('first-name')]
		#[Annotations\XmlDefaultValue(null)]
		?TextField $firstName,

		#[Annotations\XmlNode('middle-name')]
		#[Annotations\XmlDefaultValue(null)]
		?TextField $middleName,

		#[Annotations\XmlNode('last-name')]
		#[Annotations\XmlDefaultValue(null)]
		?TextField $lastName,

		#[Annotations\XmlNode('nickname')]
		#[Annotations\XmlDefaultValue(null)]
		?TextField $nickname,

		#[Annotations\XmlNode(
			name: 'home-page',
			type: 'string',
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $homepages,

		#[Annotations\XmlNode(
			name: 'email',
			type: 'string',
			repeating: Annotations\XmlNode::REPEATING_OPTIONAL,
		)]
		public array $emails,

		#[Annotations\XmlNode('id')]
		#[Annotations\XmlDefaultValue(null)]
		public ?string $id,
	) {}

	/**
	 * Get author first name.
	 * @return ?TextField
	 */
	public function getFirstName(): ?TextField {
		return null;
	}

	/**
	 * Get author middle name.
	 * @return ?TextField
	 */
	public function getMiddleName(): ?TextField {
		return null;
	}

	/**
	 * Get author last name.
	 * @return ?TextField
	 */
	public function getLastName(): ?TextField {
		return null;
	}

	/**
	 * Get author nickname.
	 * @return ?TextField
	 */
	public function getNickname(): ?TextField {
		return null;
	}
}
