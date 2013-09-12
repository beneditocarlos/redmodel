<?php

namespace Minime\RedModel\Fixtures;

/**
 * @has-many ModelA
 * @has-many ModelB
 * 
 * @has-and-belogs-to-many ModelA
 * @has-and-belogs-to-many ModelB
 * 
 * @has-one ModelA
 * @has-one ModelB
 */
class AssociationFixtureA extends \Minime\RedModel\Model
{
}