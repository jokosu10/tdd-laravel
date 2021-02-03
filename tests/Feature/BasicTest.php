<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Box;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExampleTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A check box have a some content
     *
     * @return void
     */
    public function testBoxContentsTest()
    {
        $box = new Box(['toy']);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }

    public function testTakeOneFromTheBoxTest()
    {
        $box = new Box(['torch']);
        $this->assertEquals('torch', $box->takeOne());

        $this->assertNull($box->takeOne());
    }

    public function testStartsWithALetterTest()
    {
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);

        // in box have start with some letter
        $results = $box->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // in box dont have start with some letter
        $this->assertEmpty($box->startsWith('s'));
    }
}
