<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;

/**
 * Information about a single author.
 * 
 * Version with full name.
 */
#[Annotations\XmlNode(
	name: 'author',
	namespace: Util\XmlNamespaces::FB2,
)]
class AuthorFullName extends BaseAuthor {
	/**
	 * Information about a single author.
	 * 
	 * @param TextField $firstName Author first name.
	 * @param ?TextField $middleName Author middle name.
	 * @param TextField $lastName Author last name.
	 * @param ?TextField $nickname Author nickname.
	 * @param string[] $homepages Author's web page URLs.
	 * @param string[] $emails Author E-mail addresses.
	 * @param ?string $id Author ID.
	 * @return void 
	 */
	public function __construct(
		#[Annotations\XmlNode('first-name')]
		public TextField $firstName,

		#[Annotations\XmlNode('middle-name')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $middleName,

		#[Annotations\XmlNode('last-name')]
		public TextField $lastName,

		#[Annotations\XmlNode('nickname')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $nickname,

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

	public function getFirstName(): TextField {
		return $this->firstName;
	}

	public function getMiddleName(): ?TextField {
		return $this->middleName;
	}

	public function getLastName(): TextField {
		return $this->lastName;
	}

	public function getNickname(): ?TextField {
		return $this->nickname;
	}
}
