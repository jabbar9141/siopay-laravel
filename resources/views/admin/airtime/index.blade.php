@extends('admin.app')
@section('page_title', 'Home')
@section('content')
    <style>
        .card {
            height: 100%;
        }

        /* Style for the card container */
        .trans {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect */
        .trans:hover::before {
            opacity: 1;
        }

        .trans:hover.trans {
            transform: scale(1.08);
            /* Adjust the scale value for the zoom effect */
        }
        
        
        
     .select2-selection__rendered {
    line-height: 50px !important;
}
.select2-container .select2-selection--single {
    height: 50px !important;
}
.select2-selection__arrow {
    height: 50px !important;
}

.error{
    color: red;
}

.showAmount{
    
    display:none;
}       
        
    </style>

       
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Welcome, {{ Auth::user()->name }}</h5>

                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class=" p-3">

                        <div class="p-2 space-y-2">
                            <h1 class="font-bold">Select Network Provider Country</h1>
                            <select name="country" id="country" class="w-full p-3 bg-gray-300 rounded-lg">
                                
                                <option></option>
                            </select>
                        </div>

                        <div class="p-2 space-y-2" id="dataplans">
                            <h1 class="font-bold">Select Product Type</h1>
                            <select class="w-full p-3 bg-gray-300 rounded-lg product_type">
                                
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2" >

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Operator</h1>
                                <select  class="w-full p-3 bg-gray-300 rounded-lg " id="operator">
                                  
                                </select>
                            </div>
                            
                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Package</h1>
                                <select id="operator_package" class="w-full p-3 bg-gray-300 rounded-lg">
                                  
                                </select>
                                <span class="error" id="operatormsg"></span>
                            </div>

                            
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">
                            
                            <div class="p-2 space-y-2 showAmount">
                                <h1 class="font-bold">Amount</h1>
                                <input placeholder="08123456789" class="w-full p-3 bg-gray-300 rounded-lg" id="flexamount"/>
                                
                                <span class="error"></span>
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Enter Recipient Phone Number</h1>
                                <input placeholder="08123456789" type="tel" id="phoneNumber" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 flex justify-end items-center">
                                <button type="submit" id="btnirech" class="bg-blue-400 text-white p-2 px-4 rounded-lg">SEND</button>
                            </div>

                        </div>


                    </div>

                </div>

                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class="flex justify-between p-3">

                        <h1 class="font-bold">Transaction details</h1>

                        <div class="flex space-x-3">

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                        <path stroke-miterlimit="10"
                                            d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                        <path stroke-linejoin="round"
                                            d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                    </g>
                                </svg>
                            </button>

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M12 16.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3" />
                                    </g>
                                </svg>
                            </button>

                        </div>

                    </div>

                    <div class="rounded-lg overflow-x-auto">
                        <table class="min-w-full ">
                            <thead class="">
                                <tr>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Transaction ID
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Service</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Phone Number
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Amount</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Date Uploaded
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 overflow-y-auto h-20">
                                <!-- Example row -->
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">123456789</td>
                                    <td class="w-auto text-left py-3 px-4">Example Service</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                    <td class="w-auto text-left py-3 px-4">Example Description</td>
                                    <td class="w-auto text-left py-3 px-4">$100.00</td>
                                    <td class="w-auto text-left py-3 px-4">Completed</td>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                </tr>
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">123456789</td>
                                    <td class="w-auto text-left py-3 px-4">Example Service</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                    <td class="w-auto text-left py-3 px-4">Example Description</td>
                                    <td class="w-auto text-left py-3 px-4">$100.00</td>
                                    <td class="w-auto text-left py-3 px-4">Completed</td>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                </tr>
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">123456789</td>
                                    <td class="w-auto text-left py-3 px-4">Example Service</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                    <td class="w-auto text-left py-3 px-4">Example Description</td>
                                    <td class="w-auto text-left py-3 px-4">$100.00</td>
                                    <td class="w-auto text-left py-3 px-4">Completed</td>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                </tr>
                                <!-- More rows can go here -->
                            </tbody>
                        </table>
                    </div>

                </div>

                {{-- --}}
                
      <!-- Global Airtime -->  
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js" integrity="sha256-9AtIfusxXi0j4zXdSxRiZFn0g22OBdlTO4Bdsc2z/tY=" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>    
      
        <script>
    
   let naira = new Intl.NumberFormat('en-NG', {
    style: 'currency',
    currency: 'NGN',
});
   

  //$('#amt').prop("readonly",true);
  $("#btnirech").prop("disabled",true);

            const inst = axios.get("https://api.epins.com.ng/v2/autho/international-recharge/countries/").then(function(response){
               //console.log(response); 
               var CountryArr = response.data.description.countries;
               if(CountryArr.length > 0){
                $('.countrylist').empty();
                for ( var i in CountryArr){
                CountryList  = "";   
                CountryList += '<option data-code="'+CountryArr[i].code+'", data-flag="'+CountryArr[i].flag+'", data-prefix="'+CountryArr[i].prefix+'", data-currency="'+CountryArr[i].currency+'"> '+CountryArr[i].name+' </option>';

                $('#country').append(CountryList);    
                }
               } }); 
    

  function formatCountry (country) {
  if (!country.id) {
    return country.text;
  }
  var LogoUrl = $(country.element).attr('data-flag');
  var country = $(
    '<span><img width="20" height="20" src="' + LogoUrl + ' " /> ' + country.text + '</span>'
  );
  return country;
}


  function formatOperator (operator) {
  if (!operator.id) {
    return operator.text;
  }
  var OperatorLogoUrl = $(operator.element).attr('data-image');
  var operator = $(
    '<span><img width="25" height="20" src="' + OperatorLogoUrl + ' " /> ' + operator.text + '</span>'
  );
  return operator;
}

$("#country").select2({
 placeholder: 'Select Country',
  templateResult: formatCountry,
  //theme: "classic"
  
}).on('change', function(e) {
    var countryCode = $("#country option:selected").attr('data-code');
    var phonePrefix = $("#country option:selected").attr('data-prefix');
    var countryCurrency = $("#country option:selected").attr('data-currency');
    var countryFlag = $("#country option:selected").attr('data-flag');
    var countryName = $("#country option:selected").text();
   // $("#countryId").val(countryCode);
   
    localStorage.setItem("countyId",countryCode);
    localStorage.setItem("prefix",phonePrefix);
    localStorage.setItem("currency",countryCurrency);
    localStorage.setItem("flag",countryFlag);
    localStorage.setItem("countryName",countryName);
    
   $("#phoneNumber").val('');
    // fetch products by country
    const instProd = axios.get("https://api.epins.com.ng/v2/autho/international-recharge/product-types/?code="+countryCode+"").then(function(resp){
              //console.log(resp); 
             var ProductArr = resp.data.description.products;
             ProductList  = ""; 
            
              if(ProductArr.length > 0){
                //$('.product_type').empty();
             for (let a = 0; a < ProductArr.length; a++){
              ProductList += '<option></option>';
              ProductList += '<option value="'+ProductArr[a].product_type_id+'">'+ProductArr[a].name+' </option>';
             $('.product_type').html(ProductList); 
             
             } } else {
              //$(".msg").html('<div class="spinner"></div>'); 
             }
             
             }); 
    
    //end product fetch
    
  });
  
  
  
  // Select Operator
           $(".product_type").select2({
          placeholder: 'Select Product type',    
               
           }).on('change',function(e){
             // $('.prov').css('display','block');
              var productidObj = $(this).val();
             //$("#pid").val(productidObj);
             localStorage.setItem("productId",productidObj);
             var countryId =  localStorage.getItem("countyId");
             axios.get("https://api.epins.com.ng/v2/autho/international-recharge/operators/?code="+countryId+"&product_id="+productidObj+"").then(function(resopera){ 
             
             //console.log(resopera);
             
                 var operaArr =  resopera.data.description.operators;
                
                 // $(".msg").html(''); 
                  $('#operator').empty();
                 for(var a in operaArr){
                   
                 listOpera = ""; 
                 listOpera += '<option></option>';
                 listOpera += '<option data-id="'+operaArr[a].operator_id+'", data-image="'+operaArr[a].operator_image+'", data-opname="'+operaArr[a].name+'">'+operaArr[a].name+' </option>';
         
                $('#operator').append(listOpera); 
                 
                 } 


             });
            });
            
    
  
    $("#operator").select2({
             placeholder: 'Select Operator',
              templateResult: formatOperator,
              //theme: "classic"
              
            }).on('change', function(e){
              
              var operatorId = $("#operator option:selected").attr('data-id');
               var pidObj = localStorage.getItem("productId");
               var Opera_Name = $("#operator option:selected").text();
              //console.log(operatorId);
              //console.log(Opera_Name);
              localStorage.setItem("operatorId",operatorId);
              localStorage.setItem("operatorName",Opera_Name);
              localStorage.setItem("operaLogo",$("#operator option:selected").attr('data-image'));
             // get operator packages
                   const instpackage = axios.get('https://api.epins.com.ng/v2/autho/international-recharge/variations/?operator_id='+operatorId+'&product_id='+pidObj+'').then(function(datavar){ 
                      //console.log(datavar);
                    var packaArr =  datavar.data.description.variations;
                    if(packaArr.length > 1){
                    //$(".showPackage").css("display","block");
                    for( let x = 0, n = packaArr.length; x < n; x++){
                      packlist = ""; 
                     for ( let j = 0; j < packaArr[x].length; j++){
                   packlist += '<option></option>';
                    packlist += '<option data-code="'+packaArr[x][j].variation_code+'", data-amount="'+packaArr[x][j].variation_amount+'", data-fxp="'+packaArr[x][j].fixedPrice+'">'+packaArr[x][j].name+' </option>';
                   $('#operator_package').html(packlist); 
                   
                   //const minim = ;
                   //const maxi = ;
                  
                   localStorage.setItem("min",packaArr[x][j].variation_amount_min);
                   
                   localStorage.setItem("max",packaArr[x][j].variation_amount_max);
                   
                   //var var_rate = ;
                   localStorage.setItem("xrate",parseFloat(packaArr[x][j].variation_rate).toFixed(2))
                   
                   
                // $("#xrate").val(var_rate);
                   //   $("#mini").val(minim);
                     // $('#maxi').val(maxi);
                  
                     }
                    
                   } } else { 
                    //$(".showPackage").css("display","none");
                    $("#operatormsg").html('Oops!! This service is unavailable');
                  }

                   });  
             
                  /// end operator packages 
              
//******************************//   
            });
            
     $("#operator_package").select2({
     placeholder: 'Select Package',
     
     }).on('change',function(e){
      var fixAmount = $("#operator_package option:selected").attr('data-amount');
     var fxprice = $("#operator_package option:selected").attr('data-fxp'); 
     
     var varcode = $("#operator_package option:selected").attr('data-code');
      localStorage.setItem("vcode",varcode);
      
      var minimum = localStorage.getItem("min");
      var maximum = localStorage.getItem("max");
      localStorage.setItem("fixed",fxprice);
      localStorage.setItem("fixedamount",fixAmount);
      
        switch (fxprice){
                    case "No":
                      $('.error').html('Enter amount between '+minimum+' - '+maximum+' ');  
                      $(".showAmount").css("display","block");
                      
                      break;
                      case "Yes":
                        $(".showAmount").css("display","none");
                       
                        break;
                        default:
                   }
     
     });       
            

$("#phoneNumber").keyup(function(){
    var prefix = localStorage.getItem("prefix");

    if(this.value.indexOf(prefix) !== 0 ){
        this.value = prefix + this.value;
    }
    
  if($(this).val().toString().length > 8){
   $("#btnirech").prop("disabled",false);   
  }  
});


 // Process order

                 var  submitBtn = document.getElementById("btnirech");
                 if(submitBtn){
                  submitBtn.addEventListener('click',function(e){
                    var checkFixed = localStorage.getItem("fixed");
                    
                    switch (checkFixed){
                    case "No":
                      var TopAmount = $("#flexamount").val();
                      break;
                      case "Yes":
                        var TopAmount = localStorage.getItem("fixedamount");
                        break;
                        default:
                   }
                    
                    var product_id = localStorage.getItem("productId");
                    var varCode = localStorage.getItem("vcode");
                    var produt_amount = TopAmount;
                    var phoneNumber = $('#phoneNumber').val();
                    var token = $('#token').val();
                    var xchangeRate = localStorage.getItem("xrate");
                    var flagUrl = localStorage.getItem("flag");
                    var CountryName = localStorage.getItem("countryName");
                    var OperatorId = localStorage.getItem("operatorId");
                    var CurrencySymbol = localStorage.getItem("currency");
                    var CountryId =  localStorage.getItem("countyId");
                    
                    var opera_logo = localStorage.getItem("operaLogo");
                    var operaName = localStorage.getItem("operatorName");
                    
                    var NairaRate = (xchangeRate * produt_amount);
                    
                    var fee = 0;
                   // 
                   
                
                    var rdm = 'Ir'+Math.floor(Math.random()*1E16);

                    var JsObj = JSON.stringify({
                       
                       productId:product_id,
                       variationCode:varCode,
                       productAmount:produt_amount,
                       userId: token,
                       amount_naira: NairaRate,
                       country_code: CountryId,
                       country_flag: flagUrl,
                       currency: CurrencySymbol,
                       operator_name: operaName,
                       operator_logo: opera_logo,
                       operator_id: OperatorId,
                       phone: phoneNumber
                     });  
                    
                    if(phoneNumber === ""){  $('#phoneNumber').focus();  return false; } 
                     
               $.post('formrequest/ini_foreign_airtime.php',JsObj,function(response){
                
                if(response.status === true){
               
                          // pop confirm
                    Swal.fire({
  title: "Confirm Your Transaction",
  icon: "",
  html: `<img src=`+flagUrl+` /> <h1>`+CountryName+`</h1> <hr> 
 
 <div class="container"> 
<div class="row d-flex justify-content-between">
 <div class="col-xs-12">Network:</div>
 <div class="col-md-6 flex-end"><span><img src=`+opera_logo+`/></span></div>
</div>

<div class="row mt-3 d-flex justify-content-between">
 <div class="col-xs-12">Phone Number:</div>
 <div class="col-md-6 flex-end">+`+phoneNumber+`</div>
</div>

<div class="row mt-3 d-flex justify-content-between">
 <div class="col-xs-12">Transaction Fee:</div>
 <div class="col-md-6 flex-end">`+naira.format(fee)+`</div>
</div>

<div class="row mt-3 d-flex justify-content-between">
 <div class="col-xs-12">Amount:</div>
 <div class="col-md-6 flex-end"><span>`+CurrencySymbol+`</span>`+produt_amount+`</div>
</div>

<div class="row mt-3 d-flex justify-content-between">
 <div class="col-xs-12">Total payable in Naira:</div>
 <div class="col-md-6 flex-end">`+naira.format(NairaRate)+`</div>
</div>

<div class="row mt-3 d-flex justify-content-between">
 <div class="col-xs-12">Reference:</div>
 <div class="col-md-6 flex-end">`+response.requestId+`</div>
</div>

</div>

  `,
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText: `
    <i class="fa fa-credit-card"></i> Send
  `,
  confirmButtonAriaLabel: "Thumbs up, great!",
  cancelButtonText: `
    <i class="fa fa-thumbs-down"></i>
  `,
  cancelButtonAriaLabel: "Thumbs down"
  
}).then((result) => {
    
    if (result.isConfirmed) {
 var refId = response.requestId;

$.post("formrequest/buy_airtime_int.php",{id:refId},function(datas){
    
  //console.log(datas);
  
Swal.fire("Saved!", "", "success");  
    
},'json');


        
  } else if (result.isDenied) {
    Swal.fire("Changes are not saved", "", "info");
  }
   
});
                    // end pop confirm 
                    
                    
                } else {
            
            
            const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  background: "#eb3d34",
  iconColor: "#fff",
  color: "#fff",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: response.msg
});        
                    
                }
                   
               },'json');    
                   
                    
         

                  });
                 }

                
            </script>   
      
      <!--End Global Airtime-->
                
                
                
                

            </div>
        </div>
    </div>
    </div>
@endsection
