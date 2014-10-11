    
<div id="wrapper_section">
    <!--以下about_content span內容要從後台撈-->
    <div id="contact_content">
    <div id="title">
        <span>向我們發送您的意見，要求提供額外信息,<br>提出建議和/或發送問候！讓我們知道您的想法！</span>
    </div>
        <!-- <form style=" border-bottom:#999 1px solid; border-top:#999 1px solid;"> -->
        <form id="contact_form" action="<?php echo site_url($lang_code)?>/Contact_front/do_add" method="POST" style=" border-bottom:#999 1px solid; border-top:#999 1px solid;">  
            <div class="list">公司名稱</div><input type="text" name="com_name" size="60" id="com_name"/></input><br/>
            <div class="list">地址</div><input type="text" name="address" size="95" id="rtname"/></input><br/>
        <div style="float:left;">
            <div class="list">聯絡人</div><input type="text" name="contact_person" size="20" id="contact_person"/></input><br/>
            <div class="list">國家</div>
            <select name="country" id="country"> 
                <option value="" selected="selected">選擇國家</option> 
                <?php if (isset($country)): ?>
                    <?php foreach ($country as $key => $value): ?>
                        <option value="<?php echo $value->code_id ?>"><?php echo $value->code_name ?></option> 
                    <?php endforeach ?>
                <?php endif ?>
                 
            </select><br/>
            <div class="list">電話</div><input type="text" name="tel" size="20" id="tel"/></input><br/>
        </div>
        <div>
            <div class="list_sp" style="margin-left:20px;">傳真</div><input type="text" name="fax" size="20" id="fax"/></input><br/>
            <div class="list_sp" style="margin-left:20px;">電子郵箱</div><input type="text" name="email" size="20" id="email"/></input><br/>
            <div class="list_sp" style="margin-left:20px;">網站</div><input type="text" name="website" size="20" id="website"/></input><br/>
        </div>
            <div class="list">公司類型</div>
            <input type="checkbox" name="comtype[]" value="manufacturer">製造商
            <input type="checkbox" name="comtype[]" value="distributor">分銷商
            <input type="checkbox" name="comtype[]" value="importer">進口商
            <input type="checkbox" name="comtype[]" value="enduser">最終用戶&nbsp;(醫院或診所)
            <br/>
            <div class="list">員工</div>
            <input type="checkbox" name="employeenum[]" value="500">超過500個以上
            <input type="checkbox" name="employeenum[]" value="100">100以上
            <input type="checkbox" name="employeenum[]" value="50">50以上
            <input type="checkbox" name="employeenum[]" value="30">30以上
            <input type="checkbox" name="employeenum[]" value="10">10以上
            <input type="checkbox" name="employeenum[]" value="less9">小於9
            <br/>
            <div class="list">工程師/技術員</div>
            <input type="checkbox" name="engineer[]" value="yes">是（有多少人？）
            <input type="text" name="engineernum" size="2" id="engineernum"/></input>
            <input type="checkbox" name="engineer[]" value="no">超過10 
            <br/>
            <div class="list">銷售型</div>
            <input type="checkbox" name="salestype[]" value="tender">投標
            <input type="checkbox" name="salestype[]" value="retail">零售
            <input type="checkbox" name="salestype[]" value="both">銷量雙雙投標及零售 (T
            <input type="text" name="bothpercentt" size="2" id="bothpercentt"/></input>% R<input type="text" name="bothpercentr" size="2" id="bothpercentr"/></input>% )
            </br> 
            <div class="list">銷售渠道</div>
            <input type="checkbox" name="saleschannel[]" value="hospital">醫院
            <input type="checkbox" name="saleschannel[]" value="clinic">診所
            <input type="checkbox" name="saleschannel[]" value="dclinic">牙科 診所
            <input type="checkbox" name="saleschannel[]" value="lab">實驗室
            <input type="checkbox" name="saleschannel[]" value="scientific">科學
            <br/>
            <div class="list">國家</div>
            <input type="checkbox" name="territory[]" value="domestic">國內
            <input type="checkbox" name="territory[]" value="international">國際市場 <input type="text" name="territoryplace" size="8" id="territoryplace"/></input>
            <br/> 
            <div class="list">你是怎麼知道新駿？</div>
            <input type="checkbox" name="wherelearnsturdy[]" value="exhibition">展覽（哪一個？）<input type="text" name="whichexhibition" size="8" id="whichexhibition"/></input>
            <input type="checkbox" name="wherelearnsturdy[]" value="website">網站
            <input type="checkbox" name="wherelearnsturdy[]" value="others">其他 <input type="text" name="wherelearnsturdyothers" size="8" id="wherelearnsturdyothers"/></input>
            <br>
            <div class="list">有興趣產品（至少選擇一項產品）</div>
            <input type="checkbox" name="interests[]" value="autoclave">高壓滅菌鍋
            <input type="checkbox" name="interests[]" value="operationtable">手術檯
            <input type="checkbox" name="interests[]" value="operationlight">手術燈
            <input type="checkbox" name="interests[]" value="suction">吸引器
            <input type="checkbox" name="interests[]" value="enttableandchair">耳鼻喉科桌椅系列
            <input type="checkbox" name="interests[]" value="ultrasoniccleaner" style="margin-left:254px;">超聲波清洗機
            <input type="checkbox" name="interests[]" value="handpiececleaner">手機清洗機
            <input type="checkbox" name="interests[]" value="emsproducts">EMS產品 
            
            <div class="list">評論</div>
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

    