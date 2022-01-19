function convertToHex(str){
  var raw = str.match(/(\d+)/g);
  var hexr = parseInt(raw[0]).toString(16);
  var hexg = parseInt(raw[1]).toString(16);
  var hexb = parseInt(raw[2]).toString(16);
      hexr = hexr.length == 1 ? '0' + hexr: hexr;
      hexg = hexg.length == 1 ? '0' + hexg: hexg;
      hexb = hexb.length == 1 ? '0' + hexb: hexb;
  var hex = '#' + hexr + hexg + hexb;
  return hex;
}

function myFunction() {
  

  t1=convertToHex(document.getElementById("tm1").style.backgroundColor );
  t2=convertToHex(document.getElementById("tm2").style.backgroundColor );
  t3=convertToHex(document.getElementById("tm3").style.backgroundColor );
  t4=convertToHex(document.getElementById("tm4").style.backgroundColor );
  t5=convertToHex(document.getElementById("tm5").style.backgroundColor );
  t6=convertToHex(document.getElementById("tm6").style.backgroundColor );


    document.getElementById("cr1").value = t1; 
    br1.style.background = t1;

    document.getElementById("cr2").value = t2 ; 
    br2.style.background = t2;

    document.getElementById("cr3").value = t3   ;
    br3.style.background = t3;

    document.getElementById("cr4").value = t4 ;  
    br4.style.background = t4;    
    br5.style.background = t4;
    br6.style.background = t4;
    br7.style.background = t4;
    br8.style.background = t4;
    br9.style.background = t4;

    document.getElementById("cr5").value = t5;
    isim1.style.color = t5;
    isim2.style.color = t5;
    yazi1.style.color = t5;
    yazi2.style.color = t5;
    yazi3.style.color = t5;
    firmaisim1.style.color = t5;
    firmayazi1.style.color = t5;
    firmayazi2.style.color = t5;
    firmayazi3.style.color = t5;
    firmayazi4.style.color = t5;
    paylas1.style.color = t5;
    paylas2.style.color = t5;

    document.getElementById("cr6").value = t6; 
    ikon1.style.color = t6;
    ikon2.style.color = t6;
    ikon3.style.color = t6;
    ikon5.style.color = t6;
    ikon6.style.color = t6;
    ikon7.style.color = t6;
    ikon8.style.color = t6;
    ikon9.style.color = t6;
    ikon10.style.color = t6;
    ikon11.style.color = t6;
    ikon12.style.color = t6;
    ikon13.style.color = t6;
    ikon14.style.color = t6;
  
  };
  function myFunction2() {
  

  
    t1=convertToHex(document.getElementById("tm7").style.backgroundColor );
    t2=convertToHex(document.getElementById("tm8").style.backgroundColor );
    t3=convertToHex(document.getElementById("tm9").style.backgroundColor );
    t4=convertToHex(document.getElementById("tm10").style.backgroundColor );
    t5=convertToHex(document.getElementById("tm11").style.backgroundColor );
    t6=convertToHex(document.getElementById("tm12").style.backgroundColor );
  
      document.getElementById("cr1").value = t1; 
      br1.style.background = t1;
  
      document.getElementById("cr2").value = t2 ; 
      br2.style.background = t2;
  
      document.getElementById("cr3").value = t3   ;
      br3.style.background = t3;
  
      document.getElementById("cr4").value = t4 ;  
      br4.style.background = t4;    
      br5.style.background = t4;
      br6.style.background = t4;
      br7.style.background = t4;
      br8.style.background = t4;
      br9.style.background = t4;
  
      document.getElementById("cr5").value = t5;
      isim1.style.color = t5;
      isim2.style.color = t5;
      yazi1.style.color = t5;
      yazi2.style.color = t5;
      yazi3.style.color = t5;
      firmaisim1.style.color = t5;
      firmayazi1.style.color = t5;
      firmayazi2.style.color = t5;
      firmayazi3.style.color = t5;
      firmayazi4.style.color = t5;
      paylas1.style.color = t5;
      paylas2.style.color = t5;
  
      document.getElementById("cr6").value = t6; 
      ikon1.style.color = t6;
      ikon2.style.color = t6;
      ikon3.style.color = t6;
      ikon5.style.color = t6;
      ikon6.style.color = t6;
      ikon7.style.color = t6;
      ikon8.style.color = t6;
      ikon9.style.color = t6;
      ikon10.style.color = t6;
      ikon11.style.color = t6;
      ikon12.style.color = t6;
      ikon13.style.color = t6;
      ikon14.style.color = t6;
    
    };
    function myFunction3() {
  

      
    
      t1=convertToHex(document.getElementById("tm13").style.backgroundColor );
      t2=convertToHex(document.getElementById("tm14").style.backgroundColor );
      t3=convertToHex(document.getElementById("tm15").style.backgroundColor );
      t4=convertToHex(document.getElementById("tm16").style.backgroundColor );
      t5=convertToHex(document.getElementById("tm17").style.backgroundColor );
      t6=convertToHex(document.getElementById("tm18").style.backgroundColor );
    
        document.getElementById("cr1").value = t1; 
        br1.style.background = t1;
    
        document.getElementById("cr2").value = t2 ; 
        br2.style.background = t2;
    
        document.getElementById("cr3").value = t3   ;
        br3.style.background = t3;
    
        document.getElementById("cr4").value = t4 ;  
        br4.style.background = t4;    
        br5.style.background = t4;
        br6.style.background = t4;
        br7.style.background = t4;
        br8.style.background = t4;
        br9.style.background = t4;
    
        document.getElementById("cr5").value = t5;
        isim1.style.color = t5;
        isim2.style.color = t5;
        yazi1.style.color = t5;
        yazi2.style.color = t5;
        yazi3.style.color = t5;
        firmaisim1.style.color = t5;
        firmayazi1.style.color = t5;
        firmayazi2.style.color = t5;
        firmayazi3.style.color = t5;
        firmayazi4.style.color = t5;
        paylas1.style.color = t5;
        paylas2.style.color = t5;
    
        document.getElementById("cr6").value = t6; 
        ikon1.style.color = t6;
        ikon2.style.color = t6;
        ikon3.style.color = t6;
        ikon5.style.color = t6;
        ikon6.style.color = t6;
        ikon7.style.color = t6;
        ikon8.style.color = t6;
        ikon9.style.color = t6;
        ikon10.style.color = t6;
        ikon11.style.color = t6;
        ikon12.style.color = t6;
        ikon13.style.color = t6;
        ikon14.style.color = t6;
      
      };
      function myFunction4() {
  

      
        t1=convertToHex(document.getElementById("tm19").style.backgroundColor );
        t2=convertToHex(document.getElementById("tm20").style.backgroundColor );
        t3=convertToHex(document.getElementById("tm21").style.backgroundColor );
        t4=convertToHex(document.getElementById("tm22").style.backgroundColor );
        t5=convertToHex(document.getElementById("tm23").style.backgroundColor );
        t6=convertToHex(document.getElementById("tm24").style.backgroundColor );
      
          document.getElementById("cr1").value = t1; 
          br1.style.background = t1;
      
          document.getElementById("cr2").value = t2 ; 
          br2.style.background = t2;
      
          document.getElementById("cr3").value = t3   ;
          br3.style.background = t3;
      
          document.getElementById("cr4").value = t4 ;  
          br4.style.background = t4;    
          br5.style.background = t4;
          br6.style.background = t4;
          br7.style.background = t4;
          br8.style.background = t4;
          br9.style.background = t4;
      
          document.getElementById("cr5").value = t5;
          isim1.style.color = t5;
          isim2.style.color = t5;
          yazi1.style.color = t5;
          yazi2.style.color = t5;
          yazi3.style.color = t5;
          firmaisim1.style.color = t5;
          firmayazi1.style.color = t5;
          firmayazi2.style.color = t5;
          firmayazi3.style.color = t5;
          firmayazi4.style.color = t5;
          paylas1.style.color = t5;
          paylas2.style.color = t5;
      
          document.getElementById("cr6").value = t6; 
          ikon1.style.color = t6;
          ikon2.style.color = t6;
          ikon3.style.color = t6;
          ikon5.style.color = t6;
          ikon6.style.color = t6;
          ikon7.style.color = t6;
          ikon8.style.color = t6;
          ikon9.style.color = t6;
          ikon10.style.color = t6;
          ikon11.style.color = t6;
          ikon12.style.color = t6;
          ikon13.style.color = t6;
          ikon14.style.color = t6;
        
        };
 


  let color1 = document.getElementById('cr1');
  color1.addEventListener('input', function(e) {
    cr1.style.color = this.value;
    br1.style.background = this.value;
  });
  let color2 = document.getElementById('cr2');
  color2.addEventListener('input', function(e) {
    cr2.style.color = this.value;
    br2.style.background = this.value;
  });
  let color3 = document.getElementById('cr3');
  color3.addEventListener('input', function(e) {
    cr3.style.color = this.value;
    br3.style.background = this.value;
  });
  let color4 = document.getElementById('cr4');
  color4.addEventListener('input', function(e) {
    cr4.style.color = this.value;
    br4.style.background = this.value;
    br5.style.background = this.value;
    br6.style.background = this.value;
    br7.style.background = this.value;
    br8.style.background = this.value;
    br9.style.background = this.value;
  });

  let color5 = document.getElementById('cr5');
  color5.addEventListener('input', function(e) {
    isim1.style.color = this.value;
    isim2.style.color = isim1.style.color;
    yazi1.style.color = isim1.style.color;
    yazi2.style.color = isim1.style.color;
    yazi3.style.color = isim1.style.color;
    firmaisim1.style.color = isim1.style.color;
    firmayazi1.style.color = isim1.style.color;
    firmayazi2.style.color = isim1.style.color;
    firmayazi3.style.color = isim1.style.color;
    firmayazi4.style.color = isim1.style.color;
    paylas1.style.color = isim1.style.color;
    paylas2.style.color = isim1.style.color;



  });

  let color6 = document.getElementById('cr6');
  color6.addEventListener('input', function(e) {

    cr6.style.color = this.value;
    ikon1.style.color = this.value;
    ikon2.style.color = this.value;
    ikon3.style.color = this.value;
    ikon5.style.color = this.value;
    ikon6.style.color = this.value;
    ikon7.style.color = this.value;
    ikon8.style.color = this.value;
    ikon9.style.color = this.value;
    ikon10.style.color = this.value;
    ikon11.style.color = this.value;
    ikon12.style.color = this.value;
    ikon13.style.color = this.value;
    ikon14.style.color = this.value;

  });
