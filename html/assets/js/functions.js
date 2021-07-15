function getRatings(e) {
    var str = '';
    if (e.data.friend_cb) {
        str += 'I have [value - X] points. <br><br/>';
    }
    editor.insertContent(str);
    jQuery.ajax({
        url: 'http://localhost:8080/wordpress/wp-content/plugins/databaseConnection.php',
        type: 'POST',
        data: { functionname: 'getX', condition_code: condition_code },
        error: function (data) {

            alert("failed");
            console.log(data);
        },
        success: function (data) {
            alert("success");
            console.log(data); // Inspect this in your console
        }
    });
}