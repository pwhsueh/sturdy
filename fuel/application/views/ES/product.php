
<div id="wrapper_section">

<div id="img_wrapper">
<table>
    <tbody>
        <tr height="425px">
            <td width="425px" colspan="9" style="border: 1px solid #999;">
                <?php if (isset($product->img1)): ?>
                    <img src='<?php echo site_url()."assets/$product->img1" ?>' name="a">
                <?php endif ?>
            </td>
        </tr>
        <tr height="10px"><td></td></tr>
        <tr height="100px" id="table_pg">
            <td width="100px" style="border: 1px dotted #999;">
                <?php if (isset($product->img1) && "" != $product->img1): ?>
                    <a href="#pic" onClick="MM_swapImage('a','','<?php echo site_url()."assets/$product->img1" ?>',1)">
                    <img src='<?php echo site_url()."assets/$product->img1" ?>'></a>
                <?php endif ?>                
            </td>
            <td width="8.3px"></td>
            <td width="100px" style="border: 1px dotted #999;">
                <?php if (isset($product->img2) && "" != $product->img2): ?>
                    <a href="#pic" onClick="MM_swapImage('a','','<?php echo site_url()."assets/$product->img2" ?>',1)">
                    <img src='<?php echo site_url()."assets/$product->img2" ?>'></a>
                <?php endif ?> 
            </td>
            <td width="8.3px"></td>
            <td width="100px" style="border: 1px dotted #999;">
                <?php if (isset($product->img3) && "" != $product->img3): ?>
                    <a href="#pic" onClick="MM_swapImage('a','','<?php echo site_url()."assets/$product->img3" ?>',1)">
                    <img src='<?php echo site_url()."assets/$product->img3" ?>'></a>
                <?php endif ?> 
            </td>
            <td width="8.3px"></td>
            <td width="100px" style="border: 1px dotted #999;">
                <?php if (isset($product->img4) && "" != $product->img4): ?>
                    <a href="#pic" onClick="MM_swapImage('a','','<?php echo site_url()."assets/$product->img4" ?>',1)">
                    <img src='<?php echo site_url()."assets/$product->img4" ?>'></a>
                <?php endif ?> 
            </td>
        </tr>
    </tbody>
</table>
</div>

<div id="description_wrapper">

<div id="product_title">
<h1 class="auto_color" style="color:<?php echo $series->code_value1?>;opacity: 1;"><?php echo $product->title ?></h1>
<h2><?php echo $product->abstract ?></h2>
</div>

<div id="product_subtitle">
<h3><?php echo $product->sub_title ?></h3>
</div>    

<div id="description">
<span>
<?php echo $product->descript ?>
</span>
</div>
        
<input type="button" class="auto_button" value="Catalog Download" id="pd_download_button" style="background:<?php echo $series->code_value1?>;opacity: 1;"  /></input>        
<!-- <a class="auto_button" value="Catalog Download" id="pd_download_button"/>Catalog Download</a>   -->
</div>

<div id="detail">
<h1 class="auto_color" style="color:<?php echo $series->code_value1?>;opacity: 1;">Safety Devices & Certification</h1>
<h2>Safety Devices:</h2>
<span>
<?php echo $product->detail ?>
</span>
</div>


        
</div>

    
<div id="fake_footer"></div>

<script>



    function downloadURL(url) {
        var hiddenIFrameID = 'hiddenDownloader',
            iframe = document.getElementById(hiddenIFrameID);
        if (iframe === null) {
            iframe = document.createElement('iframe');
            iframe.id = hiddenIFrameID;
            iframe.style.display = 'none';
            document.body.appendChild(iframe);
        }
        iframe.src = url; 
    };

  $("#pd_download_button").click(function()
    {
        window.open('<?php echo site_url()."assets/$product->category_url" ?>');
        // document.location.href = '<?php echo site_url()."assets/$product->category_url" ?>';
        // document.location.replace('<?php echo site_url()."assets/$product->category_url" ?>');  
        // downloadURL('<?php echo site_url()."assets/$product->category_url" ?>');
    });

    function MM_preloadImages() { //v3.0
        var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
        var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length;i++)
        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
    }
    function MM_findObj(n, d) { //v4.0
        var p,i,x; if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) 
    {
        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
        if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++)x=d.forms[i][n];
        for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
        if(!x && document.getElementById) x=document.getElementById(n); return x;
    }
    function MM_swapImage() { //v3.0
        var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
        if((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src;x.src=a[i+2];}
    }
    
    
</script> 