const mysql = require('mysql2');

// DB Connection
let connection = mysql.createConnection({
    host: "192.168.1.3",
    // host: "localhost",
    user: "convidado",
    password: "12345",
    database: "mytodos",
    port: 3306
});

// connection response 
connection.connect(function (err) {
    if (err) throw err;
    console.log("Connected to MySQL database!");
});

   
module.exports.connection = connection;
module.exports.mysql=mysql;

