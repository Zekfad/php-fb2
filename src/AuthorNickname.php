<?php

namespace Zekfad\FB2;

use Zekfad\Xml\Annotations;

/**
 * Information about a single author.
 * 
 * Version with only a nickname.
 */
#[Annotations\XmlNode(
	name: 'author',
	namespace: Util\XmlNamespaces::FB2,
)]
class AuthorNickname extends BaseAuthor {
	/**
	 * Information about a single author.
	 * 
	 * @param ?TextField $firstName Author first name.
	 * @param ?TextField $middleName Author middle name.
	 * @param ?TextField $lastName Author last name.
	 * @param TextField $nickname Author nickname.
	 * @param string[] $homepages Author's web page URLs.
	 * @param string[] $emails Author E-mail addresses.
	 * @param ?string $id Author ID.
	 */
	public function __construct(
		#[Annotations\XmlNode('first-name')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $firstName,

		#[Annotations\XmlNode('middle-name')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $middleName,

		#[Annotations\XmlNode('last-name')]
		#[Annotations\XmlDefaultValue(null)]
		public ?TextField $lastName,

		#[Annotations\XmlNode('nickname')]
		public TextField $nickname,

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

	public function getNickname(): TextField {
		return $this->nickname;
	}
}
