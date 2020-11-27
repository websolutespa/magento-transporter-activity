<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ActivitySearchResultInterface extends SearchResultsInterface
{
    /**
     * @return ActivityInterface[]
     */
    public function getItems();

    /**
     * @param ActivityInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
