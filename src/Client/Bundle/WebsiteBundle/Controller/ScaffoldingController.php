<?php

/*
 * This file is part of Sulu.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Client\Bundle\WebsiteBundle\Controller;

use Sulu\Bundle\WebsiteBundle\Controller\WebsiteController;
use Sulu\Component\Content\Compat\StructureInterface;

class ScaffoldingController extends WebsiteController
{
    public function indexAction(StructureInterface $structure, $preview = false, $partial = false)
    {
        $metadata = $this->get('sulu_document_manager.document_inspector')->getStructureMetadata(
            $structure->getDocument()
        );

        return $this->renderStructure(
            $structure,
            ['metadata' => $metadata],
            $preview,
            $partial
        );
    }
}
