CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255),
    last_name VARCHAR(255) NOT NULL,
    birth_year YEAR NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    birth_place VARCHAR(255) NOT NULL,
    nationality VARCHAR(255) NOT 255,
    legal_representative1 VARCHAR(255) NOT NULL,
    legal_representative2 VARCHAR(255),
    legal_representative3 VARCHAR(255),
    town VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    postal_code VARCHAR(255) NOT NULL,
    region VARCHAR(255) NOT NULL,
    class TINYINT NOT NULL CHECK (class BETWEEN 1 AND 9),
    insert_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE case (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description VARCHAR(500),
    student_id INT,
    contact_ospod TINYINT(1) DEFAULT 0,
    ospod_timestamp TIMESTAMP,
    contact_parents TINYINT(1) DEFAULT 0,
    parents_timestamp TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES zaci(id_zaka)
);