
   // $('#register_form').submit(function(){


var Script = function () 
{
            //create a js object with key values for your post data
            // var postData = {
            //   'first_name' : $('#first_name').val(),
            //   'last_name' : $('#last_name').val(),
            //   'middle_name' : $('#middle_name').val(),
            //   'date_of_birth' : $('#date_of_birth').val(),
            //   'gender' : $('#gender').val(),
            //   'address' : $('#address').val(),
            //   'provincial_address' : $('#provincial_address').val(),
            //   'username' : $('#username').val(),
            //   'citation' : $('#citation').val(),
            // };
    $.validator.setDefaults({
        submitHandler: function(form) { 
            $('#register_form').valid();
            $('#form_links_account').valid();
            $('#register_form_service').valid();
            
            form.submit(); // submit the form
        }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        $("#register_form").validate({
            // debug: true,
            errorClass:'has-error',
            validClass:'has-success',
            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                middle_name: {
                    required: true,
                    minlength: 2
                },
                address: {
                    minlength: 5
                },
                provincial_address: {
                    minlength: 5
                },
                username: {
                    minlength: 3
                },
                citation: {
                    minlength: 5
                },
                agree: "required",
            },
            messages: {                
                first_name: {
                    required: "Please enter a First Name.",
                    minlength: "Your First Name must consist of at least 3 characters long."
                },                
                last_name: {
                    required: "Please enter a Last Name.",
                    minlength: "Your Last Name must consist of at least 2 characters long."
                },                
                middle_name: {
                    required: "Please enter a Middle Name.",
                    minlength: "Your Middle Name must consist of at least 2 characters long.",
                },                   
                address: {
                    minlength: "Your Address must consist of at least 5 characters long.",
                },                    
                provincial_address: {
                    minlength: "Your Provincial Address must consist of at least 5 characters long.",
                },                    
                username: {
                    minlength: "Your username must consist of at least 3 characters long.",
                },                    
                citation: {
                    minlength: "Your Citation must consist of at least 5 characters long.",
                },                 
                agree: "Please accept to validate changes.",
            },
            highlight: function (element, errorClass, validClass) { 
                $(element).parents("div.form-group")
                          .addClass(errorClass)
                          .removeClass(validClass);
            }, 
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents("div.form-group")
                          .addClass(validClass) 
                          .removeClass(errorClass);
            },
        });

        $("#form_links_account").validate({
            // debug: true,
            errorClass:'has-error',
            validClass:'has-success',
            ignore: [],
            rules: {
                "linkicon[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon[]['name']": {
                    required: true
                },
                "linkicon1[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon1[]['name']": {
                    required: true
                },
                "linkicon2[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon2[]['name']": {
                    required: true
                },
                "linkicon3[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon3[]['name']": {
                    required: true
                },
                "linkicon4[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon4[]['name']": {
                    required: true
                },
                "linkicon5[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon5[]['name']": {
                    required: true
                },
                "linkicon6[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon6[]['name']": {
                    required: true
                },
                "linkicon7[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon7[]['name']": {
                    required: true
                },
                "linkicon8[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon8[]['name']": {
                    required: true
                },
                "linkicon9[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon9[]['name']": {
                    required: true
                },
                "linkicon10[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon10[]['name']": {
                    required: true
                },
                "linkicon11[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon11[]['name']": {
                    required: true
                },
                "linkicon12[]['link']": {
                    required: true,
                    url: true
                },
                "linkicon12[]['name']": {
                    required: true
                },
            },
            messages: {                
                "linkicon[]['link']":  "Please enter a valid url.",
                "linkicon[]['name']":  "Please choose link name.",                
                "linkicon1[]['link']":  "Please enter a valid url.",
                "linkicon1[]['name']":  "Please choose link name.",
                "linkicon2[]['link']":  "Please enter a valid url.",
                "linkicon2[]['name']":  "Please choose link name.",
                "linkicon3[]['link']":  "Please enter a valid url.",
                "linkicon3[]['name']":  "Please choose link name.",
                "linkicon4[]['link']":  "Please enter a valid url.",
                "linkicon4[]['name']":  "Please choose link name.",
                "linkicon5[]['link']":  "Please enter a valid url.",
                "linkicon5[]['name']":  "Please choose link name.",
                "linkicon6[]['link']":  "Please enter a valid url.",
                "linkicon6[]['name']":  "Please choose link name.",
                "linkicon7[]['link']":  "Please enter a valid url.",
                "linkicon7[]['name']":  "Please choose link name.",
                "linkicon8[]['link']":  "Please enter a valid url.",
                "linkicon8[]['name']":  "Please choose link name.",
                "linkicon9[]['link']":  "Please enter a valid url.",
                "linkicon9[]['name']":  "Please choose link name.",
                "linkicon10[]['link']":  "Please enter a valid url.",
                "linkicon10[]['name']":  "Please choose link name.",
                "linkicon11[]['link']":  "Please enter a valid url.",
                "linkicon11[]['name']":  "Please choose link name.",
                "linkicon12[]['link']":  "Please enter a valid url.",                
                "linkicon12[]['name']":  "Please choose link name.",
            },
            highlight: function (element, errorClass, validClass) { 
                $(element).parents("div.form-group")
                          .addClass(errorClass)
                          .removeClass(validClass);
            }, 
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents("div.form-group")
                          .addClass(validClass) 
                          .removeClass(errorClass);
            }
        });

        $("#register_form_service").validate({
            // debug: true,
            errorClass:'has-error',
            validClass:'has-success',
            rules: {
                service1: {
                    minlength: 5
                },
                service2: {
                    minlength: 5
                },
                service3: {
                    minlength: 5
                },
                service4: {
                    minlength: 5
                },
                service5: {
                    minlength: 5
                },
                service6: {
                    minlength: 5
                },
                service7: {
                    minlength: 5
                },
                service8: {
                    minlength: 5
                },
                service9: {
                    minlength: 5
                },
                service10: {
                    minlength: 5
                },
                service11: {
                    minlength: 5
                },
                service12: {
                    minlength: 5
                },
                service13: {
                    minlength: 5
                }
            },
            messages: {                
                service1: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                
                service2: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                
                service3: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                   
                service4: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                    
                service5: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                    
                service6: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                    
                service7: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                  
                service8: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                   
                service9: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                    
                service10: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                    
                service11: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                    
                service12: {
                    minlength: "Your Service must consist of at least 5 characters long."
                },                     
                service13: {
                    minlength: "Your Service must consist of at least 5 characters long."
                }                 
            },
            highlight: function (element, errorClass, validClass) { 
                $(element).parents("div .form-group")
                          .addClass(errorClass)
                          .removeClass(validClass);
            }, 
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents("div .form-group")
                          .addClass(validClass)
                          .removeClass(errorClass); 
            },
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });
}
();