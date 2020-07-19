<script>
    function loadingStop()
    {
        document.getElementsByTagName( "html" )[0].classList.remove( "loading" );
        document.getElementsByTagName( "html" )[0].className.replace( /loading/, "" );
        $( "html" ).removeClass( "loading" );
    }

    function addCustomLoader()
    {
        $('html').addClass('loading');
    }

    $(document).ready(function () {

        

        
        
      


        $("#contact_submit").click(function () {
            addCustomLoader();
            var name = $("#contact_name").val();
            var email = $("#contact_email").val();
            var mobile = $("#contact_mobile").val();
            var description = $("#contact_description").val();
            
            
            
            if(name=='' || email=='' || mobile=='' || description=='')
            {
                loadingStop();
                $("#mess_contact").html("Failed, Please Fillup Your Info.");
            }
            else
            {
                var url = "<?=url('contact-us')?>";
                $.ajax({
                    method: "POST",
                    url: url,
                    data:{
                        'name':name,
                        'email':email,
                        'mobile':mobile,
                        'description':description,
                        '_token':'<?=csrf_token()?>'
                    },
                    cache: false
                })
                .done(function (data) {
                    loadingStop();
                    $("#contact_name").val("");
                    $("#contact_email").val("");
                    $("#contact_mobile").val("");
                    $("#contact_description").val("");
                    $("#mess_contact").html("Your Contact Information Submitted Successfully.");
                    
                })
                .fail(function () {
                    loadingStop();
                    $("#mess_contact").html("Failed, Please Try Again.");
                })
                .always(function (data) {
                    loadingStop();
                    $("#contact_name").val("");
                    $("#contact_email").val("");
                    $("#contact_mobile").val("");
                    $("#contact_description").val("");
                    $("#mess_contact").html("Your Contact Information Submitted Successfully.");
                });
            
            }
            
            
        });





    });

</script>
