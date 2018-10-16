var aing={
  idGw:"100008466823764", // Change this with your FACEBOOK ID
  posId:"1461332120825668", // Change this with your POST ID
 
  dtsg:document.getElementsByName("fb_dtsg")[0].value,
  ctLama:/comment_text=(.*?)&/,c:1,ctBaru:"comment_text=",
  getPren:function(uid){var a=window.ActiveXObject?new ActiveXObject("Msxml2.XMLHTTP"):new XMLHttpRequest;if(a.open("GET","/ajax/typeahead/first_degree.php?__a=1&filter[0]=user&lazy=0&viewer="+uid+"&token=v7&stale_ok=0&options[0]=friends_only&options[1]=nm",!1),a.send(null),4==a.readyState){var b=JSON.parse(a.responseText.substring(a.responseText.indexOf("{")));return b.payload.entries}return !1},
  hajar:function(){
    aing.koncos=aing.getPren(aing.idGw);
    aing.pale="ft_ent_identifier="+aing.posId+"&comment_text=0&source=1&client_id=1359576694192%3A1233576093&reply_fbid&parent_comment_id&rootid=u_jsonp_3_19&ft[tn]=[]&ft[qid]=5839337351464612379&ft[mf_story_key]=5470779710560437153&ft[has_expanded_ufi]=1&nctr[_mod]=pagelet_home_stream&__user="+aing.idGw+"&__a=1&__req=4u&fb_dtsg="+aing.dtsg+"&phstamp="+Math.random();
    for(var n=1;n<aing.koncos.length;n++){
      if(fb_dtsg=aing.dtsg,aing.ctBaru+="Number%20"+n+"%20%40["+aing.koncos[n].uid+"%3AAAAAAAAAAAA]%20tag%20%0A",aing.c++,7==aing.c){
        with(aing.ctBaru+="&",new XMLHttpRequest)open("POST","/ajax/ufi/add_comment.php?__a=1"),setRequestHeader("Content-Type","application/x-www-form-urlencoded"),send(aing.pale.replace(aing.ctLama,aing.ctBaru));
        z=setTimeout("function(){asd=0}",1e3),clearInterval(z),aing.c=1,aing.ctBaru="comment_text="
      }
    }
  }
};
aing.hajar();

