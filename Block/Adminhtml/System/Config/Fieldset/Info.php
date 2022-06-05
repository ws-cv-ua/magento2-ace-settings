<?php

declare(strict_types=1);

namespace Wscvua\AceEditor\Block\Adminhtml\System\Config\Fieldset;

use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface;

class Info extends Template implements RendererInterface
{
    /**
     * @var string
     */
    protected $_template = 'Wscvua_AceEditor::system/config/fieldset/info.phtml';

    public function render(AbstractElement $element): string
    {
        return $this->toHtml();
    }
}
