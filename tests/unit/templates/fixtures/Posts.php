<?php
return [
    'post_id' => $faker->firstName,
    'post_title' => $faker->phoneNumber,
    'post_description' => $faker->city,
    'author_id' => Yii::$app->getSecurity()->generatePasswordHash('password_' . $index),
    'post_body' => Yii::$app->getSecurity()->generateRandomString(),

];

