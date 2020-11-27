<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model;

interface ActivityStateInterface
{
    const DOWNLOADING = 'downloading';
    const DOWNLOADED = 'downloaded';
    const DOWNLOAD_ERROR = 'download_error';

    const MANIPULATING = 'manipulating';
    const MANIPULATED = 'manipulated';
    const MANIPULATE_ERROR = 'manipulate_error';

    const UPLOADING = 'uploading';
    const UPLOADED = 'uploaded';
    const UPLOAD_ERROR = 'upload_error';
}
