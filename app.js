var express = require("express");
var mysql      = require('mysql');
var app = express();
app.use(express.logger());

var connection = mysql.createConnection({
  host     : 'us-cdbr-east-02.cleardb.com',
  user     : 'b5e5dcb1e803f4',
  password : 'a90bd23e',
  database : 'heroku_de162b651ed5bf0'
});

connection.connect();

app.get('/', function(request, response) {
  connection.query('SELECT * from t_users', function(err, rows, fields) {
      if (err) {
        console.log('error: ', err);
        throw err;
      }
      response.send(['Hello World!!!! HOLA MUNDO!!!!', rows]);
    });
});

var port = process.env.PORT || 5000;
app.listen(port, function() {
  console.log("Listening on " + port);
});