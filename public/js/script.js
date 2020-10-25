function data(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 
    $.ajax({
        url: "/attrib/data",
        type:"POST",
        data:{
            
            _token : $('#token').val(),
            poste_id :$('#poste_id').val(),
            date : $('#date').val(),
        },
        success:function(response){
            response.forEach(element => {
                
            document.querySelector('#'+element.horaire).innerHTML = '<td>8h</td><td></td>'+element.client.prenom+'<td><button value="8h">anullez</button></td>'
            });
            document.querySelector('#flash').innerHTML = response
            document.getElementById("pcmodal").classList.remove("vus");
            document.getElementById("pcmodal").classList.add("inv");
         
        },
       });

}
  
$(document).ready(function() {
    $.get('/table/'+id, {

    }, 
    function(data) {
        document.querySelector('.table-auto').innerHTML = data
        
    }
);
    $('.attribution_boutton').click(function() { 
        var heure= $(this).val();
        
        document.getElementById("attribution_modal").classList.remove("inv");
        document.getElementById("attribution_modal").classList.add("vus");
        $('#heure').val(heure);
        
    });
    $('#ordi').change(function() {      
        var id=$(this).val();
        
        $.get('/table/'+id, {

            }, 
            function(data) {
                document.querySelector('.table-auto').innerHTML = data
                
            }
        );
    });
    $('#next').click(function() {      
        var id=$('#poste_id').val();
        
        $.get('/next/'+id, {

            }, 
            function(data) {
                document.querySelector('.table-auto').innerHTML = data
                
            }
        );
    });
    $('#previous').click(function() {      
        var id=$('#poste_id').val();
        
        $.get('/previous/'+id, {

            }, 
            function(data) {
                document.querySelector('.table-auto').innerHTML = data
                
            }
        );
    });
    $('#v_poste').click(function() { 
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }); 
        $.ajax({
            url: "/post/add",
            type:"POST",
            data:{
                
                _token : $('#token').val(),
                nom : $('#nom_pc').val()
            },
            success:function(response){
                document.querySelector('#flash').innerHTML = response
                document.getElementById("pcmodal").classList.remove("vus");
                document.getElementById("pcmodal").classList.add("inv");
             
            },
           });
        
    
    });
    $('#add_poste').click(function() {
        document.getElementById("pcmodal").classList.remove("inv");
        document.getElementById("pcmodal").classList.add("vus");
    })
    $('#f_poste').click(function() {
        document.getElementById("pcmodal").classList.remove("vus");
        document.getElementById("pcmodal").classList.add("inv");
    })
    $('#f_attrib').click(function() {
        document.getElementById("attribution_modal").classList.remove("vus");
        document.getElementById("attribution_modal").classList.add("inv");
    })
    $('#v_attrib').click(function() { 
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }); 
        $.ajax({
            url: "/client/add",
            type:"POST",
            data:{
                
                _token : $('#_token').val(),
                nom : $('#nom_client').val(),
                prenom : $('#prenom_client').val(),
                poste_id :$('#poste_id').val(),
                date : $('#date').val(),
                heure : $('#heure').val()
            },
            success:function(response){
                document.querySelector('#flash').innerHTML = response
                document.getElementById("attribution_modal").classList.remove("vus");
                document.getElementById("attribution_modal").classList.add("inv");
             
            },
           });
        
    
    });
    $('#change_div').click(function() {
        document.getElementById("add_user").classList.remove("inv");
        document.getElementById("add_user").classList.add("vus");
        document.getElementById("attrib_user").classList.add("inv");
        document.getElementById("v_attrib").classList.remove("inv");
        document.getElementById("v_attrib").classList.add("vus");
        document.getElementById("valid").classList.add("inv");
    })
    $("#valid").click(function() { 
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }); 
        $.ajax({
            url: "/attrib/add",
            type:"POST",
            data:{
                
                _token : $('#_token').val(),
                poste_id :$('#poste_id').val(),
                user_id : $('#user_id').val(),
                date : $('#date').val(),
                heure : $('#heure').val()
            },
            success:function(response){
                document.querySelector('#flash').innerHTML = response
                document.getElementById("attribution_modal").classList.remove("vus");
                document.getElementById("attribution_modal").classList.add("inv");
                $('#auto').val("");
             
            },
           });
        
    
    });
   
});