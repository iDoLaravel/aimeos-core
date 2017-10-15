<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2014-2017
 */


namespace Aimeos\MShop\Common\Item\Property;


class StandardTest extends \PHPUnit\Framework\TestCase
{
	private $object;
	private $values;


	protected function setUp()
	{
		$this->values = array(
			'common.property.id' => 987,
			'common.property.parentid' => 11,
			'common.property.siteid' => 99,
			'common.property.typeid' => 44,
			'common.property.languageid' => 'en',
			'common.property.type' => 'width',
			'common.property.typename' => 'Width',
			'common.property.value' => '30.0',
			'common.property.mtime' => '2011-01-01 00:00:02',
			'common.property.ctime' => '2011-01-01 00:00:01',
			'common.property.editor' => 'unitTestUser'
		);

		$this->object = new \Aimeos\MShop\Common\Item\Property\Standard( 'common.property.', $this->values );
	}


	protected function tearDown()
	{
		$this->object = null;
	}


	public function testGetId()
	{
		$this->assertEquals( 987, $this->object->getId() );
	}

	public function testSetId()
	{
		$return = $this->object->setId( null );

		$this->assertInstanceOf( '\Aimeos\MShop\Common\Item\Property\Iface', $return );
		$this->assertNull( $this->object->getId() );
		$this->assertTrue( $this->object->isModified() );
	}

	public function testGetSiteId()
	{
		$this->assertEquals( 99, $this->object->getSiteId() );
	}

	public function testGetLanguageId()
	{
		$this->assertEquals( 'en', $this->object->getLanguageId() );
	}

	public function testSetLanguageId()
	{
		$return = $this->object->setLanguageId('fr');

		$this->assertInstanceOf( '\Aimeos\MShop\Common\Item\Property\Iface', $return );
		$this->assertEquals( 'fr', $this->object->getLanguageId() );
		$this->assertTrue( $this->object->isModified() );
	}

	public function testGetParentId()
	{
		$this->assertEquals( 11, $this->object->getParentId() );
	}

	public function testSetParentId()
	{
		$return = $this->object->setParentId( 22 );

		$this->assertInstanceOf( '\Aimeos\MShop\Common\Item\Property\Iface', $return );
		$this->assertEquals( 22, $this->object->getParentId() );
		$this->assertTrue( $this->object->isModified() );
	}

	public function testGetTypeId()
	{
		$this->assertEquals( 44, $this->object->getTypeId() );
	}

	public function testSetTypeId()
	{
		$return = $this->object->setTypeId(33);

		$this->assertInstanceOf( '\Aimeos\MShop\Common\Item\Property\Iface', $return );
		$this->assertEquals( 33, $this->object->getTypeId() );
		$this->assertTrue( $this->object->isModified() );
	}

	public function testGetType()
	{
		$this->assertEquals( 'width', $this->object->getType() );
	}

	public function testGetTypeName()
	{
		$this->assertEquals( 'Width', $this->object->getTypeName() );
	}

	public function testGetValue()
	{
		$this->assertEquals( '30.0', $this->object->getValue() );
	}

	public function testSetValue()
	{
		$return = $this->object->setValue( '15.00' );

		$this->assertInstanceOf( '\Aimeos\MShop\Common\Item\Property\Iface', $return );
		$this->assertEquals( '15.00', $this->object->getValue() );
		$this->assertTrue( $this->object->isModified() );
	}

	public function testGetTimeModified()
	{
		$this->assertEquals( '2011-01-01 00:00:02', $this->object->getTimeModified() );
	}

	public function testGetTimeCreated()
	{
		$this->assertEquals( '2011-01-01 00:00:01', $this->object->getTimeCreated() );
	}

	public function testGetEditor()
	{
		$this->assertEquals( 'unitTestUser', $this->object->getEditor() );
	}


	public function testGetResourceType()
	{
		$this->assertEquals( 'common/property', $this->object->getResourceType() );
	}


	public function testFromArray()
	{
		$item = new \Aimeos\MShop\Common\Item\Property\Standard( 'common.property.' );

		$list = array(
			'common.property.parentid' => 1,
			'common.property.typeid' => 2,
			'common.property.type' => 'test',
			'common.property.typename' => 'Test',
			'common.property.languageid' => 'de',
			'common.property.value' => 'value',
		);

		$unknown = $item->fromArray($list);

		$this->assertEquals([], $unknown);

		$this->assertEquals($list['common.property.parentid'], $item->getParentId());
		$this->assertEquals($list['common.property.typeid'], $item->getTypeId());
		$this->assertEquals($list['common.property.languageid'], $item->getLanguageId());
		$this->assertEquals($list['common.property.value'], $item->getValue());
		$this->assertNull( $item->getSiteId() );
		$this->assertNull( $item->getTypeName() );
		$this->assertNull( $item->getType() );
	}


	public function testToArray()
	{
		$arrayObject = $this->object->toArray( true );
		$this->assertEquals( count( $this->values ), count( $arrayObject ) );

		$this->assertEquals( $this->object->getId(), $arrayObject['common.property.id'] );
		$this->assertEquals( $this->object->getSiteId(), $arrayObject['common.property.siteid'] );
		$this->assertEquals( $this->object->getType(), $arrayObject['common.property.type'] );
		$this->assertEquals( $this->object->getTypeId(), $arrayObject['common.property.typeid'] );
		$this->assertEquals( $this->object->getTypeName(), $arrayObject['common.property.typename'] );
		$this->assertEquals( $this->object->getLanguageId(), $arrayObject['common.property.languageid'] );
		$this->assertEquals( $this->object->getType(), $arrayObject['common.property.type'] );
		$this->assertEquals( $this->object->getValue(), $arrayObject['common.property.value'] );
		$this->assertEquals( $this->object->getTimeCreated(), $arrayObject['common.property.ctime'] );
		$this->assertEquals( $this->object->getTimeModified(), $arrayObject['common.property.mtime'] );
		$this->assertEquals( $this->object->getEditor(), $arrayObject['common.property.editor'] );
	}

	public function testIsModified()
	{
		$this->assertFalse( $this->object->isModified() );
	}
}