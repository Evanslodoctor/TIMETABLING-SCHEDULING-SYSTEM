$(document).ready(function(){
   
    $("#contact").on("click", function(){

        $("form").on("submit", function(e){
            e.preventDefault();
        });
        
        $name = $("#name").val();
        $email = $("#email").val();
        $message = $("#message").val();

        if($name != "" && $email != "" && $message!= "")
        {
            $.ajax({
            url : "./php/contact.php",
            type : "POST",
            data : {
                name : $name,
                email : $email,
                message : $message
            },
            success : function(result){
                $("#box").html(result);

                setTimeout(() => {
                    $("#box").html("");
                }, 2000);
            }
        });
        }else{
            alert("Cant send empty fields");
        }

    });
});