

/*
$("#reffLinkDiv2").click(function(){
    alert("hi");
});

$("#reffLinkDiv").click(function(){
    alert("Mouse up over p1!");
  });
*/



function reffCopy(){

    var reffLink = document.getElementById('reff-link-value').value ;
   
    var element = document.getElementById('reff-link-value') ;
    element.classList.add("top-input-selected");
 
    setTimeout(function(){ 
            element.classList.remove("top-input-selected");
    }, 1000);  
  
    navigator.clipboard.writeText(reffLink);


}

function walletCopy(){

    var walletLink = document.getElementById('wallet-address').value ;
    var element = document.getElementById('wallet-address') ;
    element.classList.add("top-input-selected");

    setTimeout(function(){ 
        element.classList.remove("top-input-selected");
    }, 1000);  
 navigator.clipboard.writeText(walletLink);

}


function withdrawal(cashoutPercentage, minWithAmount){

var  balanceAmt  = parseInt(document.getElementById('balance-amount').value);

var reDisPer = 100 - cashoutPercentage;
var withdrawalAmt = parseInt(document.getElementById('withdrawal-amount').value);
//alert(balanceAmt+'-'+withdrawalAmt);
 if(withdrawalAmt < minWithAmount){

    document.getElementById('error-div').innerHTML= '<div class="alert alert-danger message_alert" role="alert">Withdrawal amount should not be higher than balance amount.</div>';
    var element = document.getElementById('withdrawal-btn') ;
    element.classList.add("hideBtn");

} else if(withdrawalAmt==0){

    document.getElementById('error-div').innerHTML= '<div class="alert alert-danger message_alert" role="alert">Withdrawal amount should not be higher than balance amount.</div>';
    var element = document.getElementById('withdrawal-btn') ;
    element.classList.add("hideBtn");
   
} else if(withdrawalAmt<=balanceAmt){

    document.getElementById('error-div').innerHTML= '';
    var cashoutAmt = perCalculate(withdrawalAmt, cashoutPercentage);
    document.getElementById('cashout-amount').value = cashoutAmt;
    var redistibutionAmt  = perCalculate(withdrawalAmt, reDisPer);
    document.getElementById('redistribution-amount').value= redistibutionAmt;

    var element = document.getElementById('withdrawal-btn') ;
    element.classList.remove("hideBtn");

} 
else {

    document.getElementById('error-div').innerHTML= '<div class="alert alert-danger message_alert" role="alert">Withdrawal amount should not be higher than balance amount.</div>';
    var element = document.getElementById('withdrawal-btn') ;
    element.classList.add("hideBtn");
}

}

function perCalculate(amount, per){

    var perAmount = amount/100 * per;
    return perAmount.toFixed(2);
}


