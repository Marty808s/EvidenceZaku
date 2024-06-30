<?php
require_once __DIR__ . '/boxes.php';

// Připojíme se na DB
$servername = "database";
$username = "admin";
$password = "heslo";
$database = "evidence_zaku";

// Připojení na DB - working
$db_conn = new mysqli($servername, $username, $password, $database);

if ($db_conn -> connect_error){
    echo "Chyba připojení na DB";
    errorBox("Chyba připojení na DB", true);
}
else {
    infoBox("Připojení na databázi je úspěšné!", true);
}

// Posílání dotazů na DB - s parametry $sql - to je dotaz, na něj navážu parametry přes bind_param
function dbQuery($sql, $params = []) {
    global $db_conn;

    $stmt = $db_conn->prepare($sql);

    //proběhla příprava úspěšně? existuje tabulka?...atd..
    if (!$stmt) {
        error_log("Chyba při přípravě dotazu: " . $db_conn->error);
        return false;
    }

    // pokud nezadám parametry ani dotaz - dochází k navazáí parametrů na dotaz
    if ($params && $stmt->bind_param(str_repeat("s", count($params)), ...$params) === false) {
        error_log("Chyba při vázání parametrů: " . $stmt->error);
        return false;
    }

    // pokud se nevykoná dotaz
    if ($stmt->execute() === false) {
        error_log("Chyba při vykonávání dotazu: " . $stmt->error);
        return false;
    }

    // získání výsledků
    $result = $stmt->get_result();
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC); 
    } else {
        return []; 
    }
}

function addStudent($first_name, $middle_name, $last_name, $birth_year, $gender, $birth_place, $nationality, $legal_representative1, 
                    $legal_representative2, $legal_representative3, $town, $street, $postal_code, $region, $class){

    global $db_conn;

    $params = [$first_name, $middle_name, $last_name, $birth_year, $gender, $birth_place, $nationality, $legal_representative1, $legal_representative2, $legal_representative3, 
                $town, $street, $postal_code, $region, $class];

    $sql = "INSERT INTO students (first_name, middle_name, last_name, birth_year, gender, birth_place, nationality, legal_representative1, legal_representative2, legal_representative3, town, street, postal_code, region, class) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $task = dbQuery($sql, $params);

    if ($task) {
        sucessBox("Student byl spěšně přidán!", true);
    }
    else {
        errorBox("Student nebyl přidán!", true);
    }
}