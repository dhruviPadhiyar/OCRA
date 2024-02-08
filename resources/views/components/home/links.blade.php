<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>OCRA:BLOG</title>

<!-- links -->


<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">

<!-- fontawesome icons -->
<script src="https://kit.fontawesome.com/4870e9e7ee.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></script>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- select2dropdown -->
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/cs    s/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script>
    $(document).ready(function() {
        console.log("ok");
        $('.alert').alert();
        $('[data-toggle="tooltip"]').tooltip();

        $('.close').click(function(e) {
            e.preventDefault();
            $('.show').hide();
        });
        $('.fieldData').click(function(e) {
            e.preventDefault();
            console.log("field data");
            $(this).hide();
            $(this).siblings('.fieldEdit').show();
        });
        function autoExpand(textarea) {
            // Reset the height to default in case text is deleted
            textarea.style.height = 'auto';
            
            // Set the height to the scrollHeight, which is the content height
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    });
</script>
