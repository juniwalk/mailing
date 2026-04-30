<?php declare(strict_types = 1);

namespace Contributte\Mailing;

interface IMailBuilderFactory
{

	public function setDefaultSender(?string $defaultSender): void;

	public function create(): MailBuilder;

}
