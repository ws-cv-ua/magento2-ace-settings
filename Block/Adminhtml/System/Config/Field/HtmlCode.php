<?php

declare(strict_types=1);

namespace Wscvua\AceEditor\Block\Adminhtml\System\Config\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Helper\SecureHtmlRenderer;
use Wscvua\AceEditor\Helper\Config;

class HtmlCode extends Field
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var string
     */
    private $mode;

    /**
     * @var int
     */
    private $height;

    public function __construct(
        Config $config,
        string $mode,
        int $height,
        Context $context,
        array $data = [],
        ?SecureHtmlRenderer $secureRenderer = null
    ) {
        $this->config = $config;
        $this->mode = $mode;
        $this->height = $height;
        parent::__construct($context, $data, $secureRenderer);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $elementId = $element->getHtmlId();
        $blockId = $element->getHtmlId() . "-editor";
        $preHtml = <<<HTML
<style type="text/css">
#$blockId {
    margin: 0;
    height: {$this->height}px;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}
#$elementId{
    display: none;
}
</style>
<pre id="$blockId"></pre>
HTML;
        $html .= $preHtml;
        $html .= '<script type="text/javascript">
            require(["jquery", "ace"], function ($) {
                $(document).ready(function () {
                    var input = $("#' . $elementId . '");
                    var editor = ace.edit("' . $blockId . '");
                    editor.setValue(input.val())
                    editor.moveCursorTo(0,0);
                    editor.setTheme("ace/theme/' . $this->config->getTheme() . '");
                    editor.session.setMode("ace/mode/' . $this->mode . '");
                    editor.on("change", function (e){
                        input.val(editor.getValue());
                    });
                });
            });
            </script>';

        return $html;
    }
}
