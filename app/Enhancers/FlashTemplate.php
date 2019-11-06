<?php

namespace App\Enhancers;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

class FlashTemplate extends BaseTemplate implements TemplateInterface
{
	protected $prefix  = '<p>';
	protected $postfix = '</p>';
	protected $wrapper = "<div class='alert alert-%s alert-dismissible fade show' role='alert'>%s
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>×</span>
						</button>
						</div>";

	/**
	 * @param $messages - message text
	 * @param $type     - message type: success, info, warning, error
	 *
	 * @return string
	 */
	public function wrapMessages($messages, $type)
	{
        $type = ($type == 'error') ? 'danger' : $type;
		return sprintf($this->getWrapper(), $type, $messages);
	}
}
