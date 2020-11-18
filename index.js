const express = require('express');
const path = require('path');
const mysql = require('mysql');
const PORT = process.env.PORT || 5000;
const app = express();
//app.use(express.logger());

//mysgl
var connection = mysql.createConnection({
  host     : 'us-cdbr-east-02.cleardb.com',
  user     : 'b5e5dcb1e803f4',
  password : 'a90bd23e',
  database : 'heroku_de162b651ed5bf0'
});

//connection.connect();



//webpage
app.get('/', (req, res) => {
	res.sendFile(path.join(__dirname+'/public/index.html'));
	console.log(req.params);
});

app.get('/:folder/:file', (req, res) => { res.sendFile(path.join(__dirname+'/public/'+req.params.folder+'/'+req.params.file)); });
app.get('/:folder/:folder2/:file', (req, res) => { res.sendFile(path.join(__dirname+'/public/'+req.params.folder+'/'+req.params.folder2+'/'+req.params.file)); });

app.post('/generate_url/', (req, res) => {
  res.send("generated");
  console.log("post");
  console.log(req);
  console.log(res);
});


app.get('/mysql', (req, res) => {
	res.send("Hello");
});


/*app.get('/mysql', function(request, response) {
  connection.query('SELECT * FROM urls', function(err, rows, fields) {
      if (err) {
        console.log('error: ', err);
        throw err;
      }
      response.send(['Hello World!!!! HOLA MUNDO!!!!', rows]);
    });
});*/


app.listen(PORT, () => {
	console.log("Listening on " + PORT);
});
