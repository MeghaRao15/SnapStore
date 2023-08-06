<style>
    #my_camera {
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }

    /* Apply styles to the table and its cells */
    table {
        border-collapse: collapse;
        /* Merge cell borders */
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        /* Add solid border to table cells */
        padding: 8px;
        /* Add padding to cells for better appearance */
    }

    img,
    button {
        margin: 10px;
    }

    #my_camera {
        margin: 10px;
    }
</style>

<?php $this->load->view('header'); ?>

<form id="capture-form" action="<?php echo site_url('Welcome/save') ?>" method="post">
    <div id="my_camera"></div>
    <!-- Add three hidden input fields to store the captured images -->
    <input type="hidden" id="hdimg1" name="hdimg1">
    <input type="hidden" id="hdimg2" name="hdimg2">
    <input type="hidden" id="hdimg3" name="hdimg3">
    <div id="results"></div>
    <button type="button" id="rbt1" onClick="removeImage()">Remove image 1</button>
    <button type="button" id="rbt2" onClick="removeImage()">Remove image 2</button>
    <button type="button" id="rbt3" onClick="removeImage()">Remove image 3</button>
    <input type="button" value="Take Snapshot" onClick="take_snapshot()">
    <input type="hidden" id="captureCount" name="captureCount" value="0">
    <button type="submit">Submit</button>
</form>
<table border="1">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($img_list)) {
                  foreach ($img_list as $key => $value) {
                ?>
            <tr>
                <td><?php echo $key + 1 ; ?></td>
                <td><img src="<?php echo base_url('uploads/'.$value->im_img_name); ?>" height="200px" width="330px"></td>
                <td><button><a href="<?php echo site_url('Welcome/delete?id=').$value->id; ?>">Delete</a></button></td>
            </tr>
            <?php } }?>
        </tbody>
    </table>
<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    var captureCount = 0; // Counter for the number of images captured
    var img1 = document.getElementById('hdimg1');
    var img2 = document.getElementById('hdimg2');
    var img3 = document.getElementById('hdimg3');

    $("#rbt1").hide();
    $("#rbt2").hide();
    $("#rbt3").hide();

    function take_snapshot() {
        var captureCount1 = document.getElementById('captureCount').value;
        if (captureCount1 !== undefined && captureCount1 !== null && captureCount1 !== '') {
            captureCount = captureCount1;
            if (captureCount < 3) { // Limit the capture to 3 images
                // take snapshot and get image data
                Webcam.snap(function(data_uri) {
                    var imgElement = document.createElement('img');
                    imgElement.src = data_uri;
                    if (img1.value == '') {
                        img1.value = data_uri;
                        $("#rbt1").show();
                        $('body').append('<img id="result1" src="' + data_uri + '">');
                    } else if (img2.value == '') {
                        img2.value = data_uri;
                        $("#rbt2").show();
                        $('body').append('<img id="result2" src="' + data_uri + '">');
                    } else if (img3.value === '') {
                        img3.value = data_uri;
                        $("#rbt3").show();
                        $('body').append('<img id="result3" src="' + data_uri + '">');
                    }

                    captureCount++; // Increment the capture count
                    document.getElementById('captureCount').value = captureCount; // Update the hidden field value
                });
            } else {
                alert('You have captured the maximum of 3 images.');
            }
        }
    }

    function removeImage() {
        var captureVal = $('#captureCount').val(); // Parse the value as an integer
        if (captureVal == 1) {
            $('#hdimg1').val('');
            $("#rbt1").hide();
            $('#result1').attr('src', '');
        } else if (captureVal == 2) {
            $('#hdimg2').val('');
            $("#rbt2").hide();
            $('#result2').attr('src', '');
        } else if (captureVal == 3) {
            $('#hdimg3').val('');
            $("#rbt3").hide();
            $('#result3').attr('src', '');
        }
        captureVal--; // Decrement the capture count
        $('#captureCount').val(captureVal);
    }
</script>
<?php $this->load->view('footer'); ?>
