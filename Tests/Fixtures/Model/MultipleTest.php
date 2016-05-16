<?php

namespace Nelmio\ApiDocBundle\Tests\Fixtures\Model;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

class MultipleTest
{
    public $nothing;

    /**
     * @Assert\Type("DateTime")
     * @JMS\Type("DateTime")
     */
    public $bar;

    /**
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("number");
     */
    public $baz;

    /**
     * @Assert\Type("Nelmio\ApiDocBundle\Tests\Fixtures\Model\Test")
     * @JMS\Type("Nelmio\ApiDocBundle\Tests\Fixtures\Model\Test")
     */
    public $related;

    /**
     * @JMS\Type("array<Nelmio\ApiDocBundle\Tests\Fixtures\Model\Test>")
     * @Assert\All({
     *     @Assert\Type("Nelmio\ApiDocBundle\Tests\Fixtures\Model\Test")
     * })
     */
    public $objects;
}
