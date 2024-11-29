

 // Handle form submission via AJAX
 $(document).ready(function() {
    $('#userForm').on('submit', function(event) {
        event.preventDefault();

        // Get form data
        var formData = $(this).serialize();

        // Make the AJAX request
        $.ajax({
            url: formSubmitUrl, // Adjust route name
            method: "POST",
            data: formData,
            success: function(response) {
                // Show success message
                $('#responseMessage').append('<h2>' + response.message + '</h2>');
                $('#list').html("");
                showUsers();
            },
            error: function(xhr, status, error) {
                // Show error message
                $('#responseMessage').append('<p>Error: ' + xhr.responseJSON.message + '</p>');
            }
        });
        $('#userForm')[0].reset();
    });

    function showUsers()
    {
        $.ajax({
            type: "GET",
            url: dataUrl,
            success: function (response) {

                data = response.data;


                data.forEach(user => {

                    $('#list').append(
                        '<li>'+
                            '<ul>'+
                                '<li>'+
                                    user.name+
                                '</li>'+

                                '<li>'+
                                    user.email+
                                '</li>'+
                                '<br>'+

                            '</ul>' +
                        '</li>'+'<button id="delete">Delete</button>'
                    );

                });

            },
        });
    }

    showUsers();


    $('#delete').click(function (e) {
        // e.preventDefault();

        $('#list').html("Test");
    });



});
