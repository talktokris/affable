$("#reffLinkDiv").click(function(){
    alert("hi");
});





/*


var test= tronWeb.address.toHex("TYJg7RocvCdwGaWmKbzfdSKi8Hn5nGsdYJ");
//alert("hi");
console.log(test);



/*
console.log("hi");

import { TronWeb } from './tronweb.js';
var fullNode= 'https://api.shasta.trongrid.io';
var solidityNode= 'https://api.shasta.trongrid.io';
var eventServer= 'https://api.shasta.trongrid.io';
var privateKey= '0d7fe39f0d2ca3ce19ccf389eb08cee3841d559f82ac7a5609e7ca927a216ddd';

const tronWeb = new TronWeb(fullNode, solidityNode, eventServer, privateKey)
tronWeb.setHeader({ "TRON-PRO-API-KEY": '99abd4fd-3e17-4cf0-9820-7273e420f4db' });

const newAdd = tronWeb.createAccount();
// kris must commnet
//const TronWeb = require('tronweb')
const HttpProvider = TronWeb.providers.HttpProvider;
const fullNode = new HttpProvider("https://api.shasta.trongrid.io");
const solidityNode = new HttpProvider("https://api.shasta.trongrid.io");
const eventServer = new HttpProvider("https://api.shasta.trongrid.io");
const privateKey = "your private key";
const tronWeb = new TronWeb(fullNode,solidityNode,eventServer,privateKey);
tronWeb.setHeader({"TRON-PRO-API-KEY": '99abd4fd-3e17-4cf0-9820-7273e420f4db'});

var result =tronWeb.isAddress("THEGR4Aor5pCDVktbbbwgHAE6PQWRfejBf");
alert(JSON.stringify(result));

/*
> tronWeb.trx
> tronWeb.transactionBuilder
> tronWeb.utils


//Example 2
const TronWeb = require('tronweb')
const tronWeb = new TronWeb({
    fullHost: 'https://api.trongrid.io',
    headers: { "TRON-PRO-API-KEY": 'your api key' },
    privateKey: 'your private key'
})
*/