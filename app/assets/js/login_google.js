function onSignIn(googleUser) {

    var id_token = googleUser.getAuthResponse().id_token;
    var submitted_data = {
        idtoken: id_token
    };

    $.ajax({
        url: 'auth.php?act=login',
        type: 'POST',
        data: submitted_data,
        success: function(resp){
            resp = JSON.parse(resp);
            if(resp.status == 'ok'){
                console.log(resp);
                //redirect ke dashboard / index
                var redir_url = resp.redir;
                setTimeout(()=>{
                    document.location = redir_url ? redir_url : 'index.php';
                },800);
            }else{
                gapi.auth2.getAuthInstance().signOut();
            }
            $('#text_notification').text(resp.message);
            setTimeout(()=>{
                $('#text_notification').text('');
            },1500);
        },
        error: function(evt){
            $('#text_notification').text('Error terhubung dengan server');
            setTimeout(()=>{
                $('#text_notification').text('');
            },1000);
            gapi.auth2.getAuthInstance().signOut();
        }
    });
}
