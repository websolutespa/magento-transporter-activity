<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model\ResourceModel\Activity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Websolute\TransporterActivity\Model\ActivityModel;
use Websolute\TransporterActivity\Model\ResourceModel\ActivityResourceModel;

class ActivityCollection extends AbstractCollection
{
    protected $_idFieldName = 'activity_id';
    protected $_eventPrefix = 'transporter_activity_collection';
    protected $_eventObject = 'activity_collection';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ActivityModel::class, ActivityResourceModel::class);
    }
}
