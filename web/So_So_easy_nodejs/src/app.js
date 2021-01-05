const express = require('express');
const bodyParser = require('body-parser')
const cookieParser = require('cookie-parser');
const path = require('path');

const fs = require('fs');
const crypto = require('crypto');
const keys = "password"
function md5(s) {
    return crypto.createHash('md5')
      .update(s)
      .digest('hex');
}

const isObject = obj => obj && obj.constructor && obj.constructor === Object;

function merge(a, b) {
    for (var attr in b) {
        if (isObject(a[attr]) && isObject(b[attr])) {
            merge(a[attr], b[attr]);
        } else {
            a[attr] = b[attr];
        }
    }
    return a
}

function clone(a) {
    return merge({}, a);
}

// Constants
const PORT = 80;
const HOST = '0.0.0.0';
const admin = {};

// App
const app = express();
app.use(bodyParser.json())
app.use(cookieParser());

app.get('/', function (req, res) {
    res.send("hint: /source");
});

app.post('/action', (req, res) => {
    var body = JSON.parse(JSON.stringify(req.body));
    var copybody = clone(body)
    console.log("copybody "+copybody)
    if (copybody.name) {
        res.cookie('name', copybody.name).json({
            "done": "cookie set"
        });
    } else {
        res.json({
            "error": "cookie not set"
        })
    }
});
app.post('/flag', (req, res) => {
    var PTT0 = JSON.parse(JSON.stringify(req.cookies))
    const {wendell, whiskey} = req.body;
    
    if (wendell && whiskey && wendell.length === whiskey.length && wendell!==whiskey && md5(wendell+keys[0]) === md5(whiskey+keys[0]) && admin.PTT0 == 1) {
        res.send("this is your flag: "+process.env.flag);
        process.exit(1);
    } else {
        res.send("You are not authorized");
    }
});

app.get('/source', function (req, res) {
    res.set('Content-Type', 'text/javascript;charset=utf-8');
    res.send(fs.readFileSync('./app.js'));
});

app.listen(PORT, HOST);
console.log(`Running on http://${HOST}:${PORT}`);