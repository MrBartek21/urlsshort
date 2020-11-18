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
	//res.sendFile(path.join(__dirname+'/public/index.html'));
	console.log(req.params);
	
	res.sendFile('public/index.html', {root: path.join(__dirname, './')})
});

app.get('/:folder/:file', (req, res) => {
	console.log(req.params);
	//res.sendFile(path.join(__dirname+'/public/CSS/.*.css'));
});
//app.get('/Graphic/*', (req, res) => { res.sendFile(path.join(__dirname+'/public/Grarphic/*')); });


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
