<?php

$db = new SQLite3('message_board.db');

// ----------------------------------------

$users = [
    ['username' => 'mladen', 'email' => 'mladen.mandaric@gmail.com', 'password' => 123]
];

$users_table_query = <<<EOF
  CREATE TABLE IF NOT EXISTS users
    (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    username TEXT  NOT NULL,
    email    TEXT  NOT NULL,
    password TEXT  NOT NULL);
EOF;

$db->exec($users_table_query);

foreach($users as $user) {
    $sql = "INSERT INTO users (username, email, password) VALUES('{username}', '{email}', '{password}');";

    $sql = str_replace(['{username}', '{email}', '{password}'], $user, $sql);

    $db->exec($sql);
}

// ----------------------------------------

$messages = [
    ['title' => 'Message #1', 'content' => 'Content #1', 'user_id' => 1],
    ['title' => 'Message #2', 'content' => 'Content #2', 'user_id' => 1],
    ['title' => 'Message #3', 'content' => 'Content #3', 'user_id' => 1],
    ['title' => 'Message #4', 'content' => 'Content #4', 'user_id' => 1],
    ['title' => 'Message #5', 'content' => 'Content #5', 'user_id' => 1],
    ['title' => 'Message #6', 'content' => 'Content #6', 'user_id' => 1],
    ['title' => 'Message #7', 'content' => 'Content #7', 'user_id' => 1],
    ['title' => 'Message #8', 'content' => 'Content #8', 'user_id' => 1],
    ['title' => 'Message #9', 'content' => 'Content #9', 'user_id' => 1]
];

$messages_table_query = <<<EOF
  CREATE TABLE IF NOT EXISTS messages
    (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    title   TEXT     NOT NULL,
    content TEXT     NOT NULL,
    user_id INTEGER  NOT NULL);
EOF;

$db->exec($messages_table_query);

foreach ($messages as $message) {
    $sql = "INSERT INTO messages (title, content, user_id) VALUES('{title}', '{content}', '{user_id}');";

    $sql = str_replace(['{title}', '{content}', '{user_id}'], $message, $sql);

    $db->exec($sql);
}

