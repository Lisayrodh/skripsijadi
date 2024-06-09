<p>Dear {{ $admin->name}}</p>
<p>
    Your password on KhitanCare has been changed successfully.
    Here are youre new login credentials:
    <br>
    <b> Login ID: </b> {{ isset($admin->username)? $admin->username. 'or' : ''}}{{
        $admin->email  }}
        <br>
        <b>Password: </b> {{ $new_password }}
</p>
<br>
Please, Keep your credentials confidential. Your login ID and password are your own
credentials and you should never share them with anybody else.
<p>
    KhitanCare will not be liable for any misuse of your login id or password.

</p>
<br>
-------------------------------------------------------------------------------
<p>   This email was automatically sent by KhitanCare. Don't reply to it.</p>
