var mysql = require('mysql');
var config = require('./config.json');
const AWS = require('aws-sdk');

var pool  = mysql.createPool({
  host     : config.DBhost,
  user     : config.DBuser,
  password : config.DBpassword,
  database : config.DBname
});

exports.handler =  (event, context, callback) => {
  //prevent timeout from waiting event loop
  context.callbackWaitsForEmptyEventLoop = false;

  pool.getConnection(function(err, connection) {
     var messageID = event.Records[0].Sns.MessageId;
    var message = event.Records[0].Sns.Message;

    sql ="INSERT INTO Messages (messageID, message) VALUES ?";
    var values = [[messageID, message]];


    // Use the connection
    connection.query(sql, [values], function (error, result) {
      // And done with the connection.
      connection.release();
      // Handle error after the release.
      if (error) callback(error, null);
      else callback(null, result.affectedRows);
    });
  });
};
