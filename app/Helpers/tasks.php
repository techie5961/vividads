<?php

// tasks
function Tasks(){
       
    $json=[
        'whatsapp_group_join' => [
                'name' => 'Whatsapp Group (100 Members)',
                'cost' => 40,
                'earning' => 20,
                'photo' => 'photos/tasks/IMG_6539.png',
                'platform' => 'whatsapp',
                'members' => 100
        ],
        'telegram_group_join' => [
                'name' => 'Telegram Group (100 Members)',
                'cost' => 60,
                'earning' => 30,
                'photo' => 'photos/tasks/IMG_6541.png',
                'platform' => 'telegram',
                'members' => 100
        ],
        'instagram_group_join' => [
                'name' => 'Instagram Page (100 Followers)',
                'cost' => 20,
                'earning' => 10,
                'photo' => 'photos/tasks/IMG_6540.png',
                'platform' => 'telegram',
                'members' => 100
        ]
    ];
//     $json=ksort($json);
    return json_decode(json_encode($json));
}

?>