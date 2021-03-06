<?php
/**
 * @see       https://github.com/zendframework/zend-hydrator for the canonical source repository
 * @copyright Copyright (c) 2010-2018 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-hydrator/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace ZendTest\Hydrator\TestAsset;

class ClassMethodsTitleCase
{
    protected $FooBar = '1';

    protected $FooBarBaz = '2';

    protected $IsFoo = true;

    protected $IsBar = true;

    protected $HasFoo = true;

    protected $HasBar = true;

    public function getFooBar()
    {
        return $this->FooBar;
    }

    public function setFooBar($value)
    {
        $this->FooBar = $value;
        return $this;
    }

    public function getFooBarBaz()
    {
        return $this->FooBarBaz;
    }

    public function setFooBarBaz($value)
    {
        $this->FooBarBaz = $value;
        return $this;
    }

    public function getIsFoo()
    {
        return $this->IsFoo;
    }

    public function setIsFoo($IsFoo)
    {
        $this->IsFoo = $IsFoo;
        return $this;
    }

    public function getIsBar()
    {
        return $this->IsBar;
    }

    public function setIsBar($IsBar)
    {
        $this->IsBar = $IsBar;
        return $this;
    }

    public function getHasFoo()
    {
        return $this->HasFoo;
    }

    public function getHasBar()
    {
        return $this->HasBar;
    }

    public function setHasFoo($HasFoo)
    {
        $this->HasFoo = $HasFoo;
        return $this;
    }

    public function setHasBar($HasBar)
    {
        $this->HasBar = $HasBar;
    }
}
