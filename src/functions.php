<?php
function task1()
{
    $names = [
        "Aero",
        "Aang",
        "Sokka",
        "Katara",
        "Zuko"
    ];

    $filename = "users.json";
    $ages = 0;

    for ( $i = 0; $i < 50; $i++ )
    {
        $users[] = [
            'id' => $i,
            'name' => $names[ rand(0, 4) ],
            'old' => rand(19, 45)
        ];
    }

    $users_json = json_encode($users, JSON_UNESCAPED_UNICODE);

    $fp = fopen($filename, "w");
    fwrite($fp, $users_json);

    $json = file_get_contents($filename);
    $users = json_decode($json, true);

    foreach ($users as $user) {
        if (isset($count_users[ $user['name'] ])) {
            $count_users[ $user['name'] ]++;
        } else {
            $count_users[ $user['name'] ] = 1;
        }

        $ages += $user['old'];
    }

    echo 'Количество пользователей с каждым именем: <br />';
    foreach ($count_users as $key => $count)
    {
        echo $key . ': ' . $count . '<br />';
    }

    echo '<br>';
    echo 'Средний возраст всех: ' . intval($ages / count($users));


}
