<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select {
            height: 40px;
        }
        .filemain {
            margin-bottom: 20px;
        }
        .filemain input[type="file"] {
            display: none;
        }
        .filemain label {
            background-color: #0073e6;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .filemain img {
            max-width: 100%;
            height: auto;
        }
        .error {
            color: #ff0000;
        }
        #preview-image {
		    max-width: 150px; 
		    height: auto;   
		    display: none;
		}
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Admin</h2>
        <form id="registration-form" action="{{route('different.types.admin.add')}}" method="post" enctype="multipart/form-data">
        	@csrf
            <div class="form-group">
                <label for="admin_fname">First Name:</label>
                <input type="text" id="admin_fname" name="admin_fname" >
            </div>
            <div class="form-group">
                <label for="admin_lname">Last Name:</label>
                <input type="text" id="admin_lname" name="admin_lname" >
            </div>
            <div class="form-group">
                <label for="admin_email">Email:</label>
                <input type="email" id="admin_email" name="admin_email" >
            </div>
            <div class="form-group">
                <label for="admin_pwd">Password:</label>
                <input type="password" id="admin_pwd" name="admin_pwd" >
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" id="job_title" name="job_title" >
            </div>
            <div class="form-group">
                <label for="user_type">User Type:</label>
                <select id="user_type" name="user_type" >
                   <option value="">Select User Type</option>
                    <option value="1">Super Admin</option>
                    <option value="4">Data Entry Admin</option>
                    <option value="5">Website Partner</option>
                    <option value="9">Ample Theater Admin</option>
                </select>
            </div>

            <div class="form-group" id="website_input" style="display: none;">
		        <label for="website">Website:</label>
		        <input type="text" id="website" name="website">
		    </div>


            <div class="form-group filemain">
                <label for="filemain">Profile Image:</label>
                <input type="file" id="filemain" name="filemain" accept="image/*" >
                <img id="preview-image" src="#" alt="Profile Image" style="display: none;">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>


@include('includes.script')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
        $(document).ready(function() {
            $('#filemain').change(function() {
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-image').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }


            $('#user_type').change(function() {
            if ($(this).val() === '5') {
                $('#website_input').show();
                $('#website').prop('required', true);
            } else {
                $('#website_input').hide();
                $('#website').prop('required', false);
                $('#website').val('');
            }
           });

            // Configure form validation
            $('#registration-form').validate({
                rules: {
                    'admin_fname': 'required',
                    'admin_lname': 'required',
                    'job_title': 'required',
                    'admin_email': {
                        required: true,
                        email: true
                    },
                    'admin_pwd': {
                        required: true,
                        minlength: 6
                    },
                    'user_type': 'required',
                    'filemain': {
                        required: true,
                        extension: 'jpg|jpeg|png|gif'
                    }
                },
                messages: {
                    'admin_pwd': {
                        minlength: 'Password must be at least 6 characters'
                    },
                    'filemain': {
                        extension: 'Please upload a valid image file (jpg, jpeg, png, gif)'
                    }
                }
                /* , submitHandler: function(form) {
                    // You can submit the form to the server using AJAX or other methods here
                    alert('Form submitted successfully!');
                }*/
            });
        });
    </script>


 
</body>
</html>
