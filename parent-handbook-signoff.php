<?php 
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Parent Handbook Sign-Off Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css">
   
<link href="css/jquery-ui.min.css" rel="stylesheet" />

    <style>
    .custom-checkbox .custom-control-label::before {
	    border: 1px solid black !important;
    }
	
    .custom-checkbox .required:before {
	    border: 1px solid #e60000 !important;
	    box-shadow: 0px 0px 8px red !important;
    }

</style>

</head>
<body>

  <div class="container my-5">
  

    <div class="row">

      <div class="col-12">
        <div class="cards p-3">


          <div class="title">
            <div class="row">
              <div class="col-12 col-lg-2 text-center text-lg-left">
                <img src="img/index-logo.png" alt="" width="80">
              </div>
              <div class="col-12 col-lg-10 text-center">
                <div class="content">
                  <h1 class="font_bold">Beaufort Jasper EOC Head Start</h1>
                  <h1>Parent Handbook Sign-Off Form  </h1>
                </div>
              </div>
            </div>
          </div>


  
          <!-- <div class="row border-bottom  border-dark py-3">
            

            <div class="col-12 col-lg-12">
              <div class="header text-center">
                <img src="img/pdf-13/logo-13.jpg" alt=""><br>
                <h4>
              Beaufort Jasper EOC Head Start <br> PARENT HANDBOOK SIGN-OFF FORM 
                </h4>
              </div>
            </div>
            
          </div> -->

          <div class="row mt-5 ">
             <div class="col-12 col-lg-12">
                <p>
                  <b>Dear Parent(s), </b> <br>
                  The Parent Handbook and Parent University Book are important references for parents to use throughout the school year. These books are useful in familiarizing your family with the policies and practices of Beaufort Jasper EOC Head Start.  Please sign this form as confirmation you have received the Parent Handbook. 

                  <br>
                  <br>
                  <br>
                  <br>

                  YES, I have received and will reviewed the current school year’s Parent Handbook and Parent University Book. 
                </p>
             </div>
          </div>





          <div class="row mt-5">

             <div class="col-12 col-lg-5 ">
               Parent Name:  <br>
               <input value="<?php echo $_SESSION['parent_name']; ?>" type="text" readonly  name="parent_signature" class=" form-control input-field-one" >
             </div>

             <div class="col-12 col-lg-5">
               Date:  <br>
               <input value="<?php echo $_SESSION['today']; ?>" readonly type="text"  name="date" class=" form-control input-field-one" >
             </div>

             <div class="col-12 col-lg-5">
              Child Name:  <br>
              <input value="<?php echo $_SESSION['child_Name']; ?>" type="text" readonly  name="child_Name" class=" form-control" >
             </div>

          </div>



         <div class="row mt-5">
      
            <div class="col-12 col-lg-10 mt-5 ">
              <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input " id="customCheckID" name="checkbox-3">
                  <label id="confirm-check-1" class="custom-control-label" for="customCheckID">I confirm that I have read and understand this form. By checking this box, I am electronically signing this form.</label>
                </div>
            </div>
               
          <div class="col-12 col-lg-10 mt-5">
              <div class="custom-controls col-sm-4" style=" text-align: center;">
                  <label class="signature-cls" style="display:none" id="lblParentName"></label>
                  <div style="margin-top: -20px;">----------------------------</div>
                  <div style="margin-top: -5px;">Parent Signature</div>
                </div>
          </div>
                
        </div>

         <div class="row mt-5">
         <div class="text-right col-lg-12" style="padding-bottom:10px">
                  <span style="color:red"><b>Please do not click the BACK button on your browser.</b></span>
               </div>
               <div class="text-right col-lg-12">
                 <button  id="submit" class="button input-btn">Next</button>
               </div>
           </div>
     
        </div>
      </div>
    </div>
  </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<script src="js/jquery-ui.min.js"></script>
<script src="js/custom-valiation.js"></script> 

<script >










 



  $(document).ready(function(){

  


    $("#submit").click(function(){
      var validate = validation();

     if(validate == true){

        var formData = {};
        var fields = $(".form-control");

        for(var i = 0; i< fields.length; i++){
          var name = $(fields[i]).attr('name');
          var value = $(fields[i]).val();
          formData[name] = value;
        }

        var checkbox = $(".custom-control-input");
        for(var i = 0; i< checkbox.length; i++){
          var name = $(checkbox[i]).attr('name');
          var value = $(checkbox[i]).prop("checked");
          if(value){
            value = 'Yes';
          }else{
            value = 'No';
          }
          formData[name] = value;
        }



        console.log(formData);

        $.ajax({
                url: "pdf/parent-handbook-signoff.php",
                type: "post",
                data: formData,
                success: function (response) {
                  if(response == 'ok'){
                    window.location.href = " photo-consent.php";
                  }else{
                   window.location.href = " photo-consent.php";
                  }
                }
            });



      }   else {
                validate.addClass('border');
                validate.focus();

                setTimeout(function () {
                    validate.removeClass('border')
                }, 3000);
        }




    })





  })



    </script>


</body>
</html>