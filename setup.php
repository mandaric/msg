<?php

$messages = [
  ['title' => 'Message #1', 'content' => 'Content #1', 'author' => 'Author #1'],
  ['title' => 'Message #2', 'content' => 'Content #2', 'author' => 'Author #2'],
  ['title' => 'Message #3', 'content' => 'Content #3', 'author' => 'Author #3'],
  ['title' => 'Message #4', 'content' => 'Content #4', 'author' => 'Author #4'],
  ['title' => 'Message #5', 'content' => 'Content #5', 'author' => 'Author #5'],
  ['title' => 'Message #6', 'content' => 'Content #6', 'author' => 'Author #6'],
  ['title' => 'Message #7', 'content' => 'Content #7', 'author' => 'Author #7'],
  ['title' => 'Message #8', 'content' => 'Content #8', 'author' => 'Author #8'],
  ['title' => 'Message #9', 'content' => 'Content #9', 'author' => 'Author #9']
];

$db = new SQLite3('message_board.db');

$messages_table_query = <<<EOF
  CREATE TABLE IF NOT EXISTS MESSAGES
    (ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    TITLE   TEXT  NOT NULL,
    CONTENT TEXT  NOT NULL,
    AUTHOR  TEXT  NOT NULL);
EOF;

$db->exec($messages_table_query);

$users_table_query = <<<EOF
  CREATE TABLE IF NOT EXISTS USERS
    (ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    EMAIL   TEXT  NOT NULL,
    PASSWORD TEXT  NOT NULL);
EOF;

$db->exec($users_table_query);

foreach($messages as $message)
{
  $sql = "INSERT INTO MESSAGES (TITLE, CONTENT, AUTHOR) VALUES('{title}', '{content}', '{author}');";

  $sql = str_replace(['{title}', '{content}', '{author}'], $message, $sql);

  $db->exec($sql);
}
