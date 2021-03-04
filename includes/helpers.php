<?php

$env = $_SERVER['DOCUMENT_ROOT'] . '/tatie_odette/env.php';
$env_local = $_SERVER['DOCUMENT_ROOT'] . '/tatie_odette/env_local.php';
require_once file_exists($env_local) ? $env_local : $env;


/*
 * SQL request used to debug a variable, display its value and crash;
 *
 */

function dd($var) {
    var_dump($var);
    die();
}

/*
 * SQL request connection to the DB, included in all other requests
 *
 */

function connectDB(): PDO
{
    global $database;
    $host = $database['host'];
    $dbname = $database['dbname'];
    $username = $database['username'];
    $password = $database['password'];
    return new PDO("mysql:host=$host;dbname=$dbname", "$username","$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

/*
 * SQL requests getting all lines in tables
 *
 */

function getContests(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contests");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPatterns(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM patterns");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUsersPatterns(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users_patterns");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllContestsPatterns(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contest_patterns");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getOrders(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM orders");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUsers(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUsersFavoritesPatterns(): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users_favorites");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/*
 * SQL requests getting lines based on parameters
 *
 */

function getContest($id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contests WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getContestPatterns($contest_id): array
{
    $dbh = connectDB();
        $stmt = $dbh->prepare("SELECT * FROM contest_patterns WHERE contest_id = :contest_id ORDER BY contest_patterns.votes DESC");
    $stmt->bindValue(':contest_id', $contest_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getContestWinnerPattern($contest_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contest_patterns WHERE contest_id = :contest_id ORDER BY contest_patterns.votes DESC LIMIT 1");
    $stmt->bindValue(':contest_id', $contest_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getContestPattern($contest_id, $pattern_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contest_patterns WHERE contest_id = :contest_id AND 	pattern_id = :pattern_id");
    $stmt->bindValue(':contest_id', $contest_id);
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserContestsPatterns($user_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contest_patterns WHERE creator_id = :user_id");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserContestPatterns($user_id, $contest_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contest_patterns WHERE creator_id = :user_id AND contest_id = :contest_id");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':contest_id', $contest_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserContestPattern($user_id, $contest_id, $pattern_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contest_patterns WHERE creator_id = :user_id AND contest_id = :contest_id AND pattern_id = :pattern_id");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':contest_id', $contest_id);
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserOrders($user_id): array
{
    $dbh = connectDB();

    $stmt = $dbh->prepare("SELECT orders.*, patterns.name, patterns.description, patterns.picture, patterns.category 
                                FROM patterns LEFT JOIN orders ON patterns.id = orders.pattern_id
                                WHERE orders.user_id = :user_id ORDER BY orders.created_at DESC");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserPatternOrders($user_id): array
{
    $dbh = connectDB();

    $stmt = $dbh->prepare("SELECT orders.*, users_patterns.name, users_patterns.piece_type, users_patterns.description, users_patterns.pattern_identifier, users_patterns.category 
                                FROM users_patterns LEFT JOIN orders ON users_patterns.id = orders.pattern_id
                                WHERE orders.user_id = :user_id ORDER BY orders.created_at DESC");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getOrder($order_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM orders WHERE id = :order_id");
    $stmt->bindValue(':order_id', $order_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getOrderByNumber($order_number): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM orders WHERE number = :order_number");
    $stmt->bindValue(':order_number', $order_number);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCountOrdersByPattern($pattern_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM orders WHERE pattern_id = :pattern_id");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserPatterns($user_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users_patterns WHERE creator_id = :user_id ORDER BY created_at DESC");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserPattern($pattern_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users_patterns WHERE id = :pattern_id ORDER BY created_at DESC");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getPattern($pattern_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM patterns WHERE id = :pattern_id");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUser($user_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :user_id");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserFavorites($user_id): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users_favorites WHERE user_id = :user_id ORDER BY users_favorites.created_at DESC");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserFavoritePattern($pattern_id, $pattern_type, $user_id){
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users_favorites WHERE user_id = :user_id AND pattern_id = :pattern_id AND pattern_type = :pattern_type");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->bindValue(':pattern_type', $pattern_type);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/*
 * SQL requests inserting new lines in DB
 *
 */

function setNewContest($data): string
{
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO contests (name, description, theme, start_date, end_date) 
                                    VALUES (:name, :description, :theme, :start_date, :duration)");
    $stmt->bindValue(':name', $data['name']);
    $stmt->bindValue(':description', $data['description']);
    $stmt->bindValue(':theme', $data['theme']);
    $stmt->bindValue(':start_date', $data['start_date']);
    $stmt->bindValue(':duration', $data['duration']);
    $stmt->execute();
    return $dbh->lastInsertId();
}

function setNewContestPattern($pattern_id, $creator_id, $contest_id): string
{
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO contest_patterns (pattern_id, contest_id, creator_id) 
                                    VALUES (:pattern_id, :contest_id, :creator_id)");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->bindValue(':contest_id', $contest_id);
    $stmt->bindValue(':creator_id', $creator_id);
    $stmt->execute();
    return $dbh->lastInsertId();
}

function setNewOrder($data, $user_id): string
{
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO orders (printing_location, reception_code, pattern_id, chocolate_type, chocolate_weight, chocolate_text, chocolate_text_type, user_id) 
                                    VALUES (:printing_location, :reception_code, :pattern_id, :chocolate_type, :chocolate_weight, :chocolate_text, :chocolate_text_type, :user_id)");
    $stmt->bindValue(':printing_location', $data['printing_location']);
    $stmt->bindValue(':reception_code', $data['reception_code']);
    $stmt->bindValue(':pattern_id', $data['pattern_id']);
    $stmt->bindValue(':chocolate_type', $data['chocolate_type']);
    $stmt->bindValue(':chocolate_weight', $data['chocolate_weight']);
    $stmt->bindValue(':chocolate_text', $data['chocolate_text']);
    $stmt->bindValue(':chocolate_text_type', $data['chocolate_text_type']);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $dbh->lastInsertId();
}

function setNewOrderNumber($order_number, $order_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("UPDATE orders SET number = :number WHERE id = $order_id");
    $stmt->bindValue(':number', $order_number);
    $stmt->execute();
}

function setNewPattern($data): string
{
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO patterns (name, description, picture, category) 
                                    VALUES (:name, :description, :picture, :category)");
    $stmt->bindValue(':name', $data['name']);
    $stmt->bindValue(':description', $data['description']);
    $stmt->bindValue(':picture', $data['picture']);
    $stmt->bindValue(':category', $data['category']);
    $stmt->execute();
    return $dbh->lastInsertId();
}

function setNewUser($data): string
{
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO users (first_name, last_name, birth_date, email, password, phone_number)
                                     VALUES (:first_name, :last_name, :birth_date, :email, :password, :phone_number)");
    $stmt->bindValue(':first_name', $data['first_name']);
    $stmt->bindValue(':last_name', $data['last_name']);
    $stmt->bindValue(':birth_date', $data['birth_date']);
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':password', sha1($data['password']));
    $stmt->bindValue(':phone_number', $data['phone_number']);
    $stmt->execute();
    return $dbh->lastInsertId();
}

function setNewUserPattern($data, $user_id): string
{
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO users_patterns (name, description, piece_type, pattern_identifier, category, chocolate_type, chocolate_text, chocolate_text_type, chocolate_weight, creator_id) 
                                    VALUES (:name, :description, :piece_type, :pattern_identifier, :category, :chocolate_type, :chocolate_text, :chocolate_text_type, :chocolate_weight, :creator_id)");
    $stmt->bindValue(':name', $data['pattern_name']);
    $stmt->bindValue(':description', $data['pattern_description']);
    $stmt->bindValue(':piece_type', $data['piece_type']);
    $stmt->bindValue(':pattern_identifier', $data['pattern_identifier']);
    $stmt->bindValue(':category', $data['category']);
    $stmt->bindValue(':chocolate_type', $data['chocolate_type']);
    $stmt->bindValue(':chocolate_text', $data['chocolate_text']);
    $stmt->bindValue(':chocolate_text_type', $data['chocolate_text_type']);
    $stmt->bindValue(':chocolate_weight', $data['chocolate_weight']);
    $stmt->bindValue(':creator_id', $user_id);
    $stmt->execute();
    return $dbh->lastInsertId();
}

function setNewUserFavorite($pattern_id, $pattern_type, $user_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare( "INSERT INTO users_favorites (pattern_id, pattern_type, user_id)
                                     VALUES (:pattern_id, :pattern_type, :user_id)");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->bindValue(':pattern_type', $pattern_type);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
}

/*
 * SQL requests managing login/logout
 *
 */

function authUser($data) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1");
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':password', sha1($data['password']));
    $stmt->execute();
    return $stmt->fetch();
}

function authOut() {
    session_destroy();
}

/*
 * SQL requests managing searchbars
 *
 */

function searchUsers($query): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM users WHERE first_name LIKE '%$query%' OR last_name LIKE '%$query%'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchContests($query): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM contests WHERE name LIKE '%$query%' OR description LIKE '%$query%'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchPatterns($query): array
{
    $dbh = connectDB();
    $stmt = $dbh->prepare("SELECT * FROM patterns WHERE name LIKE '%$query%' OR description LIKE '%$query%'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/*
 * SQL requests updating lines in DB
 *
 */

function updateUser($data, $user_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, birth_date = :birth_date, phone_number = :phone_number, updated_at = :updated_at WHERE id = :user_id");
    $stmt->bindValue(':first_name', $data['first_name']);
    $stmt->bindValue(':last_name', $data['last_name']);
    $stmt->bindValue(':birth_date', $data['birth_date']);
    $stmt->bindValue(':phone_number', $data['phone_number']);
    $stmt->bindValue(':updated_at', date("Y-m-d H:i:s", time()));
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
}

/*
 * SQL requests deleting lines in DB
 *
 */

function delUserFavorite($pattern_id, $pattern_type, $user_id) {
    $dbh = connectDB();
    $stmt = $dbh->prepare("DELETE FROM users_favorites 
                                WHERE (pattern_id = :pattern_id AND pattern_type = :pattern_type AND user_id = :user_id)");
    $stmt->bindValue(':pattern_id', $pattern_id);
    $stmt->bindValue(':pattern_type', $pattern_type);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
}