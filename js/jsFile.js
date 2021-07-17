

function checkData()
{
	$("#table-02").css("display","block");
	
}

var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}

function closeButton()
{	
	//var div = this.parentElement;
	//div.style.opacity = "0";
	//setTimeout(function(){ div.style.display = "none"; }, 600);
	
	var messageDiv = document.getElementById("message");
	messageDiv.style.opacity = "0";
	setTimeout(function(){ messageDiv.style.display = "none"; }, 600);
}

function mySearchInputTableFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function addRowFunc(row) 
{
	
	var trElement = row.parentElement.parentElement.parentElement;
	var rowIndex = trElement.rowIndex;
	var newRowIndex = rowIndex+1;
	  
	var table = document.getElementById("manual-table");
	var row = table.insertRow(newRowIndex);
	
	var columnNumber = table.rows[0].cells.length;
	var rowsNumber = table.rows.length;
	console.log(rowsNumber);
	var rowsNumberWithoutHeaders = rowsNumber-3;
		
	var formerRowIndex = rowIndex-1;
	for(i=0;i<columnNumber;i++)
	{
		var cell = row.insertCell(i);
		cell.innerHTML=table.rows[rowIndex].cells[i].innerHTML;
		
		if(i==0)
		{
			//table.rows[newRowIndex].cells[i].children[0].children[0].value = rowsNumberWithoutHeaders;
			table.rows[newRowIndex].cells[i].children[0].children[1].value = rowsNumberWithoutHeaders;
			//table.rows[newRowIndex].cells[i].children[0].children[2].setAttribute("value",rowsNumberWithoutHeaders);
			table.rows[newRowIndex].cells[i].children[0].children[2].remove();
			table.rows[newRowIndex].cells[i].children[0].children[0].remove();
		}
		else
		{
			console.log(table.rows[newRowIndex].cells[i].children[0].name);
			
			var t=i-1;
			//INSERT OR TABLE
			if(t<9)
			{
				table.rows[newRowIndex].cells[i].children[0].name = "or_"+rowsNumberWithoutHeaders+"_"+t;
			}
			
			//INSERT ITM TABLE
			if (t>8&&t<20)
			{
				var m=t-9;
				table.rows[newRowIndex].cells[i].children[0].name = "itm_"+rowsNumberWithoutHeaders+"_"+m;
			}
						
			//INSERT PR TABLE
			if (t>19&&t<27)
			{
				var m=t-20;
				table.rows[newRowIndex].cells[i].children[0].name = "pr_"+rowsNumberWithoutHeaders+"_"+m;
			}
						
			//INSERT Z TABLE
			if (t>26&&t<31)
			{
				var m=t-27;
				table.rows[newRowIndex].cells[i].children[0].name = "z_"+rowsNumberWithoutHeaders+"_"+m;
			}
						
			//INSERT SHP TABLE
			if (t>30&&t<42)
			{
				var m=t-31;
				table.rows[newRowIndex].cells[i].children[0].name = "shp_"+rowsNumberWithoutHeaders+"_"+m;
			}
						
			//INSERT CS TABLE
			if (t>41&&t<49)
			{
				var m=t-42;
				table.rows[newRowIndex].cells[i].children[0].name = "cs_"+rowsNumberWithoutHeaders+"_"+m;
			}
						
			//INSERT PMT TABLE
			if (t>48&&t<53)
			{
				var m=t-49;
				table.rows[newRowIndex].cells[i].children[0].name = "pmt_"+rowsNumberWithoutHeaders+"_"+m;
			}
						
			//INSERT LG TABLE
			if (t>52&&t<60)
			{
				var m=t-53;
				table.rows[newRowIndex].cells[i].children[0].name = "lg_"+rowsNumberWithoutHeaders+"_"+m;
			}
			
			//INSERT BB TABLE
			if (t>59&&t<64)
			{
				var m=t-60;
				table.rows[newRowIndex].cells[i].children[0].name = "bb_"+rowsNumberWithoutHeaders+"_"+m;
			}
		}
	}
}

