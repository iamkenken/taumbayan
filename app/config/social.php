<?php
return array(
    'base_url'  => URL::route('hybridauth', array('process' => true)),
    'providers' => array(
        'Facebook' => array(
            'enabled' => true,
            'keys'    => array(
                'id'     => '748856535214656',
                'secret' => '81cd626beaa8eef019068b20165a674a'
            ),
            'scope' => ['email', 'user_location']
        ),

        'Twitter' => array(
            'enabled' => true,
            'keys'    => array(
                'key'     => 'VOzuXfrlV1t3LLStJ4qB1yiEj',
                'secret' => 'Hr67RFoMFT6KkqiwvW0MD0JY7Qxlzey6bavBVA0QKaXWmTybVJ'
            )
        ),

        'Google' => array(
            'enabled' => true,
            'keys'    => array(
                'id'     => '1062914938230-lgun5qgbstrngjas90kqufn6lbqap02m.apps.googleusercontent.com',
                'secret' => 'mnirCg7wNIJeLaTfnpYVPRu1'
            ),
        ),

    )
);


