<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See LICENSE and/or COPYING.txt for license details.
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

    public const ALL = [
        self::DOWNLOADING,
        self::DOWNLOADED,
        self::DOWNLOAD_ERROR,
        self::MANIPULATING,
        self::MANIPULATED,
        self::MANIPULATE_ERROR,
        self::UPLOADING,
        self::UPLOADED,
        self::UPLOAD_ERROR
    ];
}
