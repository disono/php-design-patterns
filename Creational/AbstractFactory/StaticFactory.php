<?php
/**
 * Creates an instance of several families of classes
 *
 * Rules:
 * 1. The factory class must have a static method, this is called a factory method.
 * 2. The factory method must return a class instance.
 * 3. Only one object should be created and returned at a time.
 */

// all should extend this abstract person class
abstract class PersonAbstract
{
    protected $identification;

    public function getIdentification()
    {
        return $this->identification;
    }
}

// used to represent a UserOne
class UserOne extends PersonAbstract
{
    protected $identification = 'UserOne';
}

// used to represent a UserTwo
class UserTwo extends PersonAbstract
{
    protected $identification = 'UserTwo';
}

// the is the factory which creates person object
class PersonFactory
{
    public static function factory($person)
    {
        switch ($person)
        {
            case 'UserOne':
                $obj = new UserOne();
                break;
            case 'UserTwo':
                $obj = new UserTwo();
                break;
            default:
                throw new \Exception('Person factory could not create person of identification ' . $person, 1000);
        }

        return $obj;
    }
}

try {
    $UserOne = PersonFactory::factory('UserOne');
    echo $UserOne->getIdentification();
    
    $UserTwo = PersonFactory::factory('UserTwo');
    echo $UserTwo->getIdentification();

    // this will throw an Exception
    $Alien = PersonFactory::factory('Alien');
} catch (\Exception $e) {
    echo $e->getMessage();
}
