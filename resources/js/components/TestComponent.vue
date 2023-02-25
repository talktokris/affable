<script>

//const TronWeb = require('./tronweb'); 
//import { TronWeb } from "./tronweb";

import { defineComponent } from 'vue'

import { defineAsyncComponent } from 'vue'

import vsetting from "../../../vue_setting"

   
import axios from 'axios'
 

const Kris= ["one", "two", "three", "Four"];

 const addressOne = "TYJg7RocvCdwGaWmKbzfdSKi8Hn5nGsdYJ";

 
/*

 const fullNode="https://api.shasta.trongrid.io";
 const solidityNode="https://api.shasta.trongrid.io";
 const eventServer="https://api.shasta.trongrid.io";
 const privateKey="0d7fe39f0d2ca3ce19ccf389eb08cee3841d559f82ac7a5609e7ca927a216ddd";

*/

 const TronWeb = require('tronweb')
const HttpProvider = TronWeb.providers.HttpProvider;
/*
const fullNode = new HttpProvider("https://api.trongrid.io");
const solidityNode = new HttpProvider("https://api.trongrid.io");
const eventServer = new HttpProvider("https://api.trongrid.io");
*/

const fullNode = new HttpProvider(vsetting.fullNode);
const solidityNode = new HttpProvider(vsetting.solidityNode);
const eventServer = new HttpProvider(vsetting.eventServer);
const ApiKey=vsetting.ApiKey;
const privateKey = vsetting.privateKey;
const tronWeb = new TronWeb(fullNode,solidityNode,eventServer,privateKey);

tronWeb.setHeader({"TRON-PRO-API-KEY": ApiKey});

const newHexAddress = tronWeb.address.toHex(addressOne);

//const newAddresCreate = tronWeb.createAccount();

// const newHexAddress = tronWeb.address.toHex(addressOne);

const CONTRACT = "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t" // USDT 

export default {
  name: 'TestComponent',
  data() {
            return {
                fetchingFacts: false,
                balance:null,
                trxBalance:null,
                usdtBalance:null,
              //  transferUSDTRes:null,
            }
        },
        methods: {

          created() {
                      // Simple GET request using axios
                      axios.get("https://api.npms.io/v2/search?q=vue")
                        .then(response => this.balance = response.data.total);
                    },
           async fetchCatFacts() {

             //   const catFactsResponse = await axios.get('https://cat-fact.herokuapp.com/facts/random?animal_type=cat&amount=5')
               // this.catFacts = catFactsResponse.data

               // this.catFacts = addressOne;
               //const getBalance=  tronWeb.trx.getBalance(addressOne);

              // const getNewAddress =  newAddresCreate = tronWeb.createAccount();
              // .then(response => this.balance = response.data.total);

              tronWeb.createAccount().
               this.catFacts = getNewAddress;
            },


            async getTrxBalance() {
           
                const contract = await  tronWeb.trx.getBalance(addressOne);

                this.trxBalance =  tronWeb.fromSun(contract);

            },

           
            async  getUSDTBalance() {

              const CONTRACT = vsetting.usdtContractTest;

                const {
                    abi
                } = await tronWeb.trx.getContract(CONTRACT);

                const contract = tronWeb.contract(abi.entrys, CONTRACT);

                const balance = await contract.methods.balanceOf(addressOne).call();
               // console.log("balance:", balance.toString());

                this.usdtBalance = tronWeb.fromSun(balance);
            },
            async  transferUSDT(destination, amount) {

              const CONTRACT = vsetting.usdtContractTest;

              destination= "T9yYDKWjQNY6SDM1W5J3eHTbKkv1MG7AHz";
              amount =1000;
                const {
                    abi
                } = await tronWeb.trx.getContract(CONTRACT);

                const contract = tronWeb.contract(abi.entrys, CONTRACT);

                const resp = await contract.methods.transfer(destination, amount).send();
              //  console.log("transfer:", resp);
                this.transferUSDTRes = resp.toString();
          }



       
                      
     
        },
        
        async mounted() {
            await this.created(),
            await this.getTrxBalance(),
            await this.getUSDTBalance()
            //,
            // await this.transferUSDT()
            
        }
      
    }

</script>

<template lang="">
    <div>
      <div> {{ balance }}  </div>
      <div> TRX Balance : {{ trxBalance }}  </div>
      
      <div>USDT  {{ usdtBalance }}  </div>
      <div> Transfer USDT : {{ transferUSDTRes}} </div>
    </div>
</template>




<style lang="">
    
</style>