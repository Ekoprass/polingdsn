function onlyNumber(evt) {
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :((evt.which) ? evt.which : 0));
	if (charCode == 45 || charCode == 40 || charCode == 41){ 
		return true; 
	}
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		alert('Isikan dengan angka!');
		return false;
	}
	return true;
}

function autototal(strFieldName, numFields)
{
	kembalian = document.form1.kembalian.value;
	if(isNaN(eval('document.form1.' + strFieldName + '.value')))
	{
		var f=confirm("Please enter a valid number for all size fields");
		if(f==true)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	intCustomerIndex = strFieldName.substring(8,9);
	totalvalue = 0;
	totalvalue = parseFloat(eval('document.form1.bayar' + '.value'),10) - parseFloat(eval('document.form1.tagihan' + '.value'),10);
	document.form1.kembalian.value = totalvalue;
}

function cek_uang_kembali(){
	totalvalue=document.form1.kembalian.value;
	if(totalvalue<0){
		alert('enter with number !');	
	}
}