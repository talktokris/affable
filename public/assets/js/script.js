

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


function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

$(document).ready(function(){

    var form = '#withdrawal-form';

    $(form).on('submit', function(event){
        event.preventDefault();

   
   var crfsToken =$('input[name=_token]').val();
   var urlGet = $("#url-action").val();
  
   var totalAmount = $("#balance-amount").val();
   var withdrawalAmount = $("#withdrawal-amount").val();

   var balanceAmount = totalAmount - withdrawalAmount;


 // var withdrawalAmount= 6000;
   

        $.ajax({
            url: urlGet, 
            type: "POST",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({ '_token': crfsToken, 'withdrawal-amount': withdrawalAmount }),
            success: function (result) {
                // when call is sucessfull
                //alert(result);
                console.log(result);
                if(result.status=='error') {

                var innerDiv = '<div class="alert alert-danger message_alert" role="alert">'+result.message+'</div>';
                $("#error-div").html(innerDiv);
                }

                if(result.status=='success'){

                    var innerDiv = '<div class="alert alert-success message_alert" role="alert">'+result.message+'</div>';
                    $("#error-div").html(innerDiv);

                    
                    $("#withdrawal-amount").val(0);
                    $("#redistribution-amount").val(0);
                    $("#cashout-amount").val(0);
                    $("#balance-amount").val(balanceAmount);
                    $("#user-ac-balance").val(balanceAmount);
                    
                    var element = document.getElementById('withdrawal-btn') ;
                    element.classList.add("hideBtn");
                    
                }
             },
             error: function (err) {
             // check the err for error details
            //
            
            // alert(err);
             console.log(err);

             }
          }); // ajax call closing

       
        });
    });



/*

$(function(){
    $("#withdrawal-form").on("submit", function(event) {


        event.preventDefault();

        var formData = {
            'email': $('input[name=withdrawal-amount]').val(),//for get email 
            '_token': $('input[name=_token]').val(), //for get email 
        };
       // console.log(formData);

        $.ajax({
           
            url: "/withdrawal-ajex",
            type: "post",
            data: formData,
          
            success: function(d) {
               // alert(d);

               $("#error-div").html(d)
              //  console.log(d);
            }
        });
    });
}) 



$("#withdrawal-btn").click(function(){

    var data ={"name":"Krishna", "id":5};

    $("#error-div").html("hi");

    $.ajax({
        type:'POST',
        url:'/withdrawal-ajex',
        data:"_token = <?php echo csrf_token() ?>",
        success:function(data) {
           $("#error-div").html(data);
        }
     });

});

/*
$(document).ready(function(){
    $("#withdrawal-form").submit( function () {    
      $.post(
       'withdrawal-ajex',
        $(this).serialize(),
        function(data){
          $("#error-div").html(data)
        }
      );
      return false;   
    });   
});

/*
$("withdrawal-form").submit(function(e){
    e.preventDefault();
});

/*
$("withdrawal-form").submit(function(e){
    e.preventDefault();

    alert("hi3");
});




$("withdrawal-form2").submit(function(e){
    e.preventDefault();
    alert("Hi");
})


    //option A
    $("withdrawal-form").mouseover(function(e){
        e.preventDefault(e);
        alert('submit intercepted');
    });



$(document).on("withdrawal-form", "form", function(e){
 e.preventDefault();
    alert('it works!');
    return  false;
});

*/

