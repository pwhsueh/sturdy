    
<div id="wrapper_section">
    <!--以下about_content span內容要從後台撈-->
    <div id="contact_content">
    <div id="title">
        <span>Send us your comments, ask for additional information,<br>make suggestions and/or send us a greeting! Let us know what you think!</span>
    </div>
        <!-- <form style=" border-bottom:#999 1px solid; border-top:#999 1px solid;"> -->
        <form id="contact_form" action="<?php echo site_url($lang_code)?>/contact/do_add" method="POST" style=" border-bottom:#999 1px solid; border-top:#999 1px solid;">  
            <div class="list">Company Name</div><input type="text" name="com_name" size="20" id="com_name"/></input><br/>
            <div class="list">Address</div><input type="text" name="address" size="92" id="rtname"/></input><br/>
        <div style="float:left;">
            <div class="list">Contact Person</div><input type="text" name="contact_person" size="20" id="contact_person"/></input><br/>
            <div class="list">Country</div>
            <select name="country" id="country"> 
                <option value="" selected="selected">Select Country</option> 
                <?php if (isset($country)): ?>
                    <?php foreach ($country as $key => $value): ?>
                        <option value="<?php echo $value->code_id ?>"><?php echo $value->code_name ?></option> 
                    <?php endforeach ?>
                <?php endif ?>
            </select><br/>
            <div class="list">Telephone</div><input type="text" name="tel" size="20" id="tel"/></input><br/>
        </div>
        <div>
            <div class="list_sp" style="margin-left:20px;">Fax</div><input type="text" name="fax" size="20" id="fax"/></input><br/>
            <div class="list_sp" style="margin-left:20px;">E-mail</div><input type="text" name="email" size="20" id="email"/></input><br/>
            <div class="list_sp" style="margin-left:20px;">Website</div><input type="text" name="website" size="20" id="website"/></input><br/>
        </div>
            <div class="list">Company Type</div>
            <input type="checkbox" name="comtype" value="manufacturer">Manufacturer
            <input type="checkbox" name="comtype" value="distributor">Distributor
            <input type="checkbox" name="comtype" value="importer">Importer
            <input type="checkbox" name="comtype" value="enduser">End user&nbsp;(Hospital or Clinic)
            <br/>
            <div class="list">Employee</div>
            <input type="checkbox" name="employeenum" value="500">Over 500
            <input type="checkbox" name="employeenum" value="100">Over 100
            <input type="checkbox" name="employeenum" value="50">Over 50
            <input type="checkbox" name="employeenum" value="30">Over 30
            <input type="checkbox" name="employeenum" value="10">Over 10
            <input type="checkbox" name="employeenum" value="less9">Less than 9
            <br/>
            <div class="list">Engineer / Technician</div>
            <input type="checkbox" name="engineer" value="yes">Yes(How many of them?
            <input type="text" name="engineernum" size="2" id="engineernum"/></input>
            <input type="checkbox" name="engineer" value="no">Over 10
            <br/>
            <div class="list">Sales Type</div>
            <input type="checkbox" name="salestype" value="tender">Tender
            <input type="checkbox" name="salestype" value="retail">Retail sales
            <input type="checkbox" name="salestype" value="both">Both Tender & Retail (T
            <input type="text" name="bothpercentt" size="2" id="bothpercentt"/></input>% R<input type="text" name="bothpercentr" size="2" id="bothpercentr"/></input>% )
            </br> 
            <div class="list">Sales Channel</div>
            <input type="checkbox" name="saleschannel" value="hospital">Hospital
            <input type="checkbox" name="saleschannel" value="clinic">Clinic
            <input type="checkbox" name="saleschannel" value="dclinic">Dental Clinic
            <input type="checkbox" name="saleschannel" value="lab">Laboratory
            <input type="checkbox" name="saleschannel" value="scientific">Scientific
            <br/>
            <div class="list">Territory</div>
            <input type="checkbox" name="territory" value="domestic">Domestic market
            <input type="checkbox" name="territory" value="international">International <input type="text" name="territoryplace" size="8" id="territoryplace"/></input>
            <br/> 
            <div class="list">How did you learn of STURDY?</div>
            <input type="checkbox" name="wherelearnsturdy" value="exhibition">Exhibitions (Which one? <input type="text" name="whichexhibition" size="8" id="whichexhibition"/></input>
            <input type="checkbox" name="wherelearnsturdy" value="website">Website
            <input type="checkbox" name="wherelearnsturdy" value="others">Others <input type="text" name="wherelearnsturdyothers" size="8" id="wherelearnsturdyothers"/></input>
            <br>
            <div class="list">Major interests(at least select a product)</div>
            <input type="checkbox" name="interests" value="autoclave">Autoclave
            <input type="checkbox" name="interests" value="operationtable">Operation Table
            <input type="checkbox" name="interests" value="operationlight">Operation Light
            <input type="checkbox" name="interests" value="suction">Suction
            <input type="checkbox" name="interests" value="enttableandchair">ENT Table & Chair
            <input type="checkbox" name="interests" value="ultrasoniccleaner" style="margin-left:254px;">Ultrasonic Cleaner
            <input type="checkbox" name="interests" value="handpiececleaner">Handpiece Cleaner
            <input type="checkbox" name="interests" value="emsproducts">EMS Products
            
            <div class="list">Comment</div>
            <textarea name="comment" size="300" placeholder="" id="comment"/></textarea><br> 
            <div class="list">Verify Code</div>
             <?php 

                $num1 = rand(0, 9);
                $num2 = rand(0, 9);
                $num = $num1 + $num2;
             ?>
            <!-- <input type="text" name="verifycode" size="8" id="verifycode"/></input>          -->
              
            <input type="text" name="captchaImage" style="width:auto" size="6" value="<?php echo $num1 ?> + <?php echo $num2 ?>" disabled="disabled" />&nbsp;&nbsp;
            <input type="text" name="verificationcode" id="verificationcode" class="verificationcode" placeholder="請輸入左邊的答案"/> 
        
            <input type="submit" class="button" value="SUBMIT" style="margin-top:20px; right:0;"/></input>
      </form>
    </div>
</div>
    
        <div id="fake_footer"></div>

<script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
    $.validator.methods.equal = function(value, element, param) {
        return value == param;
    };

    $(document).ready(function() {

         $("#contact_form").validate({
            rules: {
                com_name: "required",
                contact_person : "required",
                email: "required", 
                verificationcode: {
                    equal: <?php echo $num ?>   
                }
            },
            messages: {
                com_name: "required",
                contact_person: "required",
                email: "required", 
                verificationcode: " 錯誤"
            }
        });

    });
</script>

    