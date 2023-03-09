 <table width="100%"  border="1" style="width:100%;">
            <tr>
                <th style="padding:8px;">Product Name</th>
                <th style="padding:8px;">Price</th>
                <th style="padding:8px;">Quantity</th>
                <th style="padding:8px;">Total Price</th>
             </tr>
			<?php $Total = 0; ?> 
         <?php foreach($customer_item_details as $cval) { ?>   
              <tr>
                <th style="padding:8px;"><?php echo $cval['ProductName'] ?><br><br><?php echo $customer_finfo[0]['SpecialInstructions'] ?></th>
                <th style="padding:8px;">$ <?php echo number_format($cval['Price'],2) ?></th>
                <th style="padding:8px;"><?php echo $cval['Qty'] ?></th>
                <th style="padding:8px;">$ <?php  echo $Total=number_format($Total+$cval['Price']*$cval['Qty'],2) ?></th>
             </tr>
           <?php } ?>  
         
             <tr>
              <td colspan="3" style="font-weight:900; padding:8px; text-align:right;">Total Amount</td>
              <td  style="padding:8px; text-align:left;">$ <?php  echo $Total; ?></td>
            </tr>
     </table>
     
     <p>&nbsp;</p>

<table style="width:100%;" width="100%" border="1"  align="center">
<tr> 
<td width="39%" class="RegistrationRowHeadings">Order Date</td> 
<td width="61%"><?php  echo date('m-d-Y',strtotime($customer_finfo[0]['RegistrationDate']));  ?></td>
</tr>    
<tr> <td class="RegistrationRowHeadings">Company Paid:</td>   
 <td><?php echo $company_name[0]['CompanyName']   ?>  </td>   
 </tr></table>
 
 <table style="width:100%;" width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
					<tr><td colspan="2" class="RegistrationSectionTitles">&nbsp;</td></tr>
					<tr>
					<td colspan="2" class="RegistrationSectionTitles" align="center"><b>INFORMATION</b></td>
					</tr>
					<tr class="RegistrationSectionTitles">
					<td colspan="2"  align="center" width="100%"><hr /></td>
					</tr>
					<tr><td colspan="2" class="RegistrationSectionTitles">&nbsp;</td></tr>
					<tr>
					<td class="RegistrationRowHeadings">Patient ID Number</td>
					<td><?php echo $customer_finfo[0]['PatientAccountNumber']   ?></td>
					</tr>
					<tr>
					<td class="RegistrationRowHeadings">Order Date</td>
					<td><?php  echo date('m-d-Y',strtotime($customer_finfo[0]['RegistrationDate']));  ?></td>
					</tr>
					<tr>
					<td class="RegistrationRowHeadings"> First Name</td> 
					<td><?php echo $customer_finfo[0]['FirstName']   ?></td>
					</tr>
					<tr>
					<td class="RegistrationRowHeadings"><span class="style1"> Last Name</span></td>
					<td><?php echo $customer_finfo[0]['LastName']   ?></td>
					</tr>
					<tr>
					<td class="RegistrationRowHeadings"><span class="style1">Card Holder Name</span></td>
					<td><?php echo $customer_finfo[0]['CardHolderName']   ?></td>
					</tr>
					
					<tr>
					<td class="RegistrationRowHeadings"><span class="style1">Address 1</span></td>
					<td><?php echo $customer_finfo[0]['Address']   ?></td>
					</tr>
					<tr>
					<td class="RegistrationRowHeadings"><span class="style1">Address 2</span></td>
					<td><?php echo $customer_finfo[0]['Address2']   ?></td>
					</tr>
					
					<tr>
					    <td class="RegistrationRowHeadings"><span class="style1">Country</span></td><td> <?php echo $country_name[0]['Country']   ?></td>
				    </tr>
				<tr>
				<td class="RegistrationRowHeadings"><span class="style1">State</span></td><td>  <?php echo $state_name[0]['StateName']   ?></td>
				</tr>
	            <tr>
				<td class="RegistrationRowHeadings"><span class="style1">City</span></td>
				<td><?php echo $customer_finfo[0]['City']   ?></td>
				</tr>
				<tr>
				<td class="RegistrationRowHeadings"><span class="style1">Postal Code</span></td>
				<td><?php echo $customer_finfo[0]['Zip']   ?></td>
				</tr>
				<tr>
				<td class="RegistrationRowHeadings"><span class="style1">Phone</span></td>
				<td> <?php echo $customer_finfo[0]['Phone']   ?></td>
				</tr>
				<tr>
				<td class="RegistrationRowHeadings"><span class="style1">Phone #2</span></td>
				<td> <?php echo $customer_finfo[0]['Phone2']   ?></td>
				</tr>	
				<tr>
				<td class="RegistrationRowHeadings"><span class="style1">Email</span></td>
				<td><?php echo $customer_finfo[0]['Email']   ?></td>
				</tr>
				<tr>
				<td class="RegistrationRowHeadings"><span class="style1">Additional Details</span></td>
				<td><?php echo $customer_finfo[0]['SpecialInstructions'] ?> </td>
				</tr>
				
							
				<tr>
				<td class="RegistrationRowHeadings" colspan="2">&nbsp;</td>
				</tr>
			</table>