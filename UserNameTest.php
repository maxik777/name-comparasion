<?php

require __DIR__ . "/UserName.php";
use PHPUnit\Framework\TestCase;

class UserNameTest extends TestCase
{

    public function testCompareTo_MainTest() {

        $user = new UserName('IDOWU');
        $this->assertTrue($user->compareTo('IDOWU'));

        $user = new UserName('IDOWU EBUNOLUWA');
        $this->assertTrue($user->compareTo('EBUNOLUWA IDOWU'));

        $user = new UserName('IDOWU EBUNOLUWA');
        $this->assertTrue($user->compareTo('IDOWU EBUNOLUWA'));

        $user = new UserName('IDOWU SARAH EBUNOLUWA');
        $this->assertTrue($user->compareTo('EBUNOLUWA IDOWU'));

        $user = new UserName('IDOWU EBUNOLUWA SARAH');
        $this->assertTrue($user->compareTo('SARAH, EBUNOLUWA IDOWU'));

    }

    public function testCompareTo_SeparatorsTests() {
        $user = new UserName('IDOWU, EBUNOLUWA');
        $this->assertTrue($user->compareTo('IDOWU EBUNOLUWA'));

        $user = new UserName('IDOWU. EBUNOLUWA');
        $this->assertTrue($user->compareTo('IDOWU    , EBUNOLUWA'));
    }

    public function testCompareTo_FourWordsTests() {

        $user = new UserName('IDOWU EBUNOLUWA SARAH JONS');
        $this->assertTrue($user->compareTo('IDOWU EBUNOLUWA SARAH'));

        $user = new UserName('IDOWU EBUNOLUWA SARAH');
        $this->assertTrue($user->compareTo('IDOWU EBUNOLUWA SARAH JONS'));

        $user = new UserName('IDOWU EBUNOLUWA JACK');
        $this->assertFalse($user->compareTo('IDOWU EBUNOLUWA SARAH JONS'));
    }
}