var DATA={};
jQuery(document).ready(function ($) {
    DATA.winW = $(window).width();
    DATA.winH = $(window).height();
    DATA.dom={};
    DATA.dom.loginbox=$("#loginbox");
    DATA.dom.addschool=$("#addschool");
    DATA.dom.schoollist=$("ul.schoollist");
    DATA.dom.joblist=$("ul.joblist");
    DATA.dom.addjob=$("#addjob");
    DATA.dom.submit=$("input.submit");

    $( ".datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#birth" ).datepicker({ dateFormat: 'yy-mm-dd' });
    //$( "#editbox div.reight div.submitbox span.msg" ).hide();

    DATA.dom.loginbox.click(function(){
       
    });

    // DATA.dom.addschool.click(function(){
    //    num=DATA.dom.schoollist.children("li").size()+1;  
    //    schoolItem = "<li class='l"+num+"'><input type='text' name='school_id_"+num+"' value=''><br><div class='box'><input type='radio' class='schoolstate' name='school_state_"+num+"' value='' checked><span>畢業</span><input type='radio' class='schoolstate'  name='schoolstate"+num+"' value=''><span>在學</span></div></li>";  
    //    DATA.dom.schoollist.append(schoolItem);
    // });

    // DATA.dom.addjob.click(function(){
    //    num=DATA.dom.joblist.children("li").size()+1; 
    //    jobItem ="<li class='l"+num+"'><input type='text' name='job_company_name_"+num+"' value=''><br><input type='text' name='job_title_"+num+"' value=''><br><input type='text' class='datestart datepicker"+num+"' name='job_start_date_"+num+"' value=''>&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;<input type='text' class='dateend datepicker"+num+"' name='job_end_date_"+num+"' value=''><br></li>";
    //    DATA.dom.joblist.append(jobItem);
    //    $( ".datepicker"+num ).datepicker({ dateFormat: 'yy-mm-dd' });
    // });

    DATA.dom.submit.click(function(){
        var msg = "";
        //alert($("#contact_tel").val().length);
        if($("#name").val() == ""){
          msg += "請填打姓名 \n";
        }
        if($("#contact_tel").val() == "" || isNaN($("#contact_tel").val()) || ($("#contact_tel").val().length < 8 || $("#contact_tel").val().length > 16) ){
          msg += "請填打正確的聯絡電話 \n";
        }

        if(msg != ""){
            alert(msg);
            return false;
        }else{
          return true;
        }
    });

});