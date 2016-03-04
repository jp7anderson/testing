<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MailerTest extends TestCase
{
    use MailTracking;

    /**
     * @test.
     *
     */
    public function test_mailer()
    {
        Mail::raw('Hello world', function ($message) {
            $message->to('foo@bar.com');
            $message->from('bar@foo.com');
        });

        Mail::raw('Hello world', function ($message) {
            $message->to('foo@bar.com');
            $message->from('bar@foo.com');
        });

        $this->seeEmailsSent(2)
            ->seeEmailFrom('bar@foo.com');
    }
}
