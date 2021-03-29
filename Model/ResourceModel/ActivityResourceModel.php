<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See LICENSE and/or COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ActivityResourceModel extends AbstractDb
{
    /** @var string */
    const TABLE_NAME = 'transporter_activity';

    /** @var string */
    const ID_FIELD_NAME = 'activity_id';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::ID_FIELD_NAME);
    }
}