//create js array from php
function outputJsArrayToTr(javascript_array)
{
	console.log(javascript_array);
	
	var table = document.getElementById("auto-table");
	var rowsNumber = javascript_array['or'].length+2;
	var columnNumber = table.rows[0].cells.length;
	
	for(s=2;s<javascript_array['or'].length;s++)
	{
		//add new row
		var row = table.insertRow(s);
		var newRowIndex = s;
		var newRowIndexInArray = s-2;
		
		//fill row
		for(i=0;i<columnNumber;i++)
		{
			var cell = row.insertCell(i);
			var t=i;
			
			//INSERT OR TABLE
			if(t<9)
			{
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['or'][newRowIndexInArray][i];
				if(javascript_array['or_changes'][newRowIndexInArray][i] == "true")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
				}
			}
			
			//INSERT ITM TABLE
			if (t>8&&t<19)
			{
				var m=t-9;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['itm'][newRowIndexInArray][m];
				if(javascript_array['itm_changes'][newRowIndexInArray][m] == "true")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
				}
			}
						
			//INSERT PR TABLE
			if (t>18&&t<26)
			{
				var m=t-19;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['pr'][newRowIndexInArray][m];
			}
			
			//INSERT Z TABLE
			if (t>25&&t<30)
			{
				var m=t-26;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['z'][newRowIndexInArray][m];
			
				if(javascript_array['z_changes'][newRowIndexInArray][m] == "true")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
				}
			}
						
			//INSERT SHP TABLE
			if (t>29&&t<41)
			{
				var m=t-30;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['shp'][newRowIndexInArray][m];
				if(javascript_array['shp_changes'][newRowIndexInArray][m] == "true")
				{
					javascript_array['shp'][newRowIndexInArray][m] = get_country_code(javascript_array['shp'][newRowIndexInArray][m]);					
										
					table.rows[newRowIndex].cells[i].innerHTML = javascript_array['shp'][newRowIndexInArray][m];
					
					if(javascript_array['shp'][newRowIndexInArray][m] != 'US' && javascript_array['shp'][newRowIndexInArray][m] != 'IL') {
						table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
					}
				}
			}
						
			//INSERT CS TABLE
			if (t>40&&t<48)
			{
				var m=t-41;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['cs'][newRowIndexInArray][m];
				
				if(javascript_array['cs_changes'][newRowIndexInArray][m] == "true")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "red";
				}
			}
						
			//INSERT PMT TABLE
			if (t>47&&t<52)
			{
				var m=t-48;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['pmt'][newRowIndexInArray][m];
				if(javascript_array['pmt_changes'][newRowIndexInArray][m] == "true_01")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "red";
				}
				
				if(javascript_array['pmt_changes'][newRowIndexInArray][m] == "true_02")
				{
					table.rows[newRowIndex].cells[i].innerHTML = "Payoneer";
					table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
	
				}
				
				if(javascript_array['pmt_changes'][newRowIndexInArray][m] == "true_03")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
				}
			}
			
			//INSERT LG TABLE
			if (t>51&&t<59)
			{
				var m=t-52;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['lg'][newRowIndexInArray][m];
			}
			
			//INSERT BB TABLE
			if (t>58&&t<63)
			{
				var m=t-59;
				table.rows[newRowIndex].cells[i].innerHTML = javascript_array['bb'][newRowIndexInArray][m];
				
				if(javascript_array['bb_changes'][newRowIndexInArray][m] == "true")
				{
					table.rows[newRowIndex].cells[i].style.backgroundColor = "yellow";
				}
			
			}
		
		}
	}
}

