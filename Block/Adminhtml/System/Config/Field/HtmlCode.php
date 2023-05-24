<?php

declare(strict_types=1);

namespace Wscvua\AceEditor\Block\Adminhtml\System\Config\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Helper\SecureHtmlRenderer;
use Wscvua\AceEditor\Helper\Config;
use Magento\Framework\View\Asset\Repository as AssetRepository;

class HtmlCode extends Field
{
    /**
     * Constructor
     *
     * @param Config $config
     * @param AssetRepository $assetRepository
     * @param string $mode
     * @param int $height
     * @param Context $context
     * @param array $data
     * @param SecureHtmlRenderer|null $secureRenderer
     */
    public function __construct(
        private readonly Config $config,
        private readonly AssetRepository $assetRepository,
        private readonly string $mode,
        private readonly int $height,
        Context $context,
        array $data = [],
        ?SecureHtmlRenderer $secureRenderer = null
    ) {
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
                ace.config.set("basePath", "' . $this->getBaseLibUrl() . '");
                $(document).ready(function () {
                    var input = $("#' . $elementId . '");
                    var editor = ace.edit("' . $blockId . '");
                    editor.setValue(input.val())
                    editor.moveCursorTo(0,0);
                    editor.setTheme("ace/theme/' . $this->config->getTheme() . '.min");
                    editor.session.setMode("ace/mode/' . $this->mode . '.min");
                    editor.on("change", function (e){
                        input.val(editor.getValue());
                    });
                });
            });
            </script>';

        return $html;
    }

    /**
     * @return string
     */
    private function getBaseLibUrl(): string
    {
        $url = $this->assetRepository->getUrl('Wscvua_AceEditor::js/lib/ext-rtl.js');
        $url = str_replace("/ext-rtl.js", '', $url);
        return str_replace("/ext-rtl.min.js", '', $url);
    }
}
