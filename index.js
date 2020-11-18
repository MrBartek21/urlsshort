const express = require('express');
const path = require('path');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const http = require('http');

const PORT = process.env.PORT || 5000;
const app = express();
//app.use(express.logger());

//mysgl
var ConnectMySql = mysql.createConnection({
  host     : 'us-cdbr-east-02.cleardb.com',
  user     : 'b5e5dcb1e803f4',
  password : 'a90bd23e',
  database : 'heroku_de162b651ed5bf0'
});

ConnectMySql.connect();

app.use(bodyParser.urlencoded({extended: false}));

//webpage
app.get('/', (req, res) => { res.sendFile(path.join(__dirname+'/public/index.html')); });
app.get('/:folder/:file', (req, res) => { res.sendFile(path.join(__dirname+'/public/'+req.params.folder+'/'+req.params.file)); });
app.get('/:folder/:folder2/:file', (req, res) => { res.sendFile(path.join(__dirname+'/public/'+req.params.folder+'/'+req.params.folder2+'/'+req.params.file)); });


app.post('/generate_url/', (req, res) => {
  var url = req.body.urlinput;
  res.send("generated");
  console.log("generated "+url);

  http.get('http://names.drycodes.com/1?nameOptions=funnyWords&format=json', (resp) => {
    let data = '';

    resp.on('data', (chunk) => { data += chunk; });
    resp.on('end', () => {
      console.log(JSON.parse(data).explanation);
    });
  }).on("error", (err) => {
    console.log("Error: " + err.message);
  });


  ConnectMySql.connect(function(err) {
    if (err) throw err;
    console.log("MySQL Connected!");

    var sql = "INSERT INTO urls (Name, Link, ShortName) VALUES ('Test', '"+url+"', '"+shortname+"')";

    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("1 record inserted, ID: " + result.insertId);
    });


  });

  /*connection.query('SELECT * FROM urls', function(err, rows, fields) {
    if (err) {
      console.log('error: ', err);
      throw err;
    }
    response.send(['Hello World!!!! HOLA MUNDO!!!!', rows]);
  });*/
});


app.get('/mysql', (req, res) => {
	res.send("Hello");
});

app.listen(PORT, () => {
	console.log("Listening on " + PORT);
});
