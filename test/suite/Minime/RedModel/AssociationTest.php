<?php

namespace Minime\RedModel;

use \Minime\RedModel\Fixtures\AssociationFixtureA as A;
use \Minime\RedModel\Fixtures\AssociationFixtureB as B;
use \Minime\RedModel\Fixtures\AssociationFixtureZ as Z;
use \R;

class AssociationTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		R::setup();
		R::setStrictTyping( false );
	}

	public function tearDown()
	{
		R::nuke();
	}

	/**
	 * @test
	 */
	public function associateMany()
	{
		$a = new A;
		$a->save();

		$b1 = new B;
		$b2 = new B;
		$b3 = new B;
		$b1->save();
		$b2->save();
		$b3->save();

		$a->associateMany($b1, $b2);
		$this->assertCount(2, $a->getMany('B'));

		$a->associateMany($b3);
		$this->assertCount(3, $a->getMany('B'));
	}

	/**
	 * @test
	 * @depends associateMany
	 */
	public function unassociateMany()
	{
		$a = new A;
		$a->save();

		$b1 = new B;
		$b2 = new B;
		$b1->save();
		$b2->save();

		$a->associateMany($b1, $b2);
		$this->assertCount(2, $a->getMany('B'));

		$a->unassociateMany($b1);
		$this->assertCount(1, $a->getMany('B'));

		$a->unassociateMany($b2);
		$this->assertCount(0, $a->getMany('B'));
	}

	/**
	 * @test
	 * @expectedException \Minime\RedModel\InvalidAssociationException
	 */
	public function invalidHasManyAssociation()
	{
		$a = new A();
		$z = new Z();
		$a->associateMany($z);
	}
}