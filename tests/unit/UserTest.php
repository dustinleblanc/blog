<?php


use App\User;
use Codeception\Util\Stub;

class UserTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPosts()
    {
        $user1 = Stub::make('User');
        $user2 = Stub::make('User');
        $posts = Stub::factory('Post', 3, ['user' => $user1]);

        $this->specify("Returns a user's posts", function() {
            verify($user1->posts()->count())->equals(3);
        });

    }
}
