<?php declare(strict_types = 1);

namespace Contributte\Mailing;

class MailBuilderFactory implements IMailBuilderFactory
{
	protected ?string $defaultSender = null;

	public function __construct(
		protected IMailSender $sender,
		protected IMailTemplateFactory $templateFactory,
	) {
	}

	public function setDefaultSender(?string $defaultSender): void
	{
		$this->defaultSender = $defaultSender;
	}

	public function create(): MailBuilder
	{
		$mail = new MailBuilder($this->sender);
		$mail->setTemplate($this->templateFactory->create());

		if ($this->defaultSender !== null) {
			$mail->setFrom($this->defaultSender);
		}

		return $mail;
	}

}
