<?php

namespace Minime\RedModel\Fixtures;

/**
 * @has-many ModelB
 * @has-many ModelA
 * 
 * @has-and-belogs-to-many ModelB
 * @has-and-belogs-to-many ModelA
 * 
 * @has-one ModelB
 * @has-one ModelA
 */
class AssociationFixtureB extends \Minime\RedModel\Model
{
}