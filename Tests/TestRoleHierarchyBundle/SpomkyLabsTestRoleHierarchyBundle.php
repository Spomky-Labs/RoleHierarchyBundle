<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\TestRoleHierarchyBundle;

use SpomkyLabs\TestRoleHierarchyBundle\DependencyInjection\TestExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SpomkyLabsTestRoleHierarchyBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new TestExtension('spomkylabs_test_role_hierarchy');
    }
}
