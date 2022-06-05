<?php

declare(strict_types=1);

namespace Wscvua\AceEditor\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Theme implements OptionSourceInterface
{
    /**
     * @var array
     */
    private $options;

    public function __construct(
        array $options
    ) {
        $this->options = $options;
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [];
        foreach ($this->options as $key => $option) {
            $options[] = [
                'value' => $key,
                'label' => $option
            ];
        }
        return $options;
    }
}
