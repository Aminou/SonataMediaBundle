<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\MediaBundle\Controller;

use Sonata\MediaBundle\Action\MediaDownloadAction;
use Sonata\MediaBundle\Model\MediaManagerInterface;
use Sonata\MediaBundle\Provider\MediaProviderInterface;
use Sonata\MediaBundle\Provider\Pool;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * NEXT_MAJOR: Remove this class.
 *
 * @deprecated since sonata-project/media-bundle 3.x, to be removed in 4.0.
 */
final class MediaController extends AbstractController
{
    /**
     * @var MediaManagerInterface
     */
    private $mediaManager;

    /**
     * @var Pool
     */
    private $pool;

    public function __construct(MediaManagerInterface $mediaManager, Pool $pool)
    {
        $this->mediaManager = $mediaManager;
        $this->pool = $pool;
    }

    /**
     * NEXT_MAJOR: Remove this method.
     *
     * @param int|string $id
     *
     * @throws NotFoundHttpException
     *
     * @deprecated since sonata-project/media-bundle 3.x, to be removed in 4.0.
     */
    public function downloadAction(Request $request, $id, string $format = MediaProviderInterface::FORMAT_REFERENCE): Response
    {
        $mediaDownloadAction = new MediaDownloadAction($this->mediaManager, $this->pool);

        return $mediaDownloadAction($request, $id, $format);
    }
}
