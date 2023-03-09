<?php
/*?>// extract($_REQUEST); 
 $HeadrID=$RowsPageContent->fields['HeaderID'];
 if($HeadrID=='')
 {
 $HeaderQuery="select * from ja_Home_Header  where header='Y'";
 
 $HeaderRow = $contact->Execute($HeaderQuery) or die($contact->ErrorMsg());	
 
// $headerrRes=mysql_query($HeaderQuery);
// $HeaderRow=mysql_fetch_array($headerrRes);
 }
 else
 {
 $HeaderQuery="select * from ja_Home_Header  where HeaderID='$HeadrID'";
 
 $HeaderRow = $contact->Execute($HeaderQuery) or die($contact->ErrorMsg());	
 
 //$headerrRes=mysql_query($HeaderQuery);
 //$HeaderRow=mysql_fetch_array($headerrRes);
 }
 echo $HeaderRow->fields['HeaderContent'];<?php */
 
 
 ?>

 <header id="header-nav">
  <div class="container">
    <div class="col-md-3 inline"><a href="http://www.missoulaboneandjoint.com"><img src="https://wp02-media.cdn.ihealthspot.com/wp-content/uploads/sites/422/2019/02/20151159/logo.png"" alt="Missoula Bone and Joint and Surgery Center"/></a></div>
    <div class="col-md-6 inline middle-header">
      <div class="col-md-6 inline stay-connected">
        <p>Stay Connected <a href="https://www.youtube.com/channel/UCWBSu7AGmFLExuy5ktf3-Ww" target="_blank"><img src="<?php echo base_url('public/assets/images/youtube.png') ?>"/></a> <a href="https://www.facebook.com/missoulaboneandjoint/" target="_blank"><img src="<?php echo base_url('public/assets/images/fb.png') ?>"/></a> </p>
      </div>
      <div class="col-md-6 inline contacts-phone">
        <div class="contacts"> <a href="tel:4067214436">Clinic (406) 721-4436</a> <a href="tel:4068295591">Urgent Care (406) 829-5591</a> <a href="tel:4065424702">Physical Therapy (406) 542-4702</a> <a href="tel:4065429695">Surgery Center (406) 542-9695</a></div>
      </div>
      <div class="col-md-4"> <a class="header-btn provider" href="http://www.missoulaboneandjoint.com/FindaProvider.aspx">Find a Provider</a> </div>
      <div class="col-md-4"> <a class="header-btn forms" href="http://www.missoulaboneandjoint.com/PatientResources.aspx#8697514079-patient-forms">Patient Forms</a> </div>
      <div class="col-md-4"> <a class="header-btn billpay" href="http://secure.missoulaboneandjoint.com/" target="_blank">Online Bill Pay</a> </div>
       <p style="font-size:18px;">URGENT CARE HOURS : Monday-Thursday 8.30am-7.00pm, Friday 8.30am-5.00pm, Saturday 9.00am-2.00pm</p>
    </div>
   
    <div class="col-md-3 inline header-links">
      <div class="search-wrapper"> </div>
      <form class="search-form" method="get" action="https://www.missoulaboneandjoint.com/" role="search">
         <input type="search" name="s" id="searchform-1" placeholder="Search" style="border:.5px solid #ebebeb; max-width:150px;" /> 
         <button type="submit"  class="but2"> Submit </button>
      </form>
      
      <a class="header-btn1 reqApp" href="http://www.missoulaboneandjoint.com/ContactandLocations/RequestanAppointment.aspx">Request Appointment</a> <a class="header-btn1 pPortal" href="http://www.missoulaboneandjoint.com/mbnj.ema.md/ema/Login.action" target="_blank">Patient Portal</a>
      <div class="refer-patient"><a href="http://www.missoulaboneandjoint.com/ReferaPatient.aspx"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Refer a patient</a></div>
    </div>
  </div>
</header>

