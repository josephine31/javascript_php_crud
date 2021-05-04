<footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2021 | <a href="#">Josephine Nadar</a>
            </span>
        </div>
    </footer>

    
    <script src="<?php echo SITE_URL.'/assets/js/jquery-3.3.1.slim.min.js' ?>"></script>
    <script src="<?php echo SITE_URL.'/assets/js/popper.min.js' ?>"></script>
    <script src="<?php echo SITE_URL.'/assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo SITE_URL.'/assets/js/bootstrap-datepicker.min.js' ?>"></script>
    <script src="<?php echo SITE_URL.'/assets/js/jquery.validate.js' ?>"></script>
    <script>
        $.validator.addMethod(
        "validDOB",
        function(value, element) {              
            var from = value.split(" "); // DD MM YYYY
            // var from = value.split("/"); // DD/MM/YYYY

            var day = from[0];
            var month = from[1];
            var year = from[2];
            var age = 18;

            var mydate = new Date();
            mydate.setFullYear(year, month-1, day);

            var currdate = new Date();
            var setDate = new Date();

            setDate.setFullYear(mydate.getFullYear() + age, month-1, day);

            if ((currdate - setDate) > 0){
                return true;
            }else{
                return false;
            }
        },
        "Sorry, you must be 18 years of age to apply"
    );

        $('#dob').datepicker({
            format: 'd-m-yyyy'
        });

        var form_valid = $( "#employee_form" ).validate({
            rules: {
                first_name: {
                    required: true
                },
                middle_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                dob: {
                    required: true,
                    validDOB : true
                },
                gender: {
                    required: true
                },
                basic: {
                    required: true,
                    number:true
                }
                ,
                allowance: {
                    required: true,
                    number:true
                },
                deduction: {
                    required: true,
                    number:true
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "gender") {
                    error.insertAfter("#gender_error");
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $('#basic, #allowance, #deduction').change(function(){
            var net_salary = 0;
            var basic = $('#basic').val();
            var allowance = $('#allowance').val();
            var deduction = $('#deduction').val();
            if(basic != '' && allowance != '' && deduction != ''){
                if(parseInt(deduction) < (parseInt(basic) + parseInt(allowance))){
                    net_salary = parseInt(basic) + parseInt(allowance) - parseInt(deduction);
                }else{
                    alert('Deduction must not be greater than Basic and allowance');
                }
                
            }
            $('#net_salary').val('Rs. '+net_salary);
        });

        $("#basic, #allowance, #deduction").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    </script>
  </body>
</html>