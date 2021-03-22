<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Websolute\TransporterActivity\Model\ActivityStateInterface;

class Status implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [];

        foreach (ActivityStateInterface::ALL as $status) {
            $options[] = [
                'value' => $status,
                'label' => $status
            ];
        }

        return $options;
    }
}
