<?php

use App\Models\User;

class Dog
{
    public function move()
    {
        echo "dog is moving";
    }
}

class Cat
{
    public function move()
    {
        echo "Cat is moving";
    }
}


function app(Dog $obj)
{
    echo $obj->move();
};

app(new Dog);

// app(new Cat);
