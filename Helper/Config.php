<?php

declare(strict_types=1);

namespace Wscvua\AceEditor\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_THEME = 'wscvua/code/theme';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get Ace theme
     *
     * @return string
     */
    public function getTheme(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_THEME
        );
    }
}
