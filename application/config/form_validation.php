<?php

$config = array(
        'register_temp_admin_user' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|is_unique[master_profile.email_address]',
                        'error' => array(
                                'required' => 'Enter your email.',
                                'is_unique' => 'Email is already exist.',
                                )
                ),
                array(
                        'field' => 'password',
                        'label' => 'Pass',
                        'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                        'field' => 'cpassword',
                        'label' => 'PC',
                        'rules' => 'required|matches[password]',
                ),
                array(
                        'field' => 'captcha',
                        'label' => 'Captcha',
                        'rules' => 'required'
                )
        ),
        'login_admin_user' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'captcha',
                        'label' => 'Captcha',
                        'rules' => 'required'
                )
        ),
        'change_password' => array(
                array(
                        'field' => 'password',
                        'label' => 'Pass',
                        'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                        'field' => 'cpassword',
                        'label' => 'PC',
                        'rules' => 'required|matches[password]',
                )
        ),
        'master_profile' => array(
                array(
                        'field' => 'first_name',
                        'label' => 'First Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'last_name',
                        'label' => 'Last Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'middle_name',
                        'label' => 'Middle Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'date_of_birth',
                        'label' => 'Birthday',
                        'rules' => 'valid_date'
                ),
                array(
                        'field' => 'gender',
                        'label' => 'Sex',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'address',
                        'label' => 'Address',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'provincial_address',
                        'label' => 'Provincial Address',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'citation',
                        'label' => 'Citation',
                        'rules' => 'required'
                )
        ),
);