//auto edit js array
function outputJsArrayToTrAuto(javascript_array, exchange_rate)
{
	//console.log(exchange_rate);
	
	javascript_array['or_changes']=[];
	javascript_array['itm_changes']=[];
	javascript_array['cs_changes']=[];
	javascript_array['pr_changes']=[];
	javascript_array['shp_changes']=[];
	javascript_array['pmt_changes']=[];
	javascript_array['z_changes']=[];
	javascript_array['bb_changes']=[];
	
	//update array
	//or
	for(s=0;s<javascript_array['or'].length;s++)
	{
		javascript_array['or_changes'][s]=[];
		
		for(i=0;i<javascript_array['or'][0].length;i++)
		{
			javascript_array['or_changes'][s][i]=0;
		}
		
		//or4
		if(javascript_array['or'][s][3] == "default")
		{
			javascript_array['or'][s][3] = "Amazon";
			javascript_array['or_changes'][s][3] = "true";
		}
		
	}
	
	//itm
	for(s=0;s<javascript_array['itm'].length;s++)
	{
		javascript_array['itm_changes'][s]=[];
		
		for(i=0;i<javascript_array['itm'][0].length;i++)
		{
			javascript_array['itm_changes'][s][i]=0;
		}
		
		//itm0
		if(javascript_array['itm'][s][0] == "")
		{
			javascript_array['itm_changes'][s][0] = "true";
		}
		
		//itm1
		if(javascript_array['itm'][s][1] == "")
		{
			javascript_array['itm_changes'][s][1] = "true";
		}
		
	}
	
	//z
	for(s=0;s<javascript_array['z'].length;s++)
	{
		javascript_array['z_changes'][s]=[];
		
		for(i=0;i<javascript_array['z'][0].length;i++)
		{
			javascript_array['z_changes'][s][i]=0;
		}
		
		//z0
		    javascript_array['z'][s][0] = exchange_rate;
			javascript_array['z_changes'][s][0]= "true";
			
		//z1
			javascript_array['z'][s][1] = (javascript_array['pr'][s][0]*exchange_rate).toFixed(2);
			javascript_array['z_changes'][s][1] = "true";
				
		//z2
			var vat = 0;
			if(javascript_array['shp'][s][1].toLowerCase() == 'israel') {
				var vat = 0.17;
				javascript_array['z'][s][2] = vat;
				javascript_array['z_changes'][s][2] = "true";
			} else {
				javascript_array['z'][s][2] = 0;
			}
		
		//z3
			var price = javascript_array['pr'][s][0]*exchange_rate;
			var vat_plus_one = vat+1;
			var total = (price/vat_plus_one).toFixed(2);
				
			javascript_array['z'][s][3] = total;
			javascript_array['z_changes'][s][3] = "true";
	}
		
	//shp
	for(s=0;s<javascript_array['shp'].length;s++)
	{
		javascript_array['shp_changes'][s]=[];
		
		for(i=0;i<javascript_array['shp'][0].length;i++)
		{
			javascript_array['shp_changes'][s][i]=0;
		}
		
		//shp1
		if(javascript_array['shp'][s][1].toLowerCase() != "united states" && javascript_array['shp'][s][1].toLowerCase() != "israel")
		{
			javascript_array['shp_changes'][s][1] = "true";
		}	

		//javascript_array['shp_changes'][s][1] = "true";

	}
	
	//cs
	for(s=0;s<javascript_array['cs'].length;s++)
	{
		javascript_array['cs_changes'][s]=[];
		
		for(i=0;i<javascript_array['cs'][0].length;i++)
		{
			javascript_array['cs'][s][i]=0;
		}
		
		//cs4
		if(javascript_array['bb'][s][1].toLowerCase() == "dhl express")
		{
			javascript_array['cs_changes'][s][3] = "true";
		}	
	}
	
	//pmt
	for(s=0;s<javascript_array['pmt'].length;s++)
	{
		javascript_array['pmt_changes'][s]=[];
		
		for(i=0;i<javascript_array['pmt'][0].length;i++)
		{
			javascript_array['pmt_changes'][s][i]=0;
		}
		
		//pmt1
		if(javascript_array['pmt'][s][0] == "" || javascript_array['pmt'][s][0].toUpperCase() == "INCOMPLETE" || javascript_array['pmt'][s][0].toUpperCase() == "NONE")
		{
			javascript_array['pmt_changes'][s][0] = "true_01";
		}
		if(javascript_array['or'][s][3].toLowerCase() == "amazon")
		{
			javascript_array['pmt_changes'][s][0] = "true_02";
		}
		
		//pmt2
		if(javascript_array['pmt'][s][1] == "")
		{
			javascript_array['pmt_changes'][s][1] = "true_03";
		}
		if(javascript_array['or'][s][3].toLowerCase() == "amazon")
		{
			javascript_array['pmt_changes'][s][1] = "true_02";
		}
	}
	
	//bb
	for(s=0;s<javascript_array['bb'].length;s++)
	{
		javascript_array['bb_changes'][s]=[];
		
		for(i=0;i<javascript_array['bb'][0].length;i++)
		{
			javascript_array['bb'][s][i]=0;
		}
		
		//bb2
		if(javascript_array['shp'][s][1].toLowerCase() == "israel")
		{
			javascript_array['bb'][s][1] = "YDM";
			javascript_array['bb_changes'][s][1] = "true";
		}	
	}
	
	//insert updated array to table
	outputJsArrayToTr(javascript_array);
}

function get_country_code(country){
	
	country = country.toUpperCase();
	country = country.replace(/ /g,"_");
	
	var country_array =
	{
	
	AUSTRALIA			: "AU",
	AUSTRIA				: "AT",
	BELGIUM 			: "BE",
	BRAZIL				: "BR",
	CANADA				: "CA",
	CHILE				: "CL",
	CYPRUS				: "CY",
	DENAMRK				: "DK",
	DUBAI				: "AE",
	FINLAND				: "FI",
	FRANCE				: "FR",
	GERMANY				: "DE",
	GREECE				: "GR",
	INDIA				: "IN",
	IRELAND				: "GB",
	ISRAEL				: "IL",
	ITALY				: "IT",
	JAPAN				: "JP",
	LATVIA				: "LV",
	MALAYSIA			: "MY",
	NETHERLANDS			: "NL",
	NORWAY				: "NO",
	ROMANIA				: "RO",
	RUSSIA				: "RU",
	SLOVAKIA			: "SK",
	SPAIN				: "ES",
	SWEDEN				: "SE",
	SWITZERLAND			: "CH",
	UKRAINE				: "UA",
	UNITED_KINGDOM		: "UK",
	UNITED_STATES		: "US",
	NEW_ZEALAND			: "NZ",
	HONG_KONG			: "HK",
	KAZAKHSTAN			: "KZ",
	CZECH_REPUBLIC		: "CZ",
	SINGAPORE			: "SG",
	TAIWAN				: "TW",	
	TRINIDAD			: "TT",
	SOUTH_AFRICA		: "ZA",
	POLAND				: "PL"
	};
	
	if(typeof country_array[country] !== 'undefined') {
		return country_array[country];
	} 
	else {
		return country;
	}
}