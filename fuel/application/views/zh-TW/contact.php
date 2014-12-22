 <style type="text/css">
 .error {
    color: red;
}
    .block {
        display: block;
    }
    form label.error {
        display: none;
    }
 </style>       
<div id="wrapper_section">
    <!--以下about_content span內容要從後台撈-->
    <div id="contact_content">
    <div id="title">
        <span>向我們發送您的意見，要求提供額外信息,<br>提出建議和/或發送問候！讓我們知道您的想法！<b style="color:red;">*為必填欄位</b></span>
    </div>
        <!-- <form style=" border-bottom:#999 1px solid; border-top:#999 1px solid;"> -->
        <form id="contact_form" action="<?php echo site_url($lang_code)?>/Contact_front/do_add" method="POST" style=" border-bottom:#999 1px solid; border-top:#999 1px solid;">  
            <div class="list">公司名稱<b style="color:red;">*</b></div><input type="text" name="com_name" size="55" id="com_name"/></input><br/>
            <div class="list">地址</div><input type="text" name="address" size="80" id="rtname"/></input><br/>
        <div style="float:left;">
            <div class="list">聯絡人<b style="color:red;">*</b></div><input type="text" name="contact_person" size="20" id="contact_person"/></input><br/>
            <div class="list">國家<b style="color:red;">*</b></div>
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
            <div class="list_sp" style="margin-left:20px;">電子郵箱<b style="color:red;">*</b></div><input type="text" name="email" size="20" id="email"/></input><br/>
            <div class="list_sp" style="margin-left:20px;">網站</div><input type="text" name="website" size="20" id="website"/></input><br/>
        </div>
            <div class="list">公司類型<b style="color:red;">*</b></div>
                <input type="checkbox" name="comtype[]" value="製造商">製造商
                <input type="checkbox" name="comtype[]" value="分銷商">分銷商
                <input type="checkbox" name="comtype[]" value="進口商">進口商
                <input type="checkbox" name="comtype[]" value="最終用戶 (醫院或診所)">最終用戶&nbsp;(醫院或診所)
                <label for="comtype[]" class="error">請至少選擇一項</label>
            <br/>
            <div class="list">員工</div>
            <input type="checkbox" name="employeenum[]" value="超過500個以上">超過500個以上
            <input type="checkbox" name="employeenum[]" value="100以上">100以上
            <input type="checkbox" name="employeenum[]" value="50以上">50以上
            <input type="checkbox" name="employeenum[]" value="30以上">30以上
            <input type="checkbox" name="employeenum[]" value="10以上">10以上
            <input type="checkbox" name="employeenum[]" value="小於9">小於9
            <br/>
            <div class="list">工程師/技術員</div>
            <input type="checkbox" name="engineer[]" value="yes">是（有多少人？）
            <input type="text" name="engineernum" size="2" id="engineernum"/></input>
            <input type="checkbox" name="engineer[]" value="no">超過10 
            <br/>
            <div class="list">銷售類型<b style="color:red;">*</b></div>
            <input type="checkbox" name="salestype[]" value="投標">投標
            <input type="checkbox" name="salestype[]" value="零售">零售
            <input type="checkbox" name="salestype[]" value="銷量雙雙投標及零售">銷量雙雙投標及零售 (T
            <input type="text" name="bothpercentt" size="2" id="bothpercentt"/></input>% R<input type="text" name="bothpercentr" size="2" id="bothpercentr"/></input>% )
            <label for="salestype[]" class="error">請至少選擇一項</label>
            </br> 
            <div class="list">銷售渠道<b style="color:red;">*</b></div>
            <input type="checkbox" name="saleschannel[]" value="醫院">醫院
            <input type="checkbox" name="saleschannel[]" value="診所">診所
            <input type="checkbox" name="saleschannel[]" value="牙科 診所">牙科 診所
            <input type="checkbox" name="saleschannel[]" value="實驗室">實驗室
            <input type="checkbox" name="saleschannel[]" value="科學">科學
            <label for="saleschannel[]" class="error">請至少選擇一項</label>
            <br/>
            <div class="list">國家</div>
            <input type="checkbox" name="territory[]" value="國內">國內
            <input type="checkbox" name="territory[]" value="國際市場">國際市場 <input type="text" name="territoryplace" size="8" id="territoryplace"/></input>
            <br/> 
            <div class="list">你是怎麼知道新駿？</div>
            <input type="checkbox" name="wherelearnsturdy[]" value="展覽">展覽（哪一個？）<input type="text" name="whichexhibition" size="8" id="whichexhibition"/></input>
            <input type="checkbox" name="wherelearnsturdy[]" value="網站">網站
            <input type="checkbox" name="wherelearnsturdy[]" value="其他">其他 <input type="text" name="wherelearnsturdyothers" size="8" id="wherelearnsturdyothers"/></input>
            <br/>
            <div class="list">有興趣產品（至少選擇一項產品)<b style="color:red;">*</b></div>
            <input type="checkbox" name="interests[]" value="高壓滅菌鍋">高壓滅菌鍋
            <input type="checkbox" name="interests[]" value="手術檯">手術檯
            <input type="checkbox" name="interests[]" value="手術燈">手術燈
            <input type="checkbox" name="interests[]" value="吸引器">吸引器
            <input type="checkbox" name="interests[]" value="耳鼻喉科桌椅系列">耳鼻喉科桌椅系列<br/>
            <input type="checkbox" name="interests[]" value="超聲波清洗機" style="margin-left:253px;">超聲波清洗機
            <input type="checkbox" name="interests[]" value="手機清洗機">手機清洗機
            <input type="checkbox" name="interests[]" value="EMS產品">EMS產品 
            <label for="interests[]" class="error">請至少選擇一項</label>
            <br/>
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
<script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.browser.js"></script>
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
                country: "required", 
                'comtype[]': {
                    required: true,
                    minlength: 1
                },
                'salestype[]': {
                    required: true,
                    minlength: 1
                },
                'saleschannel[]': {
                    required: true,
                    minlength: 1
                },
                'interests[]': {
                    required: true,
                    minlength: 1
                },
                verificationcode: {
                    equal: <?php echo $num ?>   
                }
            },
            messages: {
                com_name: "必填",
                contact_person: "必填",
                email: "必填", 
                country: "必填", 
               /* 'comtype[]': {
                    required: "請至少選擇一項"
                },
                'salestypep[]': {
                    required: "請至少選擇一項"
                },
                'saleschannel[]': {
                    required: "請至少選擇一項"
                },
                'interests[]': {
                    required: "請至少選擇一項"
                },*/
                verificationcode: "錯誤"
            }
        });

    });
</script>

    