<!DOCTYPE html>
<html>
<head>
	<title>환율</title>
</head>
<body>
<?php 
    
	include_once('simple_html_dom.php');
 
	$html = file_get_html('http://fx.kebhana.com/fxportal/jsp/RS/DEPLOY_EXRATE/fxrate_all.html');
    
 /*foreach($html->find('td[class=buy]') as $element) {
	
       echo $element->innertext . '<br>';// 임시로 볼 수 있게
       

}*/    
	$buy = $html->find('td[class=buy]');
	for($i=0;$i<4;$i++)
	{
		$buy[$i] =strip_tags($buy[$i]);
	}

	$sell = $html->find('td[class=sell]');
	for($i=0;$i<4;$i++)
	{
		$sell[$i] =strip_tags($sell[$i]);
	}

 ?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}  
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 208px" >
<colgroup>
<col style="width: 42px">
<col style="width: 83px">
<col style="width: 83px">
<col style="width: 40px">
</colgroup>
  <tr>
    <th>현찰</th>
    <th>사실때</th>
    <th>파실때</th>
    <th>단위</th>
  </tr>
  <tr>
    <td class="nation">USD</td>
    <td class="buy"><?=$buy[0]?></td>
    <td class="sell"><?=$sell[0]?></td>
    <td class="count">1</td>
  </tr>
  <tr>
    <td class="nation">YEN</td>
    <td class="buy"><?=$buy[1]?></td>
    <td class="sell"><?=$sell[1]?></td>
    <td class="count">100</td>
  </tr>
  <tr>
    <td class="nation">EUR</td>
    <td class="buy"><?=$buy[2]?></td>
    <td class="sell"><?=$sell[2]?></td>
    <td class="count">1</td>
  </tr>
  <tr>
    <td class="nation">CNY</td>
    <td class="buy"><?=$buy[3]?></td>
    <td class="sell"><?=$sell[3]?></td>
    <td class="count">1</td>
  </tr>
</table>
<script language="javascript">
  function proc1()
{
  var o_input1 = document.getElementById("input1");
  var o_input2 = document.getElementById("input2");
  var selone = document.getElementById("selone");
  var val1 = selone.options[selone.selectedIndex].value;
  var tmp1 = o_input1.value * val1;
  o_input2.value = tmp1.toFixed(2);
} 
  function proc2()
{
  var o_input3 = document.getElementById("input3");
  var o_input4 = document.getElementById("input4");
  var seltwo = document.getElementById("seltwo");
  var val2 = seltwo.options[seltwo.selectedIndex].value;
  var tmp2 = o_input4.value / val2;
  o_input3.value = tmp2.toFixed(2);
}
</script>
외화 -> 한화 :
<select name="selone" id="selone">
	<option value="">화폐 선택</option>
    <option value="<?=$buy[0]?>" selected="selected">USD</option>
    <option value="<?=$buy[1]/100?>">YEN</option>
    <option value="<?=$buy[2]?>">EUR</option>
    <option value="<?=$buy[3]?>">CNY</option>
</select>

<input type="number" id="input1" style="width: 100px" />

<input type="button" onClick="proc1()" value="변환" />

<input type="number" id="input2" style="width: 100px" value="0.00"/>
<br>

외화 <- 한화 :
<select name="seltwo" id="seltwo">
    <option value="">화폐 선택</option>
    <option value="<?=$buy[0]?>" selected="selected">USD</option>
    <option value="<?=$buy[1]/100?>">YEN</option>
    <option value="<?=$buy[2]?>">EUR</option>
    <option value="<?=$buy[3]?>">CNY</option>
</select>
<input type="number" id="input3" style="width: 100px" value="0.00"/>

<input type="button" onClick="proc2()" value="변환" />

<input type="number" id="input4" style="width: 100px" />


<br><br><font color="gray">환율계산기의 계산기준은 사실때 기준입니다. 계산값은 세번째 소숫점에서 반올림됩니다.</font>
</body>
</html>