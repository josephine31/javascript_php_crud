CREATE TABLE EMP (
    Empid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    First_name VARCHAR(50) NOT NULL,
    Middle_name VARCHAR(50) NOT NULL,
    Last_name VARCHAR(50) NOT NULL,
    DOB DATE NOT NULL,
    Gender CHAR(1) NOT NULL,
    Basic INT(11) NOT NULL,
    Allowance INT(11) NOT NULL,
    Deduction INT(11) NOT NULL,
    Net_sal INT(11) NOT NULL,
    CHECK(Gender in ('M','F'))
);