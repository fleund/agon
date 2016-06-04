function imageGalerie()
{
    var active = $('#galerie .active');
     
    var next = (active.next().length > 0) ? active.next() : $('#galerie img:first');
     
       active.fadeOut(function(){
         
       active.removeClass('active');
       next.fadeIn().addClass('active');  
        
       }); 
}
 
setInterval('imageGalerie()',2500);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


