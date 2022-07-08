<?php
if ($_POST['nome'] == '' or $_POST['senha'] == '') {
    header("Location: ../index.php?erro=dadoserrado");
} else {
    $ldaprdn  = $_POST['nome'] . '@rinaldi.net';
    $ldappass = $_POST['senha'];
    $ldapconn = ldap_connect("ldap://192.168.1.114")
        or die("Could not connect to LDAP server.");
    if ($ldapconn) {
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
        $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
        var_dump($ldapbind);
        if ($ldapbind == true) {
            session_start();
            $_SESSION['nome'] = strtoupper($_POST['nome']);
            if ($_POST['nome'] == 'administrator') {
                header("Location: ../frontend/admin");
            } else {
                header("Location: ../frontend/user");
            }
        } else {
            header("Location: ../index.php?erro=dadoserrado");
        }
    }
}
