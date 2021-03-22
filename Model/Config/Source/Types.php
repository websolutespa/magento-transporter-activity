<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Websolute\TransporterBase\Api\TransporterListInterface;

class Types implements OptionSourceInterface
{
    /**
     * @var TransporterListInterface
     */
    private $transporterList;

    /**
     * @param TransporterListInterface $transporterList
     */
    public function __construct(
        TransporterListInterface $transporterList
    ) {
        $this->transporterList = $transporterList;
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [];

        $allDownlaoderList = $this->transporterList->getAllDownloaderList();

        $types = array_keys($allDownlaoderList);

        foreach ($types as $type) {
            $options[] = [
                'value' => $type,
                'label' => $type
            ];

        }

        return $options;
    }
}
