var request = require('request');

var options = {
  url: 'https://api.github.com/users',
  // url: 'https://api.github.com/users/carlossarda',
  headers: {
    'User-Agent': 'carlossarda'
  }
};

function callback(error, response, body) {
  if (!error && response.statusCode == 200) {
    var info = JSON.parse(body);
    console.log(info);
    
  }else{
    console.log(response.statusCode);
  }
}

request(options, callback);