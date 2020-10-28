var ajaxku=buatajax();

function ajaxkotaship(id){
  var url=base_url+"daerah/getKab/"+id;
  ajaxku.onreadystatechange=stateChangedShip;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}



function stateChangedShip(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kotaShip").innerHTML = data
    }else{
      document.getElementById("kotaShip").value = "<option selected>Pilih Kecamatan</option>";
    }
  }
}


function ajaxkotarec(id){
  var url=base_url+"daerah/getKab/"+id;
  ajaxku.onreadystatechange=stateChangedRec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}
function ajaxkecrec(id){
  var url=base_url+"daerah/getKec/"+id;
  ajaxku.onreadystatechange=stateChangedKecRec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}
function ajaxkelrec(id){
  var url=base_url+"daerah/getKel/"+id;
  ajaxku.onreadystatechange=stateChangedKelRec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}


function stateChangedRec(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("rec_kota").innerHTML = data
    }else{
      document.getElementById("rec_kota").value = "<option selected>Pilih Kecamatan</option>";
    }
  }
}
function stateChangedKecRec(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("rec_kec").innerHTML = data
    }else{
      document.getElementById("rec_kec").value = "<option selected>Pilih Kecamatan</option>";
    }
  }
}
function stateChangedKelRec(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("rec_kel").innerHTML = data
    }else{
      document.getElementById("rec_kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
  }
}


function ajaxkota(id){
  var url=base_url+"daerah/getKab/"+id;
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkec(id){
  var url=base_url+"daerah/getKec/"+id;
  ajaxku.onreadystatechange=stateChangedKec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkel(id){
  var url=base_url+"daerah/getKel/"+id;
  ajaxku.onreadystatechange=stateChangedKel;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kota").innerHTML = data
    }else{
      document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
    }
  }
}

function stateChangedKec(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kec").innerHTML = data
    }else{
      document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    }
  }
}

function stateChangedKel(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kel").innerHTML = data
    }else{
      document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
  }
}

