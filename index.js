const express = require('express');
const path = require('path');
const mysql = require('mysql');
const request = require('request');
const bodyParser = require('body-parser');

const PORT = process.env.PORT || 5000;
const app = express();

const NameGenerator = 'http://names.drycodes.com/1?nameOptions=funnyWords&format=text';
let options = {json: true};


//MySQL
var db_config = {
  host: 'us-cdbr-east-02.cleardb.com',
    user: 'b5e5dcb1e803f4',
    password: 'a90bd23e',
    database: 'heroku_de162b651ed5bf0'
};

var connection;
function handleDisconnect() {
  connection = mysql.createConnection(db_config);
  connection.connect(function(err) {
    if(err) {
      console.log('error when connecting to db:', err);
      setTimeout(handleDisconnect, 2000);
    }
  });
  connection.on('error', function(err) {
    console.log('db error', err);
    if(err.code === 'PROTOCOL_CONNECTION_LOST') {
      handleDisconnect();
    } else {
      throw err;
    }
  });
}
handleDisconnect();



app.use(bodyParser.urlencoded({extended: false}));

//WebPages
app.get('/', (req, res) => { res.sendFile(path.join(__dirname+'/public/index.html')); });
app.get('/s', (req, res) => { res.sendFile(path.join(__dirname+'/public/index.html')); });
app.get('/:folder/:file', (req, res) => { res.sendFile(path.join(__dirname+'/public/'+req.params.folder+'/'+req.params.file)); });
app.get('/:folder/:folder2/:file', (req, res) => { res.sendFile(path.join(__dirname+'/public/'+req.params.folder+'/'+req.params.folder2+'/'+req.params.file)); });

app.post('/generate_url', (req, res) => {
  var url = req.body.urlinput;
  var name= "Test";
  res.send('<script>location.replace("s")</script>');

  request(NameGenerator, options, (error, res, body) => {
    if (error) { return  console.log(error) };
    if (!error && res.statusCode == 200) {
        console.log("New Link: "+url+" | ShortName: "+body+" | Name: "+name);
        var sql = "INSERT INTO urls (Name, Link, ShortName) VALUES ('"+name+"', '"+url+"', '"+body+"')";
        connection.query(sql, function (err, result) {
          if (err) throw err;
          console.log("1 record inserted, ID: " + result.insertId);
        });
    };
  });
});


app.listen(PORT, () => {
	console.log("Listening on " + PORT);
});
