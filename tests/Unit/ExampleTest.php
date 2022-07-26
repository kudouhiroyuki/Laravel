<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserBase {
  protected array $user;
  public function __construct($i) {
    $this->user = $i;
  }
  public function setUser($i) {
    $this->user = $i;
  }
  public function getUser(): array {
    return $this->user;
  }
  public function test1() {
    return 'test1';
  }
}

class User extends UserBase {
  public function action() {
    return parent::test1();
  }
}

class Other {
  public static $val = 0;
  public static function setValue($i) {
    self::$val = $i;
  }
  public static function getValue() {
    return self::$val;
  }
}

class ExampleTest extends TestCase {
  public function testUser() {
    $this->assertEquals(0, Other::$val);
    Other::setValue(100);
    $this->assertEquals(100, Other::getValue());

    // UserBaseテスト
    $userBase = new UserBase(array('name' => 'デフォルト'));
    $this->assertEquals(array('name' => 'デフォルト'), $userBase->getUser());
    $userBase->setUser(array());
    $this->assertEquals(array(), $userBase->getUser());
    // Userテスト
    $user = new User(array());
    $user->setUser(array('name' => '工藤'));
    $user->action();
  }
}